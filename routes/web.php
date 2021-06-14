<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BrandController;
use App\Models\ProdukModel;
use App\Models\JenisModel;
use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;
use App\Models\CustomerModel;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', function () {
    
    // $produk = JenisModel::with(['produk' => function($query){
    //     $query->where('nama','LIKE','%pip%');
    // },'produk.brandProduk'=>function($query){
    //     $query->where('nama','rex');
    // },'produk.gallery'])->where('nama','Swab')->get();
    
    /**
     * * cari data Produk berdasarkan nama dan brand
        $produk = ProdukModel::with(['jenisProduk','brandProduk'])->whereHas('jenisProduk' , function($q){
            $q->where('nama','Swab');
        })->whereHas('brandProduk',function($q){
            $q->where('nama','rex');
        })->where('nama','LIKE','%pip%')->get();
     * * ====================================================================================================
    */
    
    /**
     * ? Cari data Berdasarkan Nama
     * $produk = ProdukModel::with(['jenisProduk','brandProduk'])->where('nama','LIKE','%pip%');
     * ?=====================================================================================================
    */
        
    
    /**
     * ? Cari data Berdasarkan Brand
     * $produk = ProdukModel::with(['jenisProduk','brandProduk'])->whereHas('brandProduk',function($q){
            $q->where('nama','rex');
        })->get();
     *?=======================================================================================================
    */
        
    /**
     * ? Cari data Berdasarkan jenis
     * $produk = ProdukModel::with(['jenisProduk','brandProduk'])->whereHas('jenisProduk',function($q){
            $q->where('nama','Swab');
        })->get();
     *?=====================================================================================================
    */
    

    return $produk;
});

Route::middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Banner Route
    Route::get('banner',[BannerController::class, 'index'])->name('banner.index');
    // produk route
    Route::get('produk/satuan',[ProdukController::class, 'satuan'])->name('produk.satuan');
    Route::get('produk/brand',[BrandController::class, 'index'])->name('produk.brand');
    Route::get('produk/kategori',[ProdukController::class, 'kategori'])->name('produk.kategori');
    Route::get('produk/bin',[ProdukController::class, 'bin'])->name('produk.bin');
    Route::get('produk/{id}/restore',[ProdukController::class, 'restore'])->name('produk.restore');
    Route::get('produk/diskon',[ProdukController::class, 'diskon'])->name('produk.diskon');
    Route::resource('produk',ProdukController::class);
    // galeri route
    Route::get('galeri/bin',[GaleriController::class, 'bin'])->name('galeri.bin');
    Route::get('galeri/{id}/restore',[GaleriController::class, 'restore'])->name('galeri.restore');
    Route::resource('galeri',GaleriController::class);
    // transaksi route
    Route::get('transaksi/bin',[TransaksiController::class, 'bin'])->name('transaksi.bin');
    Route::get('transaksi/{id}/invoice',[TransaksiController::class, 'downloadInvoice'])->name('transaksi.invoice');
    Route::get('transaksi/{id}/restore',[TransaksiController::class, 'restore'])->name('transaksi.restore');
    Route::get('report/transaksi',[TransaksiController::class, 'report'])->name('report.transaksi');
    Route::get('transaksi/terkirim',[TransaksiController::class, 'terkirim'])->name('transaksi.terkirim');
    Route::resource('transaksi',TransaksiController::class);
    // Pengaturan route
    Route::resource('pengaturan',PengaturanController::class);
    // Logout
    Route::get('/logout',[AuthController::class, 'logout'])->name('Logout')->middleware('auth');

});
// Route Login
Route::get('/login',[AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'postLogin'])->name('postLogin')->middleware('guest');
Route::get('/BA',[AuthController::class, 'buatAkun'])->middleware('guest');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
