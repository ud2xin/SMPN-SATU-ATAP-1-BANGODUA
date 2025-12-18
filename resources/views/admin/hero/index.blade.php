@extends('layouts.sbadmin')

@section('content')
<div class="container-fluid">

    <h4 class="fw-semibold mb-4">Hero Section</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- JUDUL --}}
            <h6 class="fw-semibold mb-3 text-muted">
                Gambar Kecil (portrait agar maksimal)
            </h6>

            {{-- GAMBAR KECIL --}}
            <div class="row g-4 mb-4">

                @for($i = 1; $i <= 10; $i++)
                    @php $rel = 'gambarKecil'.$i; @endphp

                    <div class="col-6 col-md-2 mb-4">
                        @if($hero->$rel)
                            <img src="{{ asset('storage/'.$hero->$rel->gambar) }}"
                                 class="w-100 rounded shadow-sm"
                                 style="height:120px; object-fit:cover;">
                        @else
                            <div class="bg-light border text-muted text-center rounded d-flex align-items-center justify-content-center"
                                 style="height:120px; font-size:12px;">
                                Kosong
                            </div>
                        @endif
                    </div>

                    {{-- PAKSA 5 ATAS 5 BAWAH --}}
                    @if($i == 5)
                        <div class="w-100"></div>
                    @endif
                @endfor

            </div>

            {{-- TOMBOL --}}
            <div class="d-flex justify-content-start">
                <a href="{{ route('admin.hero.edit', $hero->id) }}"
                   class="btn btn-warning px-4">
                    Edit Hero
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
