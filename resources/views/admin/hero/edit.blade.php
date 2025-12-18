@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">
    <h4 class="fw-semibold mb-4">Edit Hero</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    @for($i = 1; $i <= 10; $i++)
                        @php
                            $rel = 'gambarKecil'.$i;
                            $field = 'gambar_kecil_'.$i.'_id';
                        @endphp

                        <div class="col-6 col-md-2">

                            <label class="form-label small fw-semibold">
                                Gambar {{ $i }}
                            </label>

                            {{-- PREVIEW --}}
                            @if($hero->$rel)
                                <img src="{{ asset('storage/'.$hero->$rel->gambar) }}"
                                     class="w-100 rounded mb-2 shadow-sm"
                                     style="height:140px; object-fit:cover;">
                            @else
                                <div class="bg-light border text-muted text-center rounded mb-2"
                                     style="height:140px; line-height:140px; font-size:12px;">
                                    Kosong
                                </div>
                            @endif

                            {{-- SELECT --}}
                            <select name="{{ $field }}" class="form-control form-control-sm">
                                <option value="">-- pilih --</option>
                                @foreach($galeris as $g)
                                    <option value="{{ $g->id }}"
                                        {{ $hero->$field == $g->id ? 'selected' : '' }}>
                                        {{ $g->judul ?? 'Gambar #'.$g->id }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        {{-- PAKSA BARIS BARU SETELAH 5 --}}
                        @if($i == 5)
                            <div class="w-100"></div>
                        @endif
                    @endfor
                </div>

                {{-- TOMBOL --}}
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary me-2">
                        Batal
                    </a>
                    <button class="btn btn-primary px-4">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
