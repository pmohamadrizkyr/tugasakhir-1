@extends('layouts.admin')
{{-- @extends('layouts.app') --}}
@section('title', 'HALAMAN PRODUK')
@section('content')
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="py-4">
                        <h2>Tabel Data Produk</h2>
                        <a href="{{ route('produks.create') }}" class="btn btn-primary">Tambah Data Produk</a>
                    </div>
                    @if (session('pesan'))
                        <div class="alert alert-success">
                            {{ session('pesan') }}
                        </div>
                    @endif
                    @if (session('hapus'))
                        <div class="alert alert-danger">
                            {{ session('hapus') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Nama Produk</th>
                                <th>Gambar</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Dekripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produks as $produk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ url('/produks/'.$produk->id) }}">{{ $produk->code }}</a></td>
                                    <td>{{ $produk->name_produk }}</td>
                                    <td>
                                        <img src="{{ Storage::url($produk->image) }}" alt="gambar" style="width: 150px">
                                    </td>
                                    <td>{{ $produk->stock == 'kosong' ? 'kosong' : 'tersedia' }}</td>
                                    <td>{{ $produk->price }}</td>
                                    <td>{{ $produk->kategori->nama_kategori }}</td>
                                    <td>{{ $produk->dekripsi->deks_ripsi }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection