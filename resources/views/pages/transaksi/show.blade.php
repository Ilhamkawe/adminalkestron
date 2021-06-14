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
       <div class="akses" style="margin-bottom: 30px">
        <a href="{{ route('transaksi.invoice', $id) }}" class="btn btn-danger btn-icon-text">
          <i class="mdi mdi-download btn-icon-prepend"></i>
          Download Pdf
        </a>
      </div>
      </div>
    </div>
  </div>
    <div class="row">
        <div class="col-md-4">
            <div class="container-fluid mt--6">
                <div class="row">
                  <div class="col-xl-12">
                    <div class="card">
                      <div class="card-header border-0">
                        <div class="row align-items-center">
                          <div class="col">
                            <h3 class="mb-0">Data Pembeli</h3>
                          </div>
                        </div>
                      </div>
                      <div class="container-fluid">
                        <form>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kode Transaksi</label>
                                <input class="form-control" type="text" value="{{ $data->uuid }}" id="example-text-input" disabled>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Pemesan</label>
                                <input class="form-control" type="text" value="{{ $data->customerInfo->nama }}" id="example-text-input" disabled>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Penerima</label>
                                <input class="form-control" type="text" value="{{ $data->nama }}" id="example-text-input" disabled>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Alamat</label>
                                <input class="form-control" type="text" value="{{ $data->alamat }}" id="example-text-input" disabled>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">No telp</label>
                                <input class="form-control" type="text" value="{{ $data->no_telpon }}" id="example-text-input" disabled>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                          
        </div>
        <div class="col-md-8">
            @livewire('transaksi-detail', ['transaksiId' => $id])
        </div>
    </div>
  </div>   
@endsection