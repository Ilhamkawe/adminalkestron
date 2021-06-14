<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = "product";
    protected $fillable = ["kode","nama","slug","jenis_id","harga","stok","satuan","deskripsi","brand","berat"];

    public function gallery(){
        return $this->hasMany(GaleriModel::class, "product_id");
    }
    public function jenisProduk(){
        return $this->belongsTo(JenisModel::class, "jenis_id", "id");
    }
    public function brandProduk(){
        return $this->belongsTo(BrandModel::class, "brand", "id");
    }
    public function satuanProduk(){
        return $this->belongsTo(SatuanModel::class, "satuan", "id");
    }
    public function getDiskon(){
        return $this->hasMany(DiskonModel::class, "id_produk")->where('status','AKTIF');
    }

}
