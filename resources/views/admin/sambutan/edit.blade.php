@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <h4 class="fw-semibold mb-3">Edit Sambutan</h4>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.sambutan.update') }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Kepala Sekolah --}}
                <div class="mb-3">
                    <label class="form-label">Kepala Sekolah</label>
                    <select name="kepala_guru_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        @foreach($gurus as $guru)
                            <option value="{{ $guru->id }}"
                                {{ $sambutan->kepala_guru_id == $guru->id ? 'selected' : '' }}>
                                {{ $guru->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Foto Kepala --}}
                <div class="mb-3">
                    <label class="form-label">Foto Kepala Sekolah</label>
                    <select name="foto_kepala_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        @foreach($gurus as $guru)
                            <option value="{{ $guru->id }}"
                                {{ $sambutan->foto_kepala_id == $guru->id ? 'selected' : '' }}>
                                {{ $guru->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Sambutan --}}
                <div class="mb-3">
                    <label class="form-label">Isi Sambutan</label>
                    <textarea id="konten" name="sambutan_kepala" rows="6" class="form-control"
                        placeholder="Silakan isi sambutan kepala sekolah...">
{{ old('sambutan_kepala', $sambutan->sambutan_kepala) }}
</textarea>
                </div>

                <button class="btn btn-success">💾 Simpan</button>
                <a href="{{ route('admin.sambutan.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
