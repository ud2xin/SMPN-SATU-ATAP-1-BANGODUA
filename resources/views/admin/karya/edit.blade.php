@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-edit mr-2"></i>Edit Karya
        </h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">Form Edit Karya</h6>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.karya.update', $karya->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- User --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">User (Pemilik akun)</label>
                            <select name="user_id" class="form-control" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" 
                                        {{ $user->id == $karya->user_id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Nama Pemilik --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Pemilik</label>
                            <input type="text" name="nama" class="form-control" 
                                   value="{{ $karya->nama }}" required>
                        </div>
                    </div>

                    {{-- Foto Pemilik --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Foto Pemilik</label>
                            <input type="file" name="foto_pemilik" class="form-control">
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>

                            @if ($karya->foto_pemilik)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $karya->foto_pemilik) }}"
                                         width="100" class="rounded shadow-sm">
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Info Pemilik --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Info Pemilik</label>
                            <input type="text" name="info_pemilik" class="form-control" 
                                   value="{{ $karya->info_pemilik }}">
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Judul Karya</label>
                            <input type="text" name="judul" class="form-control" 
                                   value="{{ $karya->judul }}" required>
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Kategori</label>
                            <select name="kategori" class="form-control" required>
                                <option value="Karya_siswa" {{ $karya->kategori == 'Karya_siswa' ? 'selected' : '' }}>
                                    Karya Siswa
                                </option>
                                <option value="karya_guru" {{ $karya->kategori == 'karya_guru' ? 'selected' : '' }}>
                                    Karya Guru
                                </option>
                            </select>
                        </div>
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" 
                                   value="{{ $karya->tanggal }}" required>
                        </div>
                    </div>

                    {{-- Gambar 1, 2, 3 --}}
                    @foreach([1,2,3] as $i)
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Gambar {{ $i }} (dari Galeri)</label>
                                <select name="gambar_{{ $i }}_id" class="form-control" required>
                                    @foreach($galeri as $g)
                                        <option value="{{ $g->id }}"
                                            {{ $g->id == $karya->{'gambar_'.$i.'_id'} ? 'selected' : '' }}>
                                            {{ $g->judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach

                    {{-- Cover --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Pilih Cover Utama</label>
                            <select name="cover" class="form-control" required>
                                @foreach(['gambar_1','gambar_2','gambar_3'] as $cover)
                                    <option value="{{ $cover }}"
                                        {{ $karya->cover == $cover ? 'selected' : '' }}>
                                        {{ ucfirst(str_replace('_',' ', $cover)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ $karya->deskripsi }}</textarea>
                        </div>
                    </div>

                    {{-- Konten --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Konten</label>
                            <textarea id="konten" name="konten" class="form-control" rows="5">{{ $karya->konten }}</textarea>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('admin.karya.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>Kembali
                    </a>

                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save mr-1"></i>Update Karya
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection