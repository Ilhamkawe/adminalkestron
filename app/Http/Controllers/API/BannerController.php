<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerModel;

class BannerController extends Controller
{
    //
    public function index(){
        $data = BannerModel::all();
        if($data){
            return ResponseFormatter::success('Data banner Berhasil Diambil', $data);
        }else{
            return ResponseFormatter::error('Data banner Tidak Ada', null, 404);
        }
    }
}
