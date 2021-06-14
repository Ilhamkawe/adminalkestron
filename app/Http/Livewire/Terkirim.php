<?php

namespace App\Http\Livewire;
use App\Models\TransaksiModel;


use Livewire\Component;

class Terkirim extends Component
{
    public $search;
    protected $queryString = [
        'search'
    ];

    public function render()
    {

        $data=$this->search == null ?TransaksiModel::where('transaksi_status','SUKSES')->where('resi_kirim' ,'!=', "")->paginate(10,['*'], 'sukses') : TransaksiModel::where('uuid','like','%'.$this->search.'%')->where('transaksi_status','SUKSES')->where('resi_kirim','!=',"")->latest()->paginate(10);
        return view('livewire.terkirim')->with(['transaksi1' => $data]);
    }

    public function selectItem($itemId, $aksi){
        
        $this->selectItem = $itemId;
        if($aksi == "Detail"){
            $this->dispatchBrowserEvent('openDetailModal');
        }else if($aksi == "Sukses"){
            $this->dispatchBrowserEvent('openBerhasilModal');
        }else if($aksi == "Pending"){
            $this->dispatchBrowserEvent('openPendingModal');
        }else if($aksi == "Gagal"){
            $this->dispatchBrowserEvent('openGagalModal');
        }else if($aksi == "Kirim"){
            $this->dispatchBrowserEvent('openResiModal');
        }

    }

    public function closeModal($aksi){
        if($aksi == "Detail"){
            $this->dispatchBrowserEvent('closeDetailModal');
        }else if($aksi == "Sukses"){
            $this->updateStatus("SUKSES");
            $this->dispatchBrowserEvent('closeBerhasilModal');
        }else if($aksi == "Pending"){
            $this->updateStatus("PENDING");
            $this->dispatchBrowserEvent('closePendingModal');
        }else if($aksi == "Gagal"){
            $this->updateStatus("GAGAL");
            $this->dispatchBrowserEvent('closeGagalModal');
        }else if($aksi == "Kirim"){
            $this->storeResi();
            $this->dispatchBrowserEvent('closeResiModal');
        }
    }

    public function updateStatus($status){
        $transaksi = TransaksiModel::find($this->selectItem);
        if($transaksi){
            $transaksi->update([
                'transaksi_status' => $status
            ]);
        }
        $this->render();
    }

    public function storeResi(){
        $this->validate();
        $transaksi = TransaksiModel::find($this->selectItem);
        
        if($transaksi){
            $transaksi->update([
                'resi_kirim' => $this->no_resi
            ]);
        }
        $this->dispatchBrowserEvent('closeResiModal');
        $this->render();
    }
}
