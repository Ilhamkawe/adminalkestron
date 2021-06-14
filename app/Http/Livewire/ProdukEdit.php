<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JenisModel;
use App\Models\SatuanModel;
use App\Models\ProdukModel;
use App\Models\BrandModel;
use App\Models\GaleriModel;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ProdukEdit extends Component
{   
    public $produkId;
    public $nama;
    public $kategori;
    public $kode;
    public $stok;
    public $satuan;
    public $deskripsi;
    public $brand; 
    public $harga;

    public function mount($produkId){

        $produk = ProdukModel::find($produkId);

        if($produk){
            $this->produkId = $produk->id;
            $this->nama = $produk->nama;
            $this->kategori = $produk->jenis_id;
            $this->kode = $produk->kode;
            $this->stok = $produk->stok;
            $this->satuan = $produk->satuan;
            $this->deskripsi = $produk->deskripsi;
            $this->brand = $produk->brand;
            $this->harga = $produk->harga;
        }

    }

    public function updateProduk(){
        
        $this->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'kode' => 'required',
            'stok' => 'required|integer',
            'satuan' => 'required',
            'deskripsi' => 'required',
            'brand' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        if($this->produkId){

            $produk = ProdukModel::find($this->produkId);

            if($produk){

                $produk->update([
                    'kode' => $this->kode,
                    'nama' => $this->nama,
                    'slug' => Str::slug($this->nama),
                    'jenis_id' => $this->kategori,
                    'stok' => $this->stok,
                    'satuan' => $this->satuan,
                    'deskripsi' => $this->deskripsi,
                    'brand' => $this->brand,
                    'harga' => $this->harga,
                ]);

            }

        }
        
        return redirect()->route('produk.index'); 
    }

    public function render()
    {   
        $data1 = BrandModel::all();
        $data2 = JenisModel::all();
        $data3 = SatuanModel::all();
        return view('livewire.produk-edit')->with(['brands'=>$data1,'jenis'=>$data2, 'satuans'=>$data3]);;
    }



}
