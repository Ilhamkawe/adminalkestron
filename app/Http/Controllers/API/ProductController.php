<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Models\JenisModel;
use App\Models\BrandModel;

class ProductController extends Controller
{
    public function all(Request $req){

        // request
        $id = $req->input('id');
        $limit = $req->input('limit',6);
        $nama = $req->input('nama');
        $slug = $req->input('slug');
        $price_from = $req->input('price_from');
        $price_to = $req->input('price_to');
        $jenis = $req->input('jenis');
        $brand = $req->input('brand');
        $search = $req->input('search');
        $stok = $req->input('idBarang');
        
        //cari data stok barang 
        if($stok){
            $produk = ProdukModel::where('id',$stok)->get('stok');

            if($produk){
                return ResponseFormatter::success('Data Produk Berhasil di ambil', $produk);
            }else{
                return ResponseFormatter::error('Data Produk Tidak ada',null,404);
            }
        } 

        // cari berdasarkan id
        if($id){
            $produk = ProdukModel::with(['gallery','jenisProduk','satuanProduk','brandProduk','getDiskon'])->find($id);
            if($produk){
                return ResponseFormatter::success('Data Produk Berhasil di ambil', $produk);
            }else{
                return ResponseFormatter::error('Data Produk Tidak ada',null,404);
            }
        }

        // Cari berdasarkan slug
        if($slug){
            $produk = ProdukModel::with(['gallery','jenisProduk','satuanProduk','brandProduk','getDiskon'])->where('slug',$slug)->first();

            if($produk){
                return ResponseFormatter::success('Data Produk Berhasil di ambil', $produk);
            }else{
                return ResponseFormatter::error('Data Produk Tidak ada',null,404);
            }
        }
        
        
        // Cari data berdasarkan jenis dan atau brand
        if($jenis || $brand || $search){
            // berdasarkan jenis dan brand
            if($jenis == 'all' && $brand == 'all' && $search == ""){
                $produk = JenisModel::with(['produk.gallery','produk.satuanProduk','produk.brandProduk','produk.getDiskon'])->get();
                return ResponseFormatter::success('Data Produk Berdasarkan Jenis Berhasil di Ambil', $produk);
            }else{
                
                    if($search != '' && $brand != 'all' && $jenis == 'all'){
                        /**
                         * ? mencari produk berdasarkan nama, yang memiliki brand tertentu pada semua jenis/kategori
                         */
                        $produk = ProdukModel::with(['gallery','jenisProduk','satuanProduk','brandProduk','getDiskon'])->whereHas('brandProduk',function($q) use($brand){
                            $q->where('nama',$brand);
                        })->where('nama','LIKE','%'.$search.'%')->get();
                        return ResponseFormatter::success('Data Produk berhasil dicari dengan data : '.$search.','.$brand.','.$jenis, $produk); 
                    
                    }else if($search != '' && $brand == 'all' && $jenis != 'all'){
                         /**
                         * ? mencari produk berdasarkan nama, yang memiliki jenis tertentu pada semua brand
                         */
                        $produk = ProdukModel::with(['gallery','jenisProduk','satuanProduk','brandProduk','getDiskon'])->whereHas('jenisProduk',function($q) use($jenis){
                            $q->where('nama',$jenis);
                        })->where('nama','LIKE','%'.$search.'%')->get();
                        return ResponseFormatter::success('Data Produk berhasil dicari dengan data : '.$search.','.$brand.','.$jenis, $produk); 
                    
                    }else if($search == '' && $brand != 'all' && $jenis != 'all'){
                         /**
                         * ? mencari produk yang memiliki jenis tertentu pada semua brand
                         */
                        $produk = ProdukModel::with(['gallery','jenisProduk','satuanProduk','brandProduk','getDiskon'])->whereHas('jenisProduk',function($q) use($jenis){
                            $q->where('nama',$jenis);
                        })->whereHas('brandProduk',function($q) use($brand){
                            $q->where('nama',$brand);
                        })->get();
                        return ResponseFormatter::success('Data Produk berhasil dicari dengan data : '.$search.','.$brand.','.$jenis, $produk); 

                    }else if($search != ''){
                        /**
                         * ? mencari produk berdasarkan nama produk
                         */
                        $produk = ProdukModel::with(['gallery','jenisProduk','satuanProduk','brandProduk','getDiskon'])->where('nama','LIKE','%'. $search.'%')->get();
                        return ResponseFormatter::success('Data Produk Berhasil di Ambil', $produk); 
                    
                    }else if($brand != 'all'){
                        /**
                         * ?cari data barang berdasarkan brand
                         */
                        $produk = ProdukModel::with(['gallery','getDiskon','satuanProduk','jenisProduk','brandProduk'])->whereHas('brandProduk',function($q) use($brand){
                            $q->where('nama', $brand);
                        })->get();
                        return ResponseFormatter::success('Data Produk Berdasarkan brand Berhasil di Ambil', $produk); 
                    
                    }else if($jenis != 'all'){
                        /**
                         * ?cari data barang berdasarkan jenis
                         */
                        $produk = ProdukModel::with(['gallery','getDiskon','satuanProduk','jenisProduk','brandProduk'])->whereHas('jenisProduk',function($q) use($jenis){
                            $q->where('nama',$jenis);
                        })->get();
                        return ResponseFormatter::success('Data Produk Berdasarkan Jenis Berhasil di Ambil', $produk); 
                    }
                
            }
        }
        
        $produk = ProdukModel::with(['gallery','jenisProduk','satuanProduk','brandProduk','getDiskon']);

        /**
         * ? ambil data dari range harga 
         */

        // if($price_from){
        //     $product->where('price','>=',$price_from);
        // }

        // if($price_to){
        //     $product->where('price','<=',$price_to);
        // }

        return ResponseFormatter::success('Data Produk Berhasil di Ambil',$produk->paginate($limit));
    }


}
