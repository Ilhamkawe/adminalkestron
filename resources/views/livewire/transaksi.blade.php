<div class="container-fluid mt--6">
  <div class="row">
    
  </div>
    <div class="row" style="margin-top: 20px">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Data Transaksi</h3>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <button  class="btn btn-lg btn-success" wire:model="SUKSES" disabled>Sukses</button>
                {{-- <button  class="btn btn-lg btn-warning" wire:model="PENDING" wire:click ="setState('PENDING')">Pending</button> --}}
                {{-- <button  class="btn btn-lg btn-danger" wire:model="GAGAL" wire:click ="setState('GAGAL')">Gagal</button> --}}
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
                  <th>Aksi</th>
                </tr>
                <div class="col-xl-12" style="margin-bottom: 10px">
                  <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                      <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" wire:model="search2" placeholder="Cari transaksi Berdasarkan Kode" type="text">
                      </div>
                    </div>
                   
                  </form>
                </div>
              </thead>
              <tbody>
                @forelse ($transaksi1 as $t)
                  <tr>
                    <td>{{ $t->id }}</td>
                    <td><a href="{{ route('transaksi.show', $t->id) }}">{{ $t->uuid }}</a></td>
                    <td>{{ $t->customer_id }}</td>
                    <td>{{ "Rp.".number_format((float)$t->transaksi_total,0) }}</td>
                    <td><span @if ($t->transaksi_status == "PENDING")
                        class="badge badge-pill badge-lg badge-warning"
                    @elseif($t->transaksi_status == "SUKSES")
                        class="badge badge-pill badge-lg badge-success"
                    @elseif($t->transaksi_status == "GAGAL")
                        class="badge badge-pill badge-lg badge-danger"
                    @else
                        
                    @endif>{{$t->transaksi_status}}</span></td>
                    <td>
                        <a class="btn btn-info btn-icon" href="{{ route('transaksi.show', $t->id) }}"><span class="fas fa-info"></span></a>
                        @if ($t->transaksi_status == "PENDING")
                        <button class="btn btn-success btn-icon" wire:click="selectItem({{ $t->id }},'Sukses')"><span class="fas fa-check"></span></button>
                        <button class="btn btn-danger btn-icon" wire:click="selectItem({{ $t->id }},'Gagal')"><span class="fas fa-ban"></span></button>
                        @elseif($t->transaksi_status == "SUKSES")
                        <button class="btn btn-warning btn-icon" wire:click="selectItem({{ $t->id }},'Pending')"><span class="fas fa-spinner"></span></button>
                        <button class="btn btn-danger btn-icon" wire:click="selectItem({{ $t->id }},'Gagal')"><span class="fas fa-ban"></span></button>
                        <button class="btn btn-success btn-icon" wire:click="selectItem({{ $t->id }},'Kirim')"><span class="fas fa-truck"></span></button>
                        @elseif($t->transaksi_status == "GAGAL")
                        <button class="btn btn-success btn-icon" wire:click="selectItem({{ $t->id }},'Sukses')"><span class="fas fa-check"></span></button>
                        <button class="btn btn-warning btn-icon" wire:click="selectItem({{ $t->id }},'Pending')"><span class="fas fa-spinner"></span></button>
                        @endif
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
            {{ $transaksi1->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 20px">
      <div class="col-xl-8">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Data Transaksi</h3>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <button  class="btn btn-lg btn-warning" wire:model="SUKSES" disabled>PENDING</button>
                {{-- <button  class="btn btn-lg btn-warning" wire:model="PENDING" wire:click ="setState('PENDING')">Pending</button> --}}
                {{-- <button  class="btn btn-lg btn-danger" wire:model="GAGAL" wire:click ="setState('GAGAL')">Gagal</button> --}}
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
                  <th>Aksi</th>
                </tr>
                <div class="col-xl-12" style="margin-bottom: 10px">
                  <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                      <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" wire:model="search" placeholder="Cari transaksi Berdasarkan Kode" type="text">
                      </div>
                    </div>
                   
                  </form>
                </div>
              </thead>
              <tbody>
                @forelse ($transaksi2 as $t)
                  <tr>
                    <td>{{ $t->id }}</td>
                    <td><a href="{{ route('transaksi.show', $t->id) }}">{{ $t->uuid }}</a></td>
                    <td>{{ $t->customer_id }}</td>
                    <td>{{ "Rp.".number_format((float)$t->transaksi_total,0) }}</td>
                    <td><span @if ($t->transaksi_status == "PENDING")
                        class="badge badge-pill badge-lg badge-warning"
                    @elseif($t->transaksi_status == "SUKSES")
                        class="badge badge-pill badge-lg badge-success"
                    @elseif($t->transaksi_status == "GAGAL")
                        class="badge badge-pill badge-lg badge-danger"
                    @else
                        
                    @endif>{{$t->transaksi_status}}</span></td>
                    <td>
                        <a class="btn btn-info btn-icon" href="{{ route('transaksi.show', $t->id) }}"><span class="fas fa-info"></span></a>
                        @if ($t->transaksi_status == "PENDING")
                        <button class="btn btn-success btn-icon" wire:click="selectItem({{ $t->id }},'Sukses')"><span class="fas fa-check"></span></button>
                        <button class="btn btn-danger btn-icon" wire:click="selectItem({{ $t->id }},'Gagal')"><span class="fas fa-ban"></span></button>
                        @elseif($t->transaksi_status == "SUKSES")
                        <button class="btn btn-warning btn-icon" wire:click="selectItem({{ $t->id }},'Pending')"><span class="fas fa-spinner"></span></button>
                        <button class="btn btn-danger btn-icon" wire:click="selectItem({{ $t->id }},'Gagal')"><span class="fas fa-ban"></span></button>
                        @elseif($t->transaksi_status == "GAGAL")
                        <button class="btn btn-success btn-icon" wire:click="selectItem({{ $t->id }},'Sukses')"><span class="fas fa-check"></span></button>
                        <button class="btn btn-warning btn-icon" wire:click="selectItem({{ $t->id }},'Pending')"><span class="fas fa-spinner"></span></button>
                        @endif
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
            {{ $transaksi2->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Data Transaksi</h3>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <button  class="btn btn-lg btn-danger" wire:model="SUKSES" disabled>GAGAL</button>
                {{-- <button  class="btn btn-lg btn-warning" wire:model="PENDING" wire:click ="setState('PENDING')">Pending</button> --}}
                {{-- <button  class="btn btn-lg btn-danger" wire:model="GAGAL" wire:click ="setState('GAGAL')">Gagal</button> --}}
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  {{-- <th>#</th> --}}
                  <th>Kode Transaksi</th>
                  <th>Aksi</th>
                </tr>
                <div class="col-xl-12" style="margin-bottom: 10px">
                  <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                      <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" wire:model="search3" placeholder="Cari transaksi Berdasarkan Kode" type="text">
                      </div>
                    </div>
                   
                  </form>
                </div>
              </thead>
              <tbody>
                @forelse ($transaksi3 as $t)
                  <tr>
                    {{-- <td>{{ $t->id }}</td> --}}
                    <td><a href="{{ route('transaksi.show', $t->id) }}">{{ $t->uuid }}</a></td>
                    {{-- <td>{{ $t->customer_id }}</td>
                    <td>{{ $t->transaksi_total }}</td>
                    <td><span @if ($t->transaksi_status == "PENDING")
                        class="badge badge-pill badge-lg badge-warning"
                    @elseif($t->transaksi_status == "SUKSES")
                        class="badge badge-pill badge-lg badge-success"
                    @elseif($t->transaksi_status == "GAGAL")
                        class="badge badge-pill badge-lg badge-danger"
                    @else
                        
                    @endif>{{$t->transaksi_status}}</span></td> --}}
                    <td>
                        <a class="btn btn-info btn-icon" href="{{ route('transaksi.show', $t->id) }}"><span class="fas fa-info"></span></a>
                        @if ($t->transaksi_status == "PENDING")
                        <button class="btn btn-success btn-icon" wire:click="selectItem({{ $t->id }},'Sukses')"><span class="fas fa-check"></span></button>
                        <button class="btn btn-danger btn-icon" wire:click="selectItem({{ $t->id }},'Gagal')"><span class="fas fa-ban"></span></button>
                        @elseif($t->transaksi_status == "SUKSES")
                        <button class="btn btn-warning btn-icon" wire:click="selectItem({{ $t->id }},'Pending')"><span class="fas fa-spinner"></span></button>
                        <button class="btn btn-danger btn-icon" wire:click="selectItem({{ $t->id }},'Gagal')"><span class="fas fa-ban"></span></button>
                        @elseif($t->transaksi_status == "GAGAL")
                        <button class="btn btn-success btn-icon" wire:click="selectItem({{ $t->id }},'Sukses')"><span class="fas fa-check"></span></button>
                        <button class="btn btn-warning btn-icon" wire:click="selectItem({{ $t->id }},'Pending')"><span class="fas fa-spinner"></span></button>
                        @endif
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
            {{ $transaksi3->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    {{-- <div class="modal fade" id="modalFormDetail" tabindex="-1" role="dialog" aria-labelledby="modalFormDetail" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormDetail">Detail Pemesanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-top: 40px">
            @livewire('transaksi-detail')
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div> --}}
    <div class="modal fade" id="modalFormBerhasil" tabindex="-1" role="dialog" aria-labelledby="modalFormBerhasil" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormBerhasil">Ubah Status ke Sukses</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <center><img class="img-fluid" src="{{ asset('assets/img/icons/exclamation-mark.svg') }}" width="300px"></img></center>
            <center><h2 style="margin-top: 15px">Apakah anda Yakin ?</h2></center>
            <div class="row" style="margin-top: 30px">
              <div class="col-md-6">
                <button type="button" class="btn btn-danger btn-block" wire:click="closeModal('Sukses')" data-dismiss="modal" >Yakin</button>         
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
    <div class="modal fade" id="modalFormGagal" tabindex="-1" role="dialog" aria-labelledby="modalFormGagal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormGagal">Ubah status ke Gagal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <center><img class="img-fluid" src="{{ asset('assets/img/icons/exclamation-mark.svg') }}" width="300px"></img></center>
            <center><h2 style="margin-top: 15px">Apakah anda Yakin ?</h2></center>
            <div class="row" style="margin-top: 30px">
              <div class="col-md-6">
                <button type="button" class="btn btn-danger btn-block" wire:click="closeModal('Gagal')" data-dismiss="modal" >Yakin</button>         
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
    <div class="modal fade" id="modalFormPending" tabindex="-1" role="dialog" aria-labelledby="modalFormPending" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormPending">Ubah status ke Pending</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <center><img class="img-fluid" src="{{ asset('assets/img/icons/exclamation-mark.svg') }}" width="300px"></img></center>
            <center><h2 style="margin-top: 15px">Apakah anda Yakin ?</h2></center>
            <div class="row" style="margin-top: 30px">
              <div class="col-md-6">
                <button type="button" class="btn btn-danger btn-block" wire:click="closeModal('Pending')" data-dismiss="modal" >Yakin</button>         
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
    <div wire:ignore.self class="modal fade" id="modalFormResi" tabindex="-1" role="dialog" aria-labelledby="modalFormResi" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalFormPending">Kirim Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h2 style="margin-top: 15px">Masukan Nomer Resi Pengiriman</h2>
            <form wire:submit.prevent="closeModal('Kirim')">
            <center>
              <input type="text" class="form-control" wire:model="no_resi" placeholder="Masukan Nomer Resi">
            </center>
            @error('no_resi') <span class="error" style="color:red">{{ $message }}</span> @enderror
            <div class="row" style="margin-top: 30px">
              <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-block">Yakin</button>         
              </div>  
            </form>
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
  
  