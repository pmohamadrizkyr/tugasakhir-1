<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/produks', 'ProdukController')->middleware('auth');
// Route::get('/produks/{produk}', 'ProdukController@show')->name('produk.show')->middleware('auth');
Route::get('/', 'KategoriController@index')->middleware('auth');
Route::resource('/kategoris', 'KategoriController')->middleware('auth');
Route::get('/kategoris/{kategori}', 'KategoriController@show')->name('kategori.show')->middleware('auth')->middleware('can:view,kategori');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/daftar-produk', 'DataController@daftarProduk')->middleware('auth');
// Route::get('/tabel-produk', 'DataController@tabelProduk')->middleware('auth');
// Route::get('/blog-produk', 'DataController@blogProduk')->middleware('auth');


