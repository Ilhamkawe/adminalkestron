<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TransaksiModel;
use App\Models\PengaturanModel;

class TransaksiDetail extends Component
{
    public $transaksiId;

    public function render()
    {    
        $data = TransaksiModel::with(['transactionDetail.produk'])->find($this->transaksiId);
        $data2 = PengaturanModel::find(1);
        return view('livewire.transaksi-detail')->with(['data' => $data,'pengaturan'=>$data2]);
    }
}
