@extends('layouts.admin')
@section('title', 'HALAMAN PRODUK')
@section('content')
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                <div class="pt-3 d-flex justify-content-end align-items-center" >
                    <h1 class="h1 mr-auto">Detail Produk {{ $produk->name_produk }}</h1>
                    <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-primary">Edit Data</a>
                    <br>
                        <form action="{{ route('produks.destroy', $produk->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                </div>
                <hr>
                @if (session('pesan'))
                        <div class="alert alert-success" role="alert">
                        {{ session('pesan') }}
                        </div>
                    @endif
                <ul>
                    <li>Nik : {{ $produk->code }}</li>
                    <li>Nama : {{ $produk->name_produk }}</li>
                    <li>Gambar : {{ $produk->image }}</li>
                    <li>Stock : {{ $produk->stock == 'kosong' ? 'Kosong' : 'Ada' }}</li>
                    <li>Price : {{ $produk->price }}</li>
                    <li>Kategori : {{ $produk->kategori->nama_kategori }}</li>
                    <li>Dekripsi : {{ $produk->dekripsi->deks_ripsi }} </li>
                    <a href="{{ route('produks.index') }}" class="btn btn-info">Kembali</a>
                </ul>
                </div>
            </div>
        </div>
@endsection