@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>Edit Karya
    </h1>

    <div class="card shadow">
        <div class="card-header">
            <h6 class="font-weight-bold text-warning">Form Edit Karya</h6>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('admin.karya.update',$data->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="font-weight-bold">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul',$data->judul) }}" class="form-control @error('judul') is-invalid @enderror">
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama',$data->nama) }}" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan',$data->jabatan) }}" class="form-control @error('jabatan') is-invalid @enderror">
                    @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Kategori</label>
                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                        <option value="siswa" {{ $data->kategori=='siswa'?'selected':'' }}>Siswa</option>
                        <option value="guru" {{ $data->kategori=='guru'?'selected':'' }}>Guru</option>
                    </select>
                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Foto (ambil dari galeri)</label>
                    <select name="galeri_id" class="form-control @error('galeri_id') is-invalid @enderror">
                        @foreach($galeri as $g)
                            <option value="{{ $g->id }}" {{ $data->galeri_id==$g->id?'selected':'' }}>
                                {{ $g->judul }}
                            </option>
                        @endforeach
                    </select>
                    @error('galeri_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi',$data->deskripsi) }}</textarea>
                    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.karya.index') }}" class="btn btn-secondary">Kembali</a>

                    <button class="btn btn-warning">
                        <i class="fas fa-save mr-1"></i>Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
