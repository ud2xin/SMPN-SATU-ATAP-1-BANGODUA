@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit SPMB</h4>

    <form action="{{ route('admin.spmb.update', $spmb->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- GAMBAR --}}
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control">

            @if($spmb->gambar)
                <img src="{{ asset('storage/'.$spmb->gambar) }}"
                     class="img-fluid rounded mt-2"
                     style="max-width:200px">
            @endif
        </div>

        {{-- KONTEN --}}
        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea id="konten" name="konten"
                      rows="5"
                      class="form-control">{{ old('konten', $spmb->konten) }}</textarea>
        </div>

        {{-- LINK --}}
        <div class="mb-3">
            <label class="form-label">Link Daftar Online</label>
            <input type="url"
                   name="link"
                   class="form-control"
                   value="{{ old('link', $spmb->link) }}">
        </div>

        <button class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('admin.spmb.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
