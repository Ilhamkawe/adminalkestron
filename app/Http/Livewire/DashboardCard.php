<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;
use App\Models\TransaksiDetailModel;

class DashboardCard extends Component
{
    public function render()
    {
        $transaksi = TransaksiModel::where('transaksi_status',"SUKSES");
        $produk = ProdukModel::count();
        $produkTerjual = TransaksiDetailModel::with('transaksi')->whereHas('transaksi', function($query){
            return $query->where('transaksi_status',"SUKSES");
        })->sum('qty');
        return view('livewire.dashboard-card')->with([
            'income' => $transaksi->sum('transaksi_total'),
            'berhasil' => $transaksi->count(),
            'terjual' => $produkTerjual,
            'produk' => $produk  
        ]);
    }
}
