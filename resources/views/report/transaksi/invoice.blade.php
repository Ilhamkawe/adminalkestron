<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="kop" style="text-align: center;">
      <h2 style="font-weight: bold;">Pt. Konsen Medisia Alkestron</h2>
      <p style="">Rukan Sentra Office Blok A, jalan Boulevard Raya Nomor 05, Grand Galaxy City, Kel. Jakasetia, Kec. Bekasi Selatan, Kota Bekasi, Prov. Jawa Barat . </p>
      <p>Telpon : 0878787878 , Email : konsen@alkestron@gmail.com</p>
      <hr width="80%" style="height: 1px;">
    </div>

    <div class="container-fluid">
        <center><h4>Invoice {{ $transaksi->uuid }}</h4></center>
        <h6>Pembeli : {{ $transaksi->customerInfo->nama }}</h6>
        <h6>Penerima : {{ $transaksi->nama }}</h6>
        <h6>Alamat : {{ $transaksi->alamat }}</h6>
        <h6>No. Telp : {{ $transaksi->no_telpon }}</h6>
        <h6>No. Resi : {{ $transaksi->resi_kirim }}</h6>
        <h6 style="float: right">{{ $transaksi->tanggal }}</h6>
        <br>
        
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Qty</th>
                <th scope="col">Harga/pcs</th>
                <th scope="col">Total Harga</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($transaksi->transactionDetail as $t)
              <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $t->produk->kode }}</td>
                <td>{{ $t->produk->nama }}</td>
                <td>{{ $t->qty }}</td>
                <td>{{ "Rp.".number_format((float)$t->produk->harga,0) }}</td>
                <td>{{ "Rp.".number_format((float)$t->produk->harga * $t->qty) }}</td>
              </tr>
              @php
                  $no++
              @endphp
              @endforeach
              <tr>
                <th scope="row" colspan="5">Ongkos Kirim</th>
                <td>{{"Rp.".number_format((float) $transaksi->ongkir,0) }}</td>
              </tr>
              <tr>
                  <th scope="row" colspan="4">PPN</th>
                  <td>{{ $pengaturan->pajak.'%' }}</td>
                  <td>{{ "Rp.".number_format((float)$transaksi->pajak,0)}}</td>
                </tr>
                <tr>
                  <th scope="row" colspan="5">Total Pembayaran</th>
                  <td>{{ "Rp." . number_format((float)$transaksi->transaksi_total,0) }}</td>
                </tr>
            </tbody>
          </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  </body>
</html>