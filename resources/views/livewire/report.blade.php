<div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        
      </div>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @elseif(session()->has('err'))
    <div class="alert alert-danger">
        {{ session('err') }}
    </div>
    @endif
    <div class="row" style="margin-top: 20px">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Download Laporan Penjualan</h3>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  
                  <th>Tanggal Awal</th>
                  <th></th>
                  <th>Tanggal Akhir</th>
        
                </tr>
              </thead>
              <tbody>
                <tr>
                    <form wire:submit.prevent="download">
                        
                        <td><input wire:model="awal" type="date" class="form-control"></td>
                        <td>-</td>
                        <td><input wire:model="akhir" type="date" class="form-control" min="{{ $awal }}"></td>
                        <td><button class="btn btn-success" type="submit">Download</button></td>
                    </form>
                </tr>
              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
   
  </div>