<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Form Produk {{ $nama }}</h3>
            </div>    
          </div>
        </div>
        <div class="card-body">
          <form wire:submit.prevent="storeProduk">
            <div class="form-group">
              <label for="" class="form-control-label">Pilih Gambar</label>
              <div class="custom-file form-control">
                <input type="file" wire:model = "gambar" class="custom-file-input" id="customFileLang" lang="en" >
                <label class="custom-file-label" for="customFileLang">Select file</label>
              </div>
              @error('gambar')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Nama</label>
                <input class="form-control" id="nama" type="text" wire:model="nama" placeholder="Masukan Nama Produk" id="example-text-input">
                @error('nama')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Kode Barang</label>
                <input class="form-control" type="text" wire:model="kode" placeholder="Masukan Kode barang" id="example-text-input">
                @error('kode')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
                <label for="example-search-input" class="form-control-label">Kategori</label>
                <select class="form-control" wire:model="kategori">
                  <option selected >Pilih Kategori ...</option>
                  @foreach ($jenis as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                  @endforeach
                </select>
                @error('kategori')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Stok Barang</label>
              <input class="form-control" type="text" wire:model="stok" placeholder="Masukan Stok barang" id="example-text-input">
              @error('stok')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="example-email-input" class="form-control-label">Satuan</label>
                <select class="form-control" wire:model="satuan">
                  <option selected >Pilih Satuan ...</option>
                  @foreach ($satuans as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                  @endforeach
                </select>
                @error('satuan')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Berat(gram)</label>
              <input class="form-control" id="nama" type="number" min="0" wire:model="berat" placeholder="Masukan berat dalam gram" id="example-text-input">
              @error('berat')
                  <div style="color: #f5365c">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="form-group">
                <label for="example-url-input" class="form-control-label">Deskripsi</label>
               <textarea class="form-control" wire:model="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
                @error('deskripsi')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="form-group">
              <label for="example-email-input" class="form-control-label">Brand</label>
              <select class="form-control" wire:model="brand">
                <option selected >Pilih Brand ...</option>
                @foreach ($brands as $b)
                  <option value="{{ $b->id }}">{{ $b->nama }}</option>
                @endforeach
              </select>
              @error('brand')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
          </div>
            {{-- <button onclick="alert(document.getElementById('pilihanbrand').value)">test value brand</button> --}}
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Harga Barang</label>
                <input class="form-control" type="text" wire:model="harga" placeholder="Masukan Harga barang" id="example-text-input">
                @error('harga')
                    <div style="color: #f5365c">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Input</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>