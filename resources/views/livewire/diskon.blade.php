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
                <h3 class="mb-0">Input Data Diskon</h3>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  
                  <th>Kode</th>
                  <th>Diskon (%)</th>
                  <th>Mulai</th>
                  <th>Selesai</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <form wire:submit.prevent="storeDiskon">
                        
                        <td>
                            <input list="kode" class="form-control" type="text" wire:model="kode">
                            <datalist id="kode" >
                                @foreach ($kodeBarang as $k)
                                    <option data-value="{{$k->id}}" >{{ $k->kode }}</option>
                                @endforeach
                            </datalist>
                            @error('kode') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                        </td>
                        <td><input class="form-control" type="number" wire:model="diskon" min="1" max="100">@error('kode') <span class="diskon" style="color: red;">{{ $message }}</span> @enderror</td>
                        <td><input class="form-control" type="datetime-local" id="kalender"  wire:model="tanggalMulai" min="">@error('tanggalMulai') <span class="error" style="color: red;">{{ $message }}</span> @enderror</td>
                        <td><input class="form-control" type="datetime-local" id="kalender"  wire:model="tanggalSelesai" min="{{ $tanggalMulai }}">@error('tanggalSelesai') <span class="error" style="color: red;">{{ $message }}</span> @enderror</td>
                        <td><button class="btn btn-success" type="submit">Tambah</button></td>
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
                <h3 class="mb-0">Data Diskon</h3>
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
                  <th>Diskon</th>
                  <th>Harga Awal</th>
                  <th>Harga Sekarang</th>
                  <th>Mulai Diskon</th>
                  <th>Akhir Diskon</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($dataDiskon as $d)
                <tr>
                    <td>*</td>
                    <td>{{ $d->getProduk->kode }}</td>
                    <td>{{ $d->getProduk->nama }}</td>
                    <td>{{ $d->diskon }}%</td>
                    <td>{{ "Rp." . number_format((float)$d->harga_awal,0) }}</td>
                    <td>{{ "Rp." . number_format((float)$d->harga_diskon,0) }}</td>
                    <td>{{ $d->tanggal_mulai }}</td>
                    <td>{{ $d->tanggal_selesai }}</td>
                    <td><span @if ($d->status == "PENDING")
                      class="badge badge-pill badge-lg badge-warning"
                      @elseif($d->status == "AKTIF")
                      class="badge badge-pill badge-lg badge-success"
                      @else
                      class="badge badge-pill badge-lg badge-danger"
                    @endif>{{ $d->status }}</span></td>
                    <td>
                      <form wire:submit.prevent="deleteDiskon({{ $d->id_produk }})">
                        <Button class="btn btn-danger"><span class="fas fa-ban"></span></Button>
                      </form>
                    </td>
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
   
  </div>
  
  <script>
      document.querySelector('input[list]').addEventListener('input', function(e) {
    var input = e.target,
        list = input.getAttribute('list'),
        options = document.querySelectorAll('#' + list + ' option'),
        hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
        inputValue = input.value;

    hiddenInput.value = inputValue;

    for(var i = 0; i < options.length; i++) {
        var option = options[i];

        if(option.innerText === inputValue) {
            hiddenInput.value = option.getAttribute('data-value');
            break;
        }
    }
});
  </script>