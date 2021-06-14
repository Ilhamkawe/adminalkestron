<div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Galeri Produk {{ $photo[0]->product->nama }}</h3>
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
                @forelse ($photo as $p)
                  <tr>
                    <td>{{ $p->id }}</td>
                    <td><img src="{{ url("/storage/".$p->photo_url) }}" class="img-fluid" alt="" width="200px" height="200px"></td>
                    <td>
                        <button class="btn btn-danger btn-icon" wire:click ="selectItem({{ $p->id }})"><span class="fas fa-times"></span></button>
                        
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
  
  