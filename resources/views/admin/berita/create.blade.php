@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Berita
        </h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Berita</h6>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('admin.berita.store') }}">
                @csrf

                <div class="form-group">
                    <label class="font-weight-bold">Judul</label>
                    <input type="text" name="judul" class="form-control"
                           placeholder="Judul berita..." required>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Konten</label>
                    <textarea id="konten" name="konten" rows="5" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Thumbnail (ambil dari galeri)</label>
                    <select name="galeri_id" class="form-control" required>
                        <option value="">-- Pilih Gambar --</option>
                        @foreach($galeri as $g)
                        <option value="{{ $g->id }}">
                            {{ $g->judul }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Kategori Berita</label>
                    <select name="kategori" class="form-control" required>
                        <option value="berita" {{ old('kategori', $data->kategori ?? '') == 'berita' ? 'selected' : '' }}>Berita</option>
                        <option value="prestasi" {{ old('kategori', $data->kategori ?? '') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>Kembali
                    </a>

                    <button class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
