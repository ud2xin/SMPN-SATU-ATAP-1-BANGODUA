@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="mb-4 text-center">Galeri Sekolah</h2>

    <div class="row">

        @foreach ($galeri as $g)
        <div class="col-md-3 mb-4">
            <a href="{{ route('galeri.show', $g->id) }}">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/'.$g->gambar) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                </div>
            </a>
            <h6 class="mt-2 text-center">{{ $g->judul }}</h6>
        </div>
        @endforeach

    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $galeri->links() }}
    </div>

</div>
@endsection
