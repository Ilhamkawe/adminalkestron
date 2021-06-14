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
       <livewire:transaksi-card/>
       {{-- <div class="akses" style="margin-bottom: 30px">
        <button class="btn btn-success btn-icon-text">
          <i class="mdi mdi-download btn-icon-prepend"></i>
          Download Csv
        </button>
        <button class="btn btn-danger btn-icon-text">
          <i class="mdi mdi-download btn-icon-prepend"></i>
          Download Pdf
        </button>
      </div> --}}
      </div>
    </div>
  </div>
    <div class="row">
        <livewire:transaksi/>
    </div>
  </div>   
@endsection