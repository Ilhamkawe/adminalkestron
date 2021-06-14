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
              <h3 class="mb-0">Input Data Diskon</h3>
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
                <th>Banner</th>
                <th>Aksi</th>
                
                
              </tr>
            </thead>
            <tbody>
              <tr>
                  <form wire:submit.prevent="storeBanner">
                      <td>*</td>
                      <td>
                        <input type="file" wire:model="banner" class="form-control" onchange="setTimeout(function(){document.getElementById('store').enabled = true}, 1300)">   
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
              <h3 class="mb-0">Data Banner</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Banner</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($banners as $b)
              <tr>
                  <td>*</td>
                  <td><img src="{{ url("/storage/".$b->banner_path) }}" class="img-fluid" alt="" width="200px" height="200px"></td>
                  <td><button class="btn btn-danger" wire:click="SelectItem('Hapus',{{ $b->id }})">Hapus</button></td>
              </tr>
              @empty
              <tr>
                  <td colspan="10"><center><h1>Belum Ada Data</h1></center></td>
              </tr>
              @endforelse
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalDeleteBanner" tabindex="-1" role="dialog" aria-labelledby="modalFormPending" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFormPending">Hapus Data Banner</h5>
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

