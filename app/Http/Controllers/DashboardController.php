<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;
use App\Models\PengaturanModel;

use Carbon\Carbon;

class DashboardController extends Controller
{
    
    public function index() {
        // Ambil data pengaturan 
        $stokminimal = PengaturanModel::select('stok_minimal')->get();
        
        //ambil data produk
        
        // segera habis
        $segeraHabis = ProdukModel::where('stok','<=',$stokminimal[0]->stok_minimal)->where('stok','>',0)->paginate(5,['*'], 'segeraHabis');
        
        // habis
        $habis = ProdukModel::where('stok','=',0)->paginate(10,['*'], 'habis');

        // ambil data transaksi, income dan sales 6 bulan kebelakang
        $fromDate = Carbon::now()->subMonth(6)->startOfMonth()->toDateString();
        $tillDate = Carbon::now()->toDateString();
        $data = TransaksiModel::with('customerInfo')->where('transaksi_status','SUKSES')->where('resi_kirim',"")->paginate(5,['*'], 'transaksi');
        $terkirim = TransaksiModel::with('customerInfo')->where('transaksi_status','SUKSES')->where('resi_kirim',"!=","")->paginate(5,['*'], 'transaksi');
        $transaksiPast6Month = TransaksiModel::select('uuid','created_at','transaksi_total')
        ->where('transaksi_status' ,'SUKSES')
        ->whereDate('created_at','>=',$fromDate)
        ->whereDate('created_at','<=',$tillDate)
        ->orderBy('created_at', 'ASC')
        ->get()
        ->groupBy(function($date){
            return Carbon::parse($date->created_at)->format('M');
        }); 
        
        $income = []; 
        $a = 0;
        foreach($transaksiPast6Month->all() as $inc){
            $income[] = 0;
            foreach($inc as $i){
                 
                $income[$a] +=  $i->transaksi_total ;
            }
            $a++;
        }
        
        // data untuk change data dengan tombol
        
        // $incomeData = [
        //         "data"=>[
        //             "datasets" => [
        //                 [
        //                     "data" => $income
        //                 ]
        //             ]
        //         ]
        //     ];

        // $incomeFix = response()->json($incomeData);

        $array = $transaksiPast6Month->all();
        
        $data2 = [];
        $data3 = [];

        foreach($transaksiPast6Month as $d){
            $data2[] = count($d);
        }

        foreach($array as $a){
            $data3[] = $a[0]->created_at->format('M');
        }

        // return dd($data3);
        return view('pages.index')->with([
            'transaksi'=>$data, 
            'salesPast6Month' => $data2, 
            'past6Month' => $data3, 
            'incomePast6Month' => $income,
            'produkHabis' => $habis,
            'produkSegeraHabis' => $segeraHabis,
            'terkirim' => $terkirim
            ]);
        
        
    }
}
