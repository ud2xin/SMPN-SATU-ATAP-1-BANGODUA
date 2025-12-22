@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Karya
        </h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Karya</h6>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.karya.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    {{-- User --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">User (Pemilik akun)</label>
                            <select name="user_id" class="form-control" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Nama Pemilik --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Pemilik</label>
                            <input type="text" name="nama" class="form-control" 
                                   placeholder="Nama pemilik karya..." required>
                        </div>
                    </div>

                    {{-- Foto Pemilik --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Foto Pemilik</label>
                            <input type="file" name="foto_pemilik" class="form-control">
                            <small class="form-text text-muted">Format: JPG, PNG, JPEG. Max: 2MB</small>
                        </div>
                    </div>

                    {{-- Info Pemilik --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Info Pemilik</label>
                            <input type="text" name="info_pemilik" class="form-control"
                                   placeholder="Informasi tambahan pemilik...">
                        </div>
                    </div>

                    {{-- Judul --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Judul Karya</label>
                            <input type="text" name="judul" class="form-control" 
                                   placeholder="Judul karya..." required>
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Kategori</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Karya_siswa">Karya Siswa</option>
                                <option value="karya_guru">Karya Guru</option>
                            </select>
                        </div>
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                    </div>

                    {{-- Gambar 1, 2, 3 --}}
                    @foreach([1,2,3] as $i)
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Gambar {{ $i }} (dari Galeri)</label>
                                <select name="gambar_{{ $i }}_id" class="form-control" required>
                                    <option value="">-- Pilih Gambar --</option>
                                    @foreach($galeri as $g)
                                        <option value="{{ $g->id }}">{{ $g->judul }}</option>
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
                                <option value="">-- Pilih Cover --</option>
                                <option value="gambar_1">Gambar 1</option>
                                <option value="gambar_2">Gambar 2</option>
                                <option value="gambar_3">Gambar 3</option>
                            </select>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3"
                                      placeholder="Deskripsi singkat karya..."></textarea>
                        </div>
                    </div>

                    {{-- Konten --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Konten</label>
                            <textarea name="konten" class="form-control" rows="5"
                                      placeholder="Detail konten karya..."></textarea>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('admin.karya.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>Simpan Karya
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection