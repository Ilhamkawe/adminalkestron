<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;

class Transaksi extends Component
{
    public $search;
    public $search2;
    public $search3;
    public $PENDING;
    // public $SEMUA;
    public $GAGAL;
    public $SUKSES;
    public $selectItem;
    public $no_resi;

    protected $queryString = [
        'search'
    ];

    protected $rules = [
        'no_resi' => 'required',
    ];

    public function render()
    {   
        // $data = TransaksiModel::orderBy('created_at', 'ASC')->paginate(10);
       
        
        
        $data=$this->search == null ? TransaksiModel::where('transaksi_status','PENDING')->paginate(10,['*'], 'pending') : TransaksiModel::where('uuid','like','%'.$this->search.'%')->where('transaksi_status','PENDING')->latest()->paginate(10);
        
        $data2=$this->search2 == null ?TransaksiModel::where('transaksi_status','SUKSES')->where('resi_kirim'," ")->paginate(10,['*'], 'sukses') : TransaksiModel::where('uuid','like','%'.$this->search2.'%')->where('transaksi_status','SUKSES')->latest()->paginate(10);
        
        $data3=$this->search3 == null ?TransaksiModel::where('transaksi_status','GAGAL')->paginate(10,['*'], 'gagal'): TransaksiModel::where('uuid','like','%'.$this->search3.'%')->where('transaksi_status','GAGAL')->latest()->paginate(10);

        return view('livewire.transaksi')->with(['transaksi1'=> $data2,'transaksi2'=> $data,'transaksi3'=> $data3 ]);
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
        $transaksi = TransaksiModel::with('transactionDetail.produk')->find($this->selectItem);
        if($status == "GAGAL"){
            foreach($transaksi->transactionDetail as $detail){
                ProdukModel::find($detail->product_id)->increment('stok',$detail->qty);
            }
        }
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
