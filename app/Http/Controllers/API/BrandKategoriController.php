<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\JenisModel;
use Illuminate\Http\Request;

class BrandKategoriController extends Controller
{
    //
    public function brand(){
        $data = BrandModel::all();
        if($data){
            return ResponseFormatter::success('Data brand Berhasil Diambil', $data);
        }else{
            return ResponseFormatter::error('Data Brand Tidak Ada', null, 404);
        }
    }

    public function kategori(){
        $data = JenisModel::all();
        if($data){
            return ResponseFormatter::success('Data Kategori Berhasil Diambil', $data);
        }else{
            return ResponseFormatter::error('Data Kategori Tidak Ada', null, 404);
        }
    }
}
