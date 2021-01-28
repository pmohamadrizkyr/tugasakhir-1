@extends('layouts.admin')
@section('title', 'HALAMAN KATEGORI')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-4 d-flex justify-content-end align-items-center">
                    <h1 class="mr-auto">Info Kategori {{ $kategori->nama_kategori }}</h1>
                    {{-- sudah mempunyai route name bawaan karena memakai resource, php artisan route:list kita bisa lihat
                    kita bisa pake route name atau url, sama aja sebenarnya --}}
                    <a href="{{ url('/kategoris/'.$kategori->id.'/edit') }}" class="btn btn-info">
                        Edit
                    </a>
                    @can('create', $kategori)
                        <form action="{{ url('/kategoris/'.$kategori->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    @endcan
                </div>
                <hr>
                <button type="submit" class="btn btn-dark"><a href="{{ url('/kategoris/') }}">Kembali</a></button>
                @if (session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                    {{ session()->get('pesan') }}
                    </div>
                @endif
                <ul>
                    <li>Nama kategori : {{ $kategori->nama_kategori }}</li>
                    <li>Nama Supervisor : {{ $kategori->nama_supervisor }}</li>
                    <li>Jumlah kategori : {{ $kategori->jumlah_kategori }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection