<div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        
      </div>
    </div>
    
    <div class="row" style="margin-top: 20px">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Input Data Kategori</h3>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  
                  <th>*</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                    <form wire:submit.prevent="storeKategori">
                        <td>*</td>
                        <td>
                          <input type="text" wire:model="nama" class="form-control">
                        </td>
                        <td><button class="btn btn-success"  type="submit" id="store">Tambah</button></td>
                    </form>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 20px">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Data Kategori</h3>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kategori as $k)
                <tr>
                    <td>*</td>
                    <td>{{ $k->nama }}</td>
                    <td><button class="btn btn-danger" wire:click="SelectItem('Hapus',{{ $k->id }})">Hapus</button></td>
                </tr>
                @empty
                <tr>
                    <td colspan="10"><center><h1>Belum Ada Data</h1></center></td>
                </tr>
                @endforelse
              </tbody>
              {{ $kategori->links('pagination::bootstrap-4') }}
            </table>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalDeleteKategori" tabindex="-1" role="dialog" aria-labelledby="modalFormPending" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormPending">Hapus Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <center><img class="img-fluid" src="{{ asset('assets/img/icons/exclamation-mark.svg') }}" width="300px"></img></center>
            <center><h2 style="margin-top: 15px">Apakah anda Yakin ?</h2></center>
            <div class="row" style="margin-top: 30px">
              <div class="col-md-6">
                <button type="button" class="btn btn-danger btn-block" wire:click="closeModal('Hapus')" data-dismiss="modal" >Yakin</button>         
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
  
  