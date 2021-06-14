<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <h3>Dear Mr/ Mrs {{ $customer[0]->nama }}</h3>
    <p>Terima kasih telah memesan barang di toko kami. Untuk menjamin kepuasan Anda dan keluarga, kami akan selalu meningkatkan kualitas, terus berinovasi produk dan layanan.</p>
    <p>Email ini merupakan ringkasan pembelian yang sudah user lakukan</p>
    <ul style="list-style: none;">
        <li>Nama Penerima : {{ $data[0]->nama }}</li>
        <li>Alamat Penerima :{{ $data[0]->alamat }} </li>
        <li>Kode Pos Penerima : {{ $data[0]->kode_pos }}</li>
        <li>No Telepon : {{ $data[0]->no_telpon }}</li>
        <li>
            <table border="1" class="table">
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                </tr>
                @foreach ($data[0]->transactionDetail as $d)
                <tr>
                    <td>{{ $d->produk->nama }}</td>
                    <td>{{ $d->qty }}</td>
                </tr>
                @endforeach
            </table>
        </li>
    </ul>
    <p>Berikut Lampiran Invoice : <a href="{{ route('transaksi.invoice',$data[0]->id) }}">Download</a></p>
    <br>Salam hangat,</br>
        
        Alkestron Store.
</body>
</html>
