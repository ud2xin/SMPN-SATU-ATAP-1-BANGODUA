@extends('layouts.app')

@section('content')

<div class="spmb-section">
    <div class="spmb-container">

        {{-- IMAGE --}}
        <div class="spmb-image-section">
            @if($spmb && $spmb->gambar)
                <div class="spmb-image-wrapper" onclick="spmbOpenModal()">
                    <img src="{{ asset('storage/'.$spmb->gambar) }}" id="spmbMainImage" alt="SPMB">
                </div>
            @else
                <div class="spmb-placeholder"></div>
            @endif
        </div>

        {{-- CONTENT --}}
        <div class="spmb-content-section">
            <h1 class="spmb-title">
                {{ $spmb && $spmb->konten ? 'SPMB' : 'SPMB Belum Diisi' }}
            </h1>

            {{-- PERBAIKAN: Gunakan {!! !!} untuk render HTML --}}
            <div class="spmb-description-content">
                {!! $spmb->konten ?? '<p style="font-size:1.1em;line-height:1.8;color:#555;">Informasi SPMB belum tersedia. Silakan lengkapi melalui panel admin.</p>' !!}
            </div>

            @if($spmb && $spmb->link)
                <a href="{{ $spmb->link }}" target="_blank" class="spmb-tag">
                    Daftar Online
                </a>
            @else
                <span class="spmb-tag" style="opacity:.5">Daftar Online</span>
            @endif
        </div>

    </div>
</div>

{{-- MODAL --}}
<div class="spmb-modal" id="spmbImageModal" onclick="spmbCloseModal(event)">
    <button class="spmb-modal-close" onclick="spmbCloseModal(event)">&times;</button>
    <img src="" id="spmbModalImage" alt="SPMB Full">
</div>

@endsection