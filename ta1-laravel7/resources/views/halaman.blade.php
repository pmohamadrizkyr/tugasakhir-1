@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- $judul mengambil dari datacontroller --}}
                    <div class="card-header">{{ $judul }}</div>
                    <div class="card-body">
                        <p>Halaman Utama</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
