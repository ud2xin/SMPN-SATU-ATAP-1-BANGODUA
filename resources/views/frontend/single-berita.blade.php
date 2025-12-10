@extends('layouts.app')

@section('content')

<div class="single-berita-container">

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="single-berita-main-content">

        {{-- HEADER ARTIKEL --}}
        <div class="single-berita-article-header">
            <span class="single-berita-category">
                {{ ucfirst($berita->kategori) }}
            </span>

            <h1 class="single-berita-title">
                {{ $berita->judul }}
            </h1>

            <div class="single-berita-meta">
                <span class="single-berita-author">
                    Oleh: {{ $berita->penulis ?? 'Admin' }}
                </span> | 
                <span class="single-berita-date">
                    {{ $berita->created_at->translatedFormat('d F Y') }}
                </span>
            </div>
        </div>

        {{-- FEATURED IMAGE --}}
        <img 
            src="{{ asset('storage/' . ($berita->galeri->gambar ?? 'default.jpg')) }}"
            alt="{{ $berita->judul }}"
            class="single-berita-featured-image"
        >

        {{-- ISI ARTIKEL --}}
        <div class="single-berita-article-content">
            {!! $berita->konten !!}
        </div>

        {{-- SHARE --}}
        <div class="single-berita-share-section">
            <div class="single-berita-share-title">Bagikan Artikel:</div>
            <div class="single-berita-share-buttons">
                <button class="single-berita-share-btn single-berita-btn-facebook" onclick="shareArticle('facebook')">Facebook</button>
                <button class="single-berita-share-btn single-berita-btn-twitter" onclick="shareArticle('twitter')">Twitter</button>
                <button class="single-berita-share-btn single-berita-btn-whatsapp" onclick="shareArticle('whatsapp')">WhatsApp</button>
            </div>
        </div>

    </div>


    {{-- SIDEBAR --}}
    <aside class="single-berita-sidebar">

        {{-- Sidebar – Berita Terbaru --}}
        <div class="single-berita-sidebar-section">
            <h2 class="single-berita-sidebar-title">🔥 Berita Terbaru</h2>

            @foreach($beritaTerbaru as $bt)
                <a href="{{ route('frontend.single-berita', $bt->slug) }}" style="text-decoration: none; color: inherit;">
                    <div class="single-berita-sidebar-item">
                        <img src="{{ asset('storage/' . ($bt->galeri->gambar ?? 'default.jpg')) }}" class="single-berita-sidebar-image" alt="{{ $bt->judul }}">

                        <div class="single-berita-sidebar-content">
                            <div class="single-berita-sidebar-item-title">{{ $bt->judul }}</div>
                            <div class="single-berita-sidebar-date">{{ $bt->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>


        {{-- Sidebar – Prestasi --}}
        <div class="single-berita-sidebar-section">
            <h2 class="single-berita-sidebar-title">🏆 Prestasi Terbaru</h2>

            @foreach($prestasiTerbaru as $p)
                <a href="{{ route('frontend.single-berita', $p->slug) }}" style="text-decoration: none; color: inherit;">
                    <div class="single-berita-sidebar-item">
                        <img src="{{ asset('storage/' . ($p->galeri->gambar ?? 'default.jpg')) }}" class="single-berita-sidebar-image" alt="{{ $p->judul }}">

                        <div class="single-berita-sidebar-content">
                            <div class="single-berita-sidebar-item-title">{{ $p->judul }}</div>
                            <div class="single-berita-sidebar-date">{{ $p->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>

    </aside>


</div>

@endsection