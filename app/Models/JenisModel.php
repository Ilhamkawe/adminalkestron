<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisModel extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $fillable = ['nama'];

    public function produk(){
        return $this->hasMany(ProdukModel::class, "jenis_id", "id");
    }

}
