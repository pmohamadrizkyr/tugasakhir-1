@extends('layouts.admin')
@section('title', 'HALAMAN PRODUK')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Data Produk</h1>
                <hr>
                <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                    <div class="form-group">
                        <label for="code">code</label>
                        <input type="text" name="code" id="code" class="form-control @error('code')is-invalid @enderror" value="{{ old('code') }}">
                        @error('code')
                            <div class="alert alert-danger">{{ $message }}</div>  
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name_produk">Nama Produk</label>
                        <input type="text" name="name_produk" id="name_produk" class="form-control @error('name_produk') is-invalid @enderror" value="{{ old('name_produk') }}">
                        @error('name_produk')
                            <div class="alert alert-danger">{{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock :</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stock" id="stock" value="tersedia" {{ old('stock') == 'tersedia' ? 'checked' : '' }}>
                        <label class="form-check-label" for="tersedia">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stock" id="stock" value="kosong" {{ old('stock') == 'kosong' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kosong">Kosong</label>
                    </div>
                    @error('stock')
                        <div class="alert alert-danger">{{ $message }}</div>  
                    @enderror

                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_id">Kategori :</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('category_id') == "$kategori->nama_kategori" ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>  
                        @enderror
                        <div class="form-group">
                            <label for="deks_ripsi">Dekripsi</label>
                            <input type="text" name="deks_ripsi" id="deks_ripsi" class="form-control @error('deks_ripsi')is-invalid @enderror" value="{{ old('deks_ripsi') }}">
                            @error('deks_ripsi')
                                <div class="alert alert-danger">{{ $message }}</div>  
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
