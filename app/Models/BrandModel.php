<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;

    protected $table = 'brand';
    protected $fillable = ['nama'];

    public function produk(){
        return $this->hasMany(ProdukModel::class, "jenis_id", "id");
    }

}
