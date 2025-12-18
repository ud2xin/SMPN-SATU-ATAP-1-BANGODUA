@extends('layouts.sbadmin')

@section('content')
<div class="container mt-4">

    <h3>Tambah Karya</h3>
    <hr>

    <form action="{{ route('admin.karya.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- User --}}
            <div class="col-md-6 mb-3">
                <label>User (Pemilik akun)</label>
                <select name="user_id" class="form-control" required>
                    <option value="">-- pilih user --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Nama Pemilik --}}
            <div class="col-md-6 mb-3">
                <label>Nama Pemilik</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            {{-- Foto Pemilik --}}
            <div class="col-md-6 mb-3">
                <label>Foto Pemilik</label>
                <input type="file" name="foto_pemilik" class="form-control">
            </div>

            {{-- Info Pemilik --}}
            <div class="col-md-6 mb-3">
                <label>Info Pemilik</label>
                <input type="text" name="info_pemilik" class="form-control">
            </div>

            {{-- Judul --}}
            <div class="col-md-12 mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            {{-- Kategori --}}
            <div class="col-md-6 mb-3">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="Karya_siswa">Karya Siswa</option>
                    <option value="karya_guru">Karya Guru</option>
                </select>
            </div>

            {{-- Tanggal --}}
            <div class="col-md-6 mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            {{-- Gambar --}}
            @foreach([1,2,3] as $i)
                <div class="col-md-6 mb-3">
                    <label>Gambar {{ $i }}</label>
                    <select name="gambar_{{ $i }}_id" class="form-control" required>
                        <option value="">-- pilih gambar --</option>
                        @foreach($galeri as $g)
                            <option value="{{ $g->id }}">{{ $g->judul }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach

            {{-- Cover --}}
            <div class="col-md-12 mb-3">
                <label>Cover</label>
                <select name="cover" class="form-control" required>
                    <option value="gambar_1">Gambar 1</option>
                    <option value="gambar_2">Gambar 2</option>
                    <option value="gambar_3">Gambar 3</option>
                </select>
            </div>

            {{-- Deskripsi --}}
            <div class="col-md-12 mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            {{-- Konten --}}
            <div class="col-md-12 mb-3">
                <label>Konten</label>
                <textarea name="konten" class="form-control" rows="4"></textarea>
            </div>

        </div>

        <button class="btn btn-primary mt-2">Simpan</button>
    </form>

</div>
@endsection
