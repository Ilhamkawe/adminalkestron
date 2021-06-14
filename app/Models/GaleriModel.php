<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriModel extends Model
{
    use HasFactory;
    
    protected $table = "product_galleries";
    protected $fillable = ["product_id", "photo_url"];

    public function product(){

        return $this->belongsTo(ProdukModel::class, "product_id", "id" );

    }

    public function getPhotoAttribute($value){
        return url('storage/'.$value);
    }

}
