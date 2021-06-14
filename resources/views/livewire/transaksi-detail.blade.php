<div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Barang Dibeli</h3>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>QTY</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $total = 0    
                @endphp  
                  {{-- {{ dd($data) }} --}}
                   @if ($data)
                    @forelse ($data->transactionDetail as $t)
                    <tr>
                      <td>*</td>
                      <td>{{ $t->produk->kode }}</td>
                      <td>{{ $t->produk->nama }}</td>
                      <td>{{ $t->qty }}</td>
                      <td>{{ "Rp.".number_format((float)$t->produk->harga * $t->qty) }}</td>
                      {{-- @php
                        $total += $t->produk->harga * $t->qty    
                      @endphp --}}
                    </tr>
                    @empty
                    <tr>
                      <td colspan="8">
                        <center><h1>Tidak ada data</h1></center>
                      </td>
                    </tr>  
                    @endforelse 
                   @endif
                    <tr>
                      <td>+</td>
                      <td colspan="3">Ongkos Kirim</td>
                      @if ($data->ongkir > 0)
                      <td>{{"Rp.".number_format((float) $data->ongkir,0) }}</td>
                      @else
                      <td>-</td>
                      @endif
                    </tr>
                    <tr>
                      <td>+</td>
                      <td colspan="2">PPN</td>
                      <td>{{ $pengaturan->pajak.'%' }}</td>
                      @if ($data->pajak > 0)
                      <td>{{ "Rp.".number_format((float)$data->pajak,0)}}</td>
                      @else
                      <td>-</td>
                      @endif
                    </tr>
                    <tr>
                      <td>+</td>
                      <td colspan="3">Total Harga</td>
                      <td>{{ "Rp." . number_format((float)$data->transaksi_total,0) }}</td>
                    </tr>
              </tbody>
            </table>  
          </div>
        </div>
      </div>
    </div>
  </div>
  
  