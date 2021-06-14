<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;

class TransaksiController extends Controller
{
    //

    public function getAll($id){
        $trx = TransaksiModel::where('customer_id',$id)->get();
        if($trx){

            foreach($trx as $t){
                $t['tanggal'] = $t['created_at']->isoFormat('dddd, D MMMM Y');
            }

            return ResponseFormatter::success('Data Transaksi Berhasil Diambil', $trx);
        }else{
            return ResponseFormatter::error('Data Transaksi Tidak Ada', null, 404);
        }
    }

    public function get($id,Request $req){
        $trx = TransaksiModel::with(['transactionDetail.produk.satuanProduk','transactionDetail.produk.gallery'])->where('id',$id)->where('customer_id',$req->customer_id)->get();
        
        if($trx){
            return ResponseFormatter::success('Data Transaksi Berhasil Diambil', $trx);
        }else{
            return ResponseFormatter::error('Data Transaksi Tidak Ada', null, 404);
        }
    }

}
