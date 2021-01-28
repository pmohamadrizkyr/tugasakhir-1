@extends('layouts.admin')
@section('title', 'HALAMAN KATEGORI')
@section('content')

        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="py-4 d-flex justify-content-end align-items-center">
                        <h1 class="mr-auto">Tabel Kategori</h1>
                        {{-- sudah mempunyai route name bawaan karena memakai resource, php artisan route:list kita bisa lihat
                        kita bisa pake route name atau url, sama aja sebenarnya --}}
                        @can('create', App\Kategori::class)
                            <a href="{{ url('/kategoris/create') }}" class="btn btn-primary">
                                Tambah Kategori
                            </a>
                        @endcan
                    </div>
                    @if (session()->has('pesan'))
                        <div class="alert alert-success" role="alert">
                        {{ session()->get('pesan') }}
                        </div>
                    @endif
                    @if (session()->has('hapus'))
                    <div class="alert alert-danger" role="alert">
                    {{ session()->get('hapus') }}
                    </div>
                @endif
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Nama Supervisor</th>
                            <th>Jumlah Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoris as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @can('view', $kategori)
                                    <a href="{{ url('/kategoris/'.$kategori->id) }}">{{ $kategori->nama_kategori }}</a>
                                    @endcan
                                    @cannot('view', $kategori)
                                        {{ $kategori->nama_kategori }}
                                    @endcannot
    
                                </td>
                                <td>{{ $kategori->nama_supervisor }}</td>
                                <td>{{ $kategori->jumlah_kategori }}</td>
                            </tr>
                            
                        @empty
                            <td colspan="6" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection