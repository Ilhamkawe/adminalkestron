<div class="col-lg-6 col-5 text-right">
    @error('gambarProduk')
        <div style="color: #f5365c">
            {{ $message }}
        </div>
    @enderror
    <form wire:submit.prevent="store">
        <label for="gambar" class="btn btn-lg btn-neutral">Tambah Gambar</label>
        <input type="file" wire:model="gambarProduk" id="gambar" lang="en" onchange="setTimeout(function(){document.getElementById('store').click()}, 1300)" hidden>
        {{-- <input type="text" wire:model="gambarProduk"> --}}
        <button id="store" type="submit" hidden></button>
    </form>
</div>

{{--  --}}