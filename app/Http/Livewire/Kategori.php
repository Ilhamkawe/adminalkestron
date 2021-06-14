<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JenisModel;

class Kategori extends Component
{
    public $nama;
    public $selectItem;

    public function render()
    {
        $data = JenisModel::latest()->paginate(10);
        return view('livewire.kategori')->with(['kategori' => $data]);
    }

    public function storeKategori(){
        JenisModel::create([
            'nama' => $this->nama
        ]);

        session()->flash('message', 'Berhasil Tambah Kategori.');
        $this->nama = "";
        $this->render();
        
    }

    public function SelectItem($aksi,$id){
        $this->selectItem = $id;
        if($aksi == "Hapus"){
            $this->dispatchBrowserEvent('openDeleteKategoriModal');
        }
    }

    public function closeModal($aksi){
        if($aksi == "Hapus"){
            $this->destroyKategori($this->selectItem);
            $this->dispatchBrowserEvent('openDeleteKategoriModal');
        }
    }

    public function destroyKategori($id){
        JenisModel::destroy($id);

        session()->flash('message', 'Berhasil Hapus Kategori.');

        $this->render();
    }
}
