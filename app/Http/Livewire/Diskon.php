<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProdukModel;
use App\Models\DiskonModel;
use Carbon\Carbon;

use Livewire\WithPagination;


class Diskon extends Component
{
    use WithPagination;
    public $kode;
    public $diskon= 0;
    public $tanggalMulai;
    public $tanggalSelesai;

    protected $rules = [
        'kode' => 'required|exists:App\Models\ProdukModel,kode|unique:App\Models\DiskonModel,id_produk',
        'diskon' => 'required',
        'tanggalMulai' => 'required',
        'tanggalSelesai' => 'required'
    ];

    public function render()
    {
        $data = ProdukModel::get(['kode','id',"nama"]);
        $diskon = DiskonModel::with('getProduk')->latest()->paginate(20);
        return view('livewire.diskon')->with(['kodeBarang'=>$data,'dataDiskon'=>$diskon]);
    }

    public function storeDiskon(){

        $this->validate();

        $produk = ProdukModel::where('kode',$this->kode)->limit(1)->get(['harga','id']);
        $cekDiskon = DiskonModel::where('id_produk', $produk[0]->id)->get();
        // dd(count($cekDiskon));
        if(count($produk) == 0){
            session()->flash('err', 'Tidak ada produk dengan kode '.$this->kode);
        }else if(count($cekDiskon)>0){
            session()->flash('err', 'Produk '.$this->kode.' sudah ada diskon ');
        }else{
            $potongan = $produk[0]->harga * ($this->diskon / 100);
            $hargaDiskon = $produk[0]->harga - $potongan;
            // dd($hargaDiskon);
            DiskonModel::create([
                'id_produk' => $produk[0]->id,
                'diskon' => $this->diskon, 
                'harga_awal' => $produk[0]->harga,
                'harga_diskon' => $hargaDiskon,
                'tanggal_mulai' => $this->tanggalMulai, 
                'tanggal_selesai' => $this->tanggalSelesai, 
                'status' => 'PENDING',
    
            ]);
    
            session()->flash('message', 'Berhasil Tambah Diskon.');
            
        }
        return redirect()->route('produk.diskon');
    }

    public function deleteDiskon($id){
        DiskonModel::where('id_produk',$id)->delete();
        session()->flash('message', 'Berhasil Hapus Diskon.');
        $this->render();
    }

}
