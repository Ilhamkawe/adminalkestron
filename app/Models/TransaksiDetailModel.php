<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetailModel extends Model
{
    use HasFactory;
    
    protected $table = "transaction_detail";
    protected $fillable = ["transaction_id","product_id","qty"];

    public function transaksi(){
        return $this->belongsTo(TransaksiModel::class, "transaction_id" ,"id");
    }

    public function produk(){
        return $this->belongsTo(ProdukModel::class, "product_id", "id");
    }

}
