<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = "transaction";
    protected $fillable = ["uuid","customer_id","nama","no_telpon","alamat","kode_pos","admin_id","ongkir","pajak","transaksi_total","transaksi_status","tags","resi_kirim"];

    public function transactionDetail(){
        return $this->hasMany(TransaksiDetailModel::class, "transaction_id");
    }
    public function customerInfo(){
        return $this->belongsTo(CustomerModel::class, 'customer_id', 'id');
    }

}
