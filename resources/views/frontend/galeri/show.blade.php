@extends('layouts.frontend')

@section('content')
<div class="container py-5">

    <a href="{{ route('galeri.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <h2>{{ $data->judul }}</h2>
    <p class="text-muted">{{ $data->created_at->format('d M Y') }}</p>

    <div class="text-center">
        <img src="{{ asset('storage/'.$data->gambar) }}" class="img-fluid mb-4" style="max-height: 500px; object-fit: contain;">
    </div>

    <p>{{ $data->deskripsi }}</p>

</div>
@endsection
