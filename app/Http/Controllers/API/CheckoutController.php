<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;
use App\Models\ProdukModel;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

use Carbon\Carbon;

class CheckoutController extends Controller
{
    //

    public function testCheckout(){
        return "hello world";
    }

    public function checkout(Request $req){
        
        $validator = Validator::make($req->all(),[
            'customer_id' => 'integer|required|exists:customer,id',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kode_pos' => 'required|max:255',
            'no_telpon' => 'required|max:255',
            'ongkir' => 'required|integer',
            'pajak' => 'required|integer',
            'transaksi_total' => 'required|integer',
            'transaksi_status' => 'nullable|string|in:SUKSES,GAGAL,PENDING',
            'transaksi_details' => 'required|array',
            'transaksi_details.*' => 'array',
            'transaksi_details.*[*]' => 'integer|exists:product,id',
        ]);
        
        if($validator->fails()){
            $data = $validator->errors();   
            return ResponseFormatter::error('Gagal',$data);
        }
       
        $data = $req->except('transaksi_details');
        $data['uuid'] = 'TRX-'.mt_rand(10000,99999)."-".mt_rand(100,999).mt_rand(10,99);
        $data['tags'] = "online"; 
        $data['admin_id'] = 1;



        $transaksi = TransaksiModel::create($data);
        $total = 0;
        
        // input details transaksi
        foreach($req->transaksi_details as $produk){

            $details[] = new TransaksiDetailModel([
                'transaction_id' => $transaksi->id,
                'product_id' => $produk[0],
                'qty' => $produk[1],
            ]);
            
            ProdukModel::where('id', $produk[0])->decrement('stok', $produk[1]);
        }        

        $transaksi->transactionDetail()->saveMany($details);

       
        // ambil data untuk email 
        $dataTransaksi = TransaksiModel::with('transactionDetail.produk')->where('id',$transaksi->id)->get();
        $customer = CustomerModel::where('id', $data['customer_id'])->get();

        // Email
        
         Mail::send('report.transaksi.email', ['data'=>$dataTransaksi, 'customer'=>$customer, 'id'=>$transaksi->id], function($m) use ($customer){
            $m->from('admin@Alkestron.com')->to($customer[0]->email)->subject("Pesanan Berhasil Dibuat");
        });


        // Midtrans
        
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $midtrans = [
                'transaction_details' =>[
                    'order_id' => $data['uuid'],
                    'gross_amount' => (int) $transaksi->transaksi_total,
                ], 
                'customer_details' => [
                    'first_name' => $customer[0]->nama,
                    'email' => $customer[0]->email,
                ],
                'enabled_payments' => [
                    'gopay','permata_va','bank_transfer',
                ], 
                'expiry' => [
                    // "start_time" => Carbon::now()->isoFormat('Y-MM-D h:m:s ZZ'),
                    "unit" => "hour",
                    "duration" => 3
                ],
                'vtweb' => []
            ];


        try {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            $transaksi['paymentUrl'] = $paymentUrl;
            return ResponseFormatter::success(null,$transaksi);
        }catch(Exception $e){
            echo $e->getMessage();
        };
        
    }

    public function callback(){

        // Midtrans
        
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Instance midtrans notification 

        $notification = new Notification();

        // assign ke variabel 

        $status = $notification->transaction_status; 
        $type = $notification->payment_type; 
        $fraud = $notification->fraud_status; 
        $order_id = $notification->order_id;

        // cari transaksi berdasarkan uid 

        $transaksi = TransaksiModel::with('transactionDetail.produk')->where('uuid',$order_id);

        // handle notification status 

        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaksi->status = 'PENDING';
                }else{
                    $transaksi->status = 'SUKSES';
                }
            }
        }else if($status == 'settlement'){
            $transaksi->status = 'SUKSES';
        }else if($status == 'pending'){
            $transaksi->status = 'PENDING';
        }else if($status == 'deny' || $status == 'expire' || $status == 'cancel' ){
            $transaksi->status = 'GAGAL';
            // restore stok barang 
            // cari id barang 
            foreach($transaksi->transactionDetail as $detail){
                ProdukModel::find($detail->product_id)->increment('stok',$detail->qty);
            }
            
        }

        // simpan transaksi 

        $transaksi->save();

    }
    
}
