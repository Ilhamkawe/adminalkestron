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

class ProductForm extends Component
{   

    use WithFileUploads;

    public $nama;
    public $kategori;
    public $kode;
    public $stok;
    public $satuan;
    public $deskripsi;
    public $brand; 
    public $harga;
    public $gambar;
    public $berat;

    public function render()
    {
        $data1 = BrandModel::all();
        $data2 = JenisModel::all();
        $data3 = SatuanModel::all();
        return view('livewire.product-form')->with(['brands'=>$data1,'jenis'=>$data2, 'satuans'=>$data3]);
    }

    public function storeProduk(){
        // dd($this->gambar);
        $this->validate([
            'gambar' => "image",
            'nama' => 'required',
            'kategori' => 'required',
            'kode' => 'required',
            'stok' => 'required|integer',
            'satuan' => 'required',
            'deskripsi' => 'required',
            'brand' => 'required|integer',
            'harga' => 'required|integer',
            'berat' => 'required|integer'
        ]);
        
        ProdukModel::create([
            'kode' => $this->kode,
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama),
            'jenis_id' => $this->kategori,
            'stok' => $this->stok,
            'satuan' => $this->satuan,
            'deskripsi' => $this->deskripsi,
            'brand' => $this->brand,
            'harga' => $this->harga,
            'berat' => $this->berat
        ]);

        if($this->gambar){
            $idProduk = ProdukModel::select('id')->where("kode",$this->kode)->limit(1)->get()[0]->id; 
            GaleriModel::create([
                "product_id" => $idProduk,
                "photo_url" => $this->gambar->store("assets/produk",'public')
            ]);  
        }
        
        return redirect()->route('produk.index');
    }

    

}
