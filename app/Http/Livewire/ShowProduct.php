<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPaginate;
use App\Models\ProdukModel;
use App\Models\GaleriModel;

class ShowProduct extends Component
{

    public $selectItem;
    public $search;

    protected $queryString = [
        'search'
    ];

    public function render()
    {   
        return view('livewire.show-product')->with(['produk'=> $this->search == null ? ProdukModel::latest()->orderBy('nama','ASC')->paginate(20) : ProdukModel::where('kode','like','%'.$this->search.'%')->latest()->orderBy('nama','ASC')->paginate(20)]);
    }

    public function selectItem($itemId){

        $this->selectItem = $itemId;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function destroy(){

        ProdukModel::destroy($this->selectItem);
        GaleriModel::where('product_id', $this->selectItem)->delete();
        $this->dispatchBrowserEvent('closeDeleteModal');

    }

}
