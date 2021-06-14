<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
    <div class="kop" style="text-align: center;">
        <h2 style="font-weight: bold;">Pt. Konsen Medisia Alkestron</h2>
        <p style="">Rukan Sentra Office Blok A, jalan Boulevard Raya Nomor 05, Grand Galaxy City, Kel. Jakasetia, Kec. Bekasi Selatan, Kota Bekasi, Prov. Jawa Barat . </p>
        <p>Telpon : 0878787878 , Email : konsen@alkestron@gmail.com</p>
        <hr width="80%" style="height: 1px;">
    </div>

    <div class="container">
        <br>
        <h1>Laporan Penjualan</h1>
        <br>
        <h5>Periode : {{ $periode[0]. " - ".  $periode[1] }} </h5>
        <br>
        <br>
        <table class="table table-bordered" style="font-size: 12px">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Tgl</th>
                    <th>Nama</th>
                    <th>Total</th>
                    <th>Rincian</th>
                </tr>
            </thead>
            @php
                $total = 0;
            @endphp
            <tbody>
                @forelse ($transaksi as $t)
                <tr>
                    <td>{{$t->uuid }}</td>
                    <td>{{$t->tanggal}}</td>
                    <td>{{$t->customerInfo->nama}}</td>
                    <td>{{"Rp.".number_format((float)$t->transaksi_total,0)}}</td>
                    <td>
                        <ul>
                            @foreach ($t->transactionDetail as $d)
                                <li>{{ $d->produk->nama."(".$d->qty.")"}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @php
                    $total += $t->transaksi_total;
                @endphp
                @empty
                <tr>
                    <td colspan="4">Tidak ada data</td>
                </tr>
                @endforelse
                <tr>
                    <th colspan="4">Total Penjualan : </th>
                    <td>{{"Rp.".number_format((float) $total,0) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>