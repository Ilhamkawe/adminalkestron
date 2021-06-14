<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\RajaOngkirController;
use App\Http\Controllers\API\TransaksiController;
use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\BrandKategoriController;

/*
|--------------------------------------------------------------------------
| API Routes
|----------------------------------------------------- ---------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Produk API
Route::get('produk',[ProductController::class, 'all']);
Route::get('produk/brand',[BrandKategoriController::class, 'brand']);
Route::get('produk/kategori',[BrandKategoriController::class, 'kategori']);

// Transaksi API
Route::get('transaksi/{id}/',[TransaksiController::class, 'get']);
Route::get('transaksi/{id}/all',[TransaksiController::class, 'getAll']);
Route::post('checkout',[CheckoutController::class, 'checkout']);

// RajaOngkir API
Route::get('provinsi',[RajaOngkirController::class, 'getProvinsi']);
Route::get('kota/{id}',[RajaOngkirController::class, 'getKota']);
Route::post('ongkir',[RajaOngkirController::class, 'checkOngkir']);

// Produk API
Route::get('produk/brand',[BrandKategoriController::class, 'brand']);
Route::get('produk/kategori',[BrandKategoriController::class, 'kategori']);

// User Auth
Route::post('login',[AuthController::class, 'checkUser']);
Route::post('register',[AuthController::class, 'register']);
Route::put('update/{id}/user',[AuthController::class, 'update']);
Route::put('update/{id}/password',[AuthController::class, 'changePassword']);

// Lain-Lain
Route::post('testCheckout',[CheckoutController::class, 'testCheckout']);
Route::get('banner',[BannerController::class, 'index']);

