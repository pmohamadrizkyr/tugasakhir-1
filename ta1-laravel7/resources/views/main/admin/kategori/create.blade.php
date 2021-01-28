@extends('layouts.admin')
@section('title', 'HALAMAN KATEGORI')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8 col-md-6">
                <h1 class="mr-auto">Tambah Kategori</h1>
                <hr>
                <form action="{{ url('/kategoris') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
                        @error('nama_kategori')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_supervisor">Nama Supervisor</label>
                        <input type="text" class="form-control @error('nama_supervisor') is-invalid @enderror" id="nama_supervisor" name="nama_supervisor" value="{{ old('nama_supervisor') }}">
                        @error('nama_supervisor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kategori">Jumlah Kategori</label>
                        <input type="text" class="form-control @error('jumlah_kategori') is-invalid @enderror" id="jumlah_kategori" name="jumlah_kategori" value="{{ old('jumlah_kategori') }}">
                        @error('jumlah_kategori')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
@endsection