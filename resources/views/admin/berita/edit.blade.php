@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-4">
        <h1 class="h3 text-gray-800">
            <i class="fas fa-edit mr-2"></i>Edit Berita
        </h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-warning">Form Edit Berita</h6>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('admin.berita.update',$data->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="font-weight-bold">Judul</label>
                    <input type="text" name="judul"
                           class="form-control"
                           value="{{ $data->judul }}" required>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Konten</label>
                    <textarea name="konten" rows="5" class="form-control" required>{{ $data->konten }}</textarea>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Thumbnail (ambil dari galeri)</label>
                    <select name="galeri_id" class="form-control">
                        @foreach($galeri as $g)
                            <option value="{{ $g->id }}" {{ $data->galeri_id==$g->id ? 'selected' : '' }}>
                                {{ $g->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="berita" {{ $data->kategori=='berita'?'selected':'' }}>
                            Berita
                        </option>
                        <option value="prestasi" {{ $data->kategori=='prestasi'?'selected':'' }}>
                            Prestasi
                        </option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    <button class="btn btn-warning">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
