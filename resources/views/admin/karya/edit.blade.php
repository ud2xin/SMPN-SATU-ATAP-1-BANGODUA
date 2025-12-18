@extends('layouts.sbadmin')

@section('content')
<div class="container mt-4">

    <h3>Edit Karya</h3>
    <hr>

    <form action="{{ route('admin.karya.update', $karya->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>User</label>
                <select name="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" 
                            {{ $user->id == $karya->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nama --}}
            <div class="col-md-6 mb-3">
                <label>Nama Pemilik</label>
                <input type="text" name="nama" class="form-control" value="{{ $karya->nama }}" required>
            </div>

            {{-- Foto Pemilik --}}
            <div class="col-md-6 mb-3">
                <label>Foto Pemilik</label>
                <input type="file" name="foto_pemilik" class="form-control">

                @if ($karya->foto_pemilik)
                    <img src="{{ asset('storage/' . $karya->foto_pemilik) }}"
                         width="80" class="mt-2 rounded">
                @endif
            </div>

            {{-- Info --}}
            <div class="col-md-6 mb-3">
                <label>Info Pemilik</label>
                <input type="text" name="info_pemilik" 
                       class="form-control" 
                       value="{{ $karya->info_pemilik }}">
            </div>

            {{-- Judul --}}
            <div class="col-md-12 mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $karya->judul }}" required>
            </div>

            {{-- Kategori --}}
            <div class="col-md-6 mb-3">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="Karya_siswa" {{ $karya->kategori == 'Karya_siswa' ? 'selected' : '' }}>Karya Siswa</option>
                    <option value="karya_guru" {{ $karya->kategori == 'karya_guru' ? 'selected' : '' }}>Karya Guru</option>
                </select>
            </div>

            {{-- Tanggal --}}
            <div class="col-md-6 mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $karya->tanggal }}" required>
            </div>

            {{-- Gambar --}}
            @foreach([1,2,3] as $i)
                <div class="col-md-6 mb-3">
                    <label>Gambar {{ $i }}</label>
                    <select name="gambar_{{ $i }}_id" class="form-control" required>
                        @foreach($galeri as $g)
                            <option value="{{ $g->id }}"
                                {{ $g->id == $karya->{'gambar_'.$i.'_id'} ? 'selected' : '' }}>
                                {{ $g->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endforeach

            {{-- Cover --}}
            <div class="col-md-12 mb-3">
                <label>Cover</label>
                <select name="cover" class="form-control" required>
                    @foreach(['gambar_1','gambar_2','gambar_3'] as $cover)
                        <option value="{{ $cover }}"
                            {{ $karya->cover == $cover ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_',' ', $cover)) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Deskripsi --}}
            <div class="col-md-12 mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $karya->deskripsi }}</textarea>
            </div>

            {{-- Konten --}}
            <div class="col-md-12 mb-3">
                <label>Konten</label>
                <textarea name="konten" class="form-control" rows="4">{{ $karya->konten }}</textarea>
            </div>

        </div>

        <button class="btn btn-primary mt-2">Perbarui</button>
    </form>

</div>
@endsection
