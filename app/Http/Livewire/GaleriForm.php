<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\GaleriModel;

class GaleriForm extends Component
{
    use WithFileUploads;
    
    public $idProduk;
    public $gambarProduk;

    

    public function render()
    {
        return view('livewire.galeri-form');
    }

    public function store(){
        $this->validate([
            'gambarProduk' => 'image'
        ]);

        GaleriModel::create([
            'product_id' => $this->idProduk, 
            'photo_url' => $this->gambarProduk->store('assets/produk','public')
        ]);
        $this->emitTo('produk-galeri', 'refresh');
    }
    
}
