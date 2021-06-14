<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiskonModel extends Model
{
    use HasFactory;

    protected $table = 'diskon';

    protected $fillable = ['id_produk','diskon','harga_awal','harga_diskon','tanggal_mulai','tanggal_selesai', 'status'];

    public function getProduk(){
        return $this->belongsTo(ProdukModel::class, 'id_produk', 'id');
    }

}
