<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPaginate;
use App\Models\ProdukModel;
use App\Models\PengaturanModel;

class ProductCard extends Component
{
    public function render()
    {
        $stokMinim = PengaturanModel::select('stok_minimal')->get();
        $stokAman = ProdukModel::where("stok",">",$stokMinim[0]->stok_minimal)->count();
        
        $stokHampirHabis = ProdukModel::where(
            "stok","<=",$stokMinim[0]->stok_minimal
        )->where(
            "stok",">",0
        )->count();
        
        $stokHabis = ProdukModel::where("stok","=",0)->count();
        
        return view('livewire.product-card')->with(["aman"=>$stokAman, "hampirHabis"=>$stokHampirHabis, "habis"=>$stokHabis]);
    }
}
