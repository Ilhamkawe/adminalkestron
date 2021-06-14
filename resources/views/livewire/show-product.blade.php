<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-12">
      <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative input-group-merge">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" wire:model="search" placeholder="Cari Barang Berdasarkan Kode" type="text">
          </div>
        </div>
        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </form>
    </div>
  </div>
  <div class="row" style="margin-top: 20px">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Data Produk</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Brand</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($produk as $d)
                <tr>
                  <td>{{ $d->id }}</td>
                  <td>{{ $d->kode }}</td>
                  <td><a href="#">{{ $d->nama }}</a></td>
                  <td>{{ $d->jenisProduk->nama }}</td>
                  <td>{{ $d->harga }}</td>
                  <td>{{ $d->stok .' '. $d->satuanProduk->nama }}</td>
                  <td>{{ $d->brandProduk->nama }}</td>
                  <td>
                      <a class="btn btn-primary btn-icon" href="{{ route('produk.edit', $d->id) }}" style="color: white"><span class="fas fa-pencil-alt"></span></a>
                      <a class="btn btn-info btn-icon" href="{{ route('galeri.show', $d->id) }}"><span class="fas fa-images"></span></a>
                      <button class="btn btn-danger btn-icon" wire:click ="selectItem({{ $d->id }})"><span class="fas fa-times"></span></button>
                    </td>
                </tr>
              @empty
                  <tr>
                    <td colspan="8">
                      <center><h1>Tidak ada data</h1></center>
                    </td>
                  </tr>
              @endforelse
              
            </tbody>
          </table>
          {{ $produk->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalFormDelete" tabindex="-1" role="dialog" aria-labelledby="modalFormDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFormDelete">Warning</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><img class="img-fluid" src="{{ asset('assets/img/icons/exclamation-mark.svg') }}" width="300px"></img></center>
          <center><h2 style="margin-top: 15px">Apakah anda Yakin ?</h2></center>
          <div class="row" style="margin-top: 30px">
            <div class="col-md-6">
              <button type="button" class="btn btn-danger btn-block" wire:click="destroy()" data-dismiss="modal" >Hapus</button>         
            </div>  
            <div class="col-md-6">
              <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
</div>

