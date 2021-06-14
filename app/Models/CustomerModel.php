<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = "customer";
    protected $fillable = ["id", "nama", "email","password", "alamat", "no_telp","api_token","prov_index","kode_pos","provinsi","kota"];

    public function transaction(){
        return $this->hasMany(TransaksiModel::class, "customer_id");
    }

}
