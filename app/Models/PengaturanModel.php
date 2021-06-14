<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanModel extends Model
{
    use HasFactory;

    protected $table = "pengaturan";
    protected $fillable = ["stok_minimal","pajak"];

}
