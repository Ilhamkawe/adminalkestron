@extends('layouts.default')

@section('content')
      <!-- Header -->
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
       
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <form action="{{ route('pengaturan.update', 1) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-xl-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Stok Minimal</h3>
                    </div>    
                  </div>
                </div>
                <div class="card-body">
                  <div class="input-group">
                      <input type="text" value="{{ $pengaturan->stok_minimal }}" class="form-control" placeholder="Masukan Stok Minimal" name="stok_minimal">
                    </div>
                    @error('stok_minimal')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Pajak</h3>
                    </div>    
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                      <div class="input-group">
                        <input type="text" value="{{ $pengaturan->pajak }}" class="form-control" name="pajak" placeholder="Masukan Persen Pajak" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                      </div>
                      @error('pajak')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12">
              <button type=submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
            </div>
          </div>
    </form>
  </div>
@endsection