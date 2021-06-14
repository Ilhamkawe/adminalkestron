<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TransaksiModel;
use PDF;

class Report extends Component
{
    public $awal;
    public $akhir;
    public function render()
    {
        return view('livewire.report');
    }

    public function download(){
        $data = TransaksiModel::with(['customerInfo','transactionDetail.produk'])->where('transaksi_status','SUKSES')->where('created_at', '>=', $this->awal)->where('created_at', '<=', $this->akhir)->get();
        
        if($data){
            foreach($data as $t){
                $t['tanggal'] = $t['created_at']->isoFormat('dddd, D MMMM Y');
            }
        }
        
        $pdf = PDF::loadview('report.transaksi.bulanan',['transaksi'=>$data, 'periode'=>[$this->awal, $this->akhir]])->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "report.pdf"
       );
    }
}
