@extends('layouts.default')

@section('content')
<div class="content-wrapper">
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
              </ol>
            </nav>
          </div>
        </div>
        <livewire:dashboard-card/> 
      </div>
    </div>
  </div>
    
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 text-white mb-0">Nilai Penjualan</h5>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update="" data-prefix="Rp." data-suffix="">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">/Bulan</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    {{-- <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span> --}}
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h5 class="h3 mb-0">Jumlah Penjualan</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>

        {{-- table transaksi --}}

        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Transaksi Siap Diproses</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Kode Transaksi</th>
                    <th>Customer</th>
                    <th>Total Transaksi</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($transaksi as $t)
                    <tr>
                      <td>{{ $t->id }}</td>
                      <td><a href="{{ route('transaksi.show', $t->id) }}">{{ $t->uuid }}</a></td>
                      <td>{{ $t->customerInfo->nama }}</td>
                      <td>{{ "Rp.".number_format((float)$t->transaksi_total) }}</td>
                      <td><span class="badge badge-pill badge-lg badge-success">{{$t->transaksi_status}}</span></td>
                    </tr>
                  @empty
                      <tr>
                        <td colspan="8">
                          <center><h1>Tidak ada data</h1></center>
                        </td>
                      </tr>
                  @endforelse                
                </tbody>
                {{ $transaksi->links('pagination::bootstrap-4') }}
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Transaksi Berhasil diProses</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Kode Transaksi</th>
                    <th>Customer</th>
                    <th>Total Transaksi</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($terkirim as $t)
                    <tr>
                      <td>{{ $t->id }}</td>
                      <td><a href="{{ route('transaksi.show', $t->id) }}">{{ $t->uuid }}</a></td>
                      <td>{{ $t->customerInfo->nama }}</td>
                      <td>{{ "Rp.".number_format((float)$t->transaksi_total) }}</td>
                      <td><span class="badge badge-pill badge-lg badge-success">{{$t->transaksi_status}}</span></td>
                    </tr>
                  @empty
                      <tr>
                        <td colspan="8">
                          <center><h1>Tidak ada data</h1></center>
                        </td>
                      </tr>
                  @endforelse                
                </tbody>
                {{ $terkirim->links('pagination::bootstrap-4') }}
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Barang Habis</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($produkHabis as $h)
                    <tr>
                      <td>*</td>
                      <td><a href="{{ route('produk.edit', $h->id) }}">{{ $h->kode }}</a></td>
                      <td>{{ $h->nama }}</td>
                      <td>{{ $h->stok }}</td>
                    </tr>
                  @empty
                      <tr>
                        <td colspan="8">
                          <center><h1>Tidak ada data</h1></center>
                        </td>
                      </tr>
                  @endforelse                
                </tbody>
                {{ $produkHabis->links('pagination::bootstrap-4') }}
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Barang Segera Habis</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($produkSegeraHabis as $h)
                    <tr>
                      <td>*</td>
                      <td><a href="{{ route('produk.edit', $h->id) }}">{{ $h->kode }}</a></td>
                      <td>{{ $h->nama }}</td>
                      <td>{{ $h->stok }}</td>
                    </tr>
                  @empty
                      <tr>
                        <td colspan="8">
                          <center><h1>Tidak ada data</h1></center>
                        </td>
                      </tr>
                  @endforelse 
                </tbody>
                {{ $produkSegeraHabis->links('pagination::bootstrap-4') }}
              </table>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
    
  </div>
  <script>
    var sales = {{ json_encode($salesPast6Month) }}; 
    var salesMonth =  @json($past6Month);
    var incomeMonth = @json($incomePast6Month);
  </script>
@endsection

