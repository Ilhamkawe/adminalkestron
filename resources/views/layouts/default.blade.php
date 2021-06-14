<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  @livewireStyles
  {{-- style --}}
  @include('includes.style')
   <script src="{{ mix('js/app.js') }}"></script>
</head>

<body>
  <!-- Sidenav -->
  @include('includes.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    @include('includes.navbar')
    <!-- Header -->
   @yield('content')
  </div>
  <!-- Footer -->
  <footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6">
        <div class="copyright text-center  text-lg-left  text-muted">
          &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  @livewireScripts
  <script>
    window.addEventListener("openDeleteModal", event => {
      $("#modalFormDelete").modal('show')
    })

    window.addEventListener("closeDeleteModal", event => {
      $("#modalFormDelete").modal('hide')
    })
    window.addEventListener("openDetailModal", event => {
      $("#modalFormDetail").modal('show')
    })

    window.addEventListener("closeDetailModal", event => {
      $("#modalFormDetail").modal('hide')
    })
    window.addEventListener("openBerhasilModal", event => {
      $("#modalFormBerhasil").modal('show')
    })

    window.addEventListener("closeBerhasilModal", event => {
      $("#modalFormBerhasil").modal('hide')
    })
    window.addEventListener("openGagalModal", event => {
      $("#modalFormGagal").modal('show')
    })

    window.addEventListener("closeGagalModal", event => {
      $("#modalFormGagal").modal('hide')
    })
    window.addEventListener("openPendingModal", event => {
      $("#modalFormPending").modal('show')
    })
    window.addEventListener("closePendingModal", event => {
      $("#modalFormPending").modal('hide')
    })
    window.addEventListener("openResiModal", event => {
      $("#modalFormResi").modal('show')
    })
    window.addEventListener("closeResiModal", event => {
      $("#modalFormResi").modal('hide')
    })
    window.addEventListener("openDeleteKategoriModal", event => {
      $("#modalDeleteKategori").modal('show')
    })
    window.addEventListener("closeDeleteKategoriModal", event => {
      $("#modalDeleteKategori").modal('hide')
    })
    window.addEventListener("openDeleteBannerModal", event => {
      $("#modalDeleteBanner").modal('show')
    })
    window.addEventListener("closeDeleteBannerModal", event => {
      $("#modalDeleteBanner").modal('hide')
    })
    window.addEventListener("openDeleteSatuanModal", event => {
      $("#modalDeleteSatuan").modal('show')
    })
    window.addEventListener("closeDeleteSatuanModal", event => {
      $("#modalDeleteSatuan").modal('hide')
    })
    window.addEventListener("openDeleteBrandModal", event => {
      $("#modalDeleteBrand").modal('show')
    })
    window.addEventListener("closeDeleteBrandModal", event => {
      $("#modalDeleteBrand").modal('hide')
    })
  </script>
  @include('includes.script')

</body>

</html>
