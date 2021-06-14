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
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('produk.edit') }}" class="btn btn-lg btn-neutral">Update Produk</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Detail Produk</h3>
              </div>
              
            </div>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nama</label>
                  <input class="form-control" type="text" placeholder="Masukan Nama Produk" id="example-text-input" disabled>
              </div>
              <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Kode Barang</label>
                  <input class="form-control" type="text" placeholder="Masukan Kode barang" id="example-text-input" disabled>
              </div>
              <div class="form-group">
                  <label for="example-search-input" class="form-control-label">Kategori</label>
                  <select class="form-control" disabled>
                    <option selected disabled>Pilih Kategori ...</option>
                    <option>Kategori1</option>
                    <option>Kategori2</option>
                    <option>Kategori3</option>
                    <option>Kategori4</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="example-email-input" class="form-control-label">Satuan</label>
                  <select class="form-control" disabled>
                    <option selected disabled>Pilih Satuan ...</option>
                    <option>Satuan1</option>
                    <option>Satuan2</option>
                    <option>Satuan3</option>
                    <option>Satuan4</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="example-url-input" class="form-control-label">Deskripsi</label>
                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
              </div>
              <div class="form-group">
                  <label for="example-tel-input" class="form-control-label">Brand</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Pilih Brand" aria-describedby="button-addon2" disabled>
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary" type="button" id="button-addon2" data-toggle="modal" data-target="#exampleModal" disabled>Cari</button>
                    </div>
                  </div>
              </div>
              
          </form>
          </div>
        </div>
        <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Gambar Produk</h3>
                </div>
                
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><img src="" alt=""></td>
                    <td>
                        <button class="btn btn-danger btn-icon"><span class="ni ni-fat-remove"></span></button>
                      </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
      </div>
      
    
  </div>
  
  </div>
  
@endsection

