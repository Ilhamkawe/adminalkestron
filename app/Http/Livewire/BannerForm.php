<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BannerModel;
use Livewire\WithFileUploads;

class BannerForm extends Component
{
    use WithFileUploads;
    public $banner;
    public $selectItem;

    public function render()
    {
        $data = BannerModel::latest()->paginate(5);
        return view('livewire.banner-form')->with(['banners' => $data]);
    }

    public function storeBanner(){
        $this->validate([
            'banner' => 'image'
        ]);

        BannerModel::create(['banner_path'=>$this->banner->store('assets/banner','public')]);
        session()->flash('message', 'Banner Berhasil ditambah.');
        $this->render();
    }

    public function SelectItem($aksi,$id){
        $this->selectItem = $id;
        if($aksi == "Hapus"){
            $this->dispatchBrowserEvent('openDeleteBannerModal');
        }
    }

    public function closeModal($aksi){
        if($aksi == "Hapus"){
            $this->destroyBanner($this->selectItem);
            $this->dispatchBrowserEvent('closeDeleteBannerModal');
        }
    }

    public function destroyBanner($id){
        BannerModel::destroy($id);
        session()->flash('message', 'Banner Berhasil dihapus.');
        $this->render();
    }

}
