<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    //

    // API KEY RajaOngkir 
    protected $API_KEY = "2a8efe79eac3cd945ab7810d3e44c086";


    public function getProvinsi(){
        $response = Http::withHeaders([
            "key" => $this->API_KEY 
        ])->get("https://api.rajaongkir.com/starter/province");
        
        $provinsi = $response['rajaongkir']['results'];
        
        return ResponseFormatter::success("Data Provinsi Berhasil Diambil", $provinsi);
        
    }

    public function getKota($id){
        // dd($id);
        $data = Http::withHeaders([
            'key' => $this->API_KEY 
        ])->get("https://api.rajaongkir.com/starter/city?province=".$id);
            
        $kota = $data['rajaongkir']['results'];

        return ResponseFormatter::success("Data Kota Berhasil Diambil", $kota);
    }


    public function checkOngkir(Request $request)
    {
        $data = Http::withHeaders([
            'key' => $this->API_KEY
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin'            => $request->origin,
            'destination'       => $request->destination,
            'weight'            => $request->berat,
            'courier'           => $request->courier
        ]);

        $ongkir = $data['rajaongkir']['results'];

        return ResponseFormatter::success("Data Kota Berhasil Diambil", $ongkir);
    }


}
