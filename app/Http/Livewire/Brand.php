<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BrandModel;

class Brand extends Component
{
    public $brand;
    public $selectItem;

    public function render()
    {
        $data = BrandModel::latest()->paginate(10);
        return view('livewire.brand')->with(['brands' => $data]);
    }

    public function storeBrand(){
        $this->validate([
            'brand' => 'required'
        ]);

        BrandModel::create(['nama' => $this->brand]);
        session()->flash('message', 'Brand Berhasil ditambah.');
        $this->render();

    }

    public function SelectItem($aksi, $id){
        $this->selectItem = $id; 
        if($aksi == "Hapus"){
            $this->dispatchBrowserEvent('openDeleteBrandModal');
        }
    }

    public function closeModal($aksi){
        if($aksi == "Hapus"){
            $this->destroyBrand($this->selectItem);
            $this->dispatchBrowserEvent('closeDeleteBrandModal');
        }
    }
    
    public function destroyBrand($id){
        BrandModel::destroy($id);
        session()->flash('message', 'Brand Berhasil dihapus.');
        $this->render();
    }
}
