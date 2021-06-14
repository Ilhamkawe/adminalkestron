<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <!-- Heading -->
        

        <ul class="navbar-nav">
          <li class="nav-item">

          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('index') }}">
              <i class="fas fa-chart-line text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('banner.index') }}">
              <i class="fas fa-expand text-primary"></i>
              <span class="nav-link-text">Banner</span>
            </a>
          </li>
          
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('produk.index') }}">
              <i class="ni ni-app text-primary"></i>
              <span class="nav-link-text">Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('produk.brand') }}">
              <i class="fas fa-tag text-primary"></i>
              <span class="nav-link-text">Brand</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('produk.kategori') }}">
              <i class="fas fa-circle text-primary"></i>
              <span class="nav-link-text">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('produk.satuan') }}">
              <i class="fas fa-syringe text-primary"></i>
              <span class="nav-link-text">Satuan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('produk.diskon') }}">
              <i class="fas fa-percent text-primary"></i>
              <span class="nav-link-text">Diskon</span>
            </a>
          </li>
        </ul>
        <hr class="my-3">
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('transaksi.index') }}">
              <i class="fas fa-store-alt text-primary"></i>
              <span class="nav-link-text">Transaksi (Belum Terkirim)</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('transaksi.terkirim') }}">
              <i class="ni ni-cart text-primary"></i>
              <span class="nav-link-text">Transaksi (Terkirim)</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('report.transaksi') }}">
              <i class="fas fa-file-alt text-primary"></i>
              <span class="nav-link-text">Laporan Penjualan</span>
            </a>
          </li>
        </ul>
        <hr class="my-3">
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('pengaturan.index') }}">
              <i class="ni ni-settings-gear-65 text-primary"></i>
              <span class="nav-link-text">Pengaturan</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>