<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\PengaturanModel;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.transaksi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = TransaksiModel::with('customerInfo')->find($id);
        return view('pages.transaksi.show')->with(['data'=>$data, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function bin(){
        return view('pages.produk.bin');
    }
    public function restore($id){
        $data = TransaksiModel::with('customerInfo')->find($id);
        $data1 = PengaturanModel::find(1);
        return view('report.transaksi.invoice',['transaksi'=>$data,'pengaturan'=>$data1]);    
    }
    public function downloadInvoice($id){
        $data = TransaksiModel::with('customerInfo')->find($id);
        $data['tanggal'] = $data['created_at']->isoFormat('dddd, D MMMM Y');
        $data1 = PengaturanModel::find(1);
        $pdf = PDF::loadview('report.transaksi.invoice',['transaksi'=>$data,'pengaturan'=>$data1]);
        // return $pdf->download('invoice-'.$data->uuid.'.pdf');
        return $pdf->stream();
    }

    public function downloadBulanan(Request $req){
        
    }

    public function report(){
        return view('pages.transaksi.report');
    }

    public function terkirim(){
        return view('pages.transaksi.terkirim');
    }


}
