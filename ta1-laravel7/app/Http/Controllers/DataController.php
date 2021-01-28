<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function daftarProduk(){
        return view('halaman', ['judul' => 'Daftar Produk']);
    }

    public function tabelProduk(){
        return view('halaman', ['judul' => 'Tabel Produk']);
    }

    public function blogProduk(){
        return view('halaman', ['judul' => 'Blog Produk']);
    }

}
