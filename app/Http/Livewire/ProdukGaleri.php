<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GaleriModel;

class ProdukGaleri extends Component
{   
    public $idProduk;
    public $selectItem;
    protected $listeners = ['refresh' => 'render'];

    public function render()
    {
        // dd($this->idProduk);
        $data = GaleriModel::with('product')->where('product_id',$this->idProduk)->get();
        return view('livewire.produk-galeri')->with(['photo'=>$data]);
    }

    public function selectItem($itemId){

        $this->selectItem = $itemId;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function destroy(){

        GaleriModel::destroy($this->selectItem);
        $this->dispatchBrowserEvent('closeDeleteModal');

    }

}
