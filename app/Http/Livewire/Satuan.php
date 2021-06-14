<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SatuanModel;

class Satuan extends Component
{

    public $satuan;
    public $selectItem;

    public function render()
    {
        $data = SatuanModel::latest()->paginate(10);
        return view('livewire.satuan')->with(['satuans' => $data]);
    }

    public function storeSatuan(){
        $this->validate([
            'satuan' => 'required'
        ]);

        SatuanModel::create(['nama' => $this->satuan]);
        session()->flash('message', 'Satuan Berhasil ditambah.');
        $this->render();

    }

    public function SelectItem($aksi, $id){
        $this->selectItem = $id; 
        if($aksi == "Hapus"){
            $this->dispatchBrowserEvent('openDeleteSatuanModal');
        }
    }

    public function closeModal($aksi){
        if($aksi == "Hapus"){
            $this->destroySatuan($this->selectItem);
            $this->dispatchBrowserEvent('closeDeleteSatuanModal');
        }
    }
    
    public function destroySatuan($id){
        SatuanModel::destroy($id);
        session()->flash('message', 'Satuan Berhasil dihapus.');
        $this->render();
    }

}
