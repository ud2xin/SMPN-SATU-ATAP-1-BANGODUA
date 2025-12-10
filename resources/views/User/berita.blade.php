@extends('layouts-public.all')

@section('title', 'Berita Terkini')

@section('content')

<div class="container">
    <div class="main-content">
        <div class="header">
            <h1>📰 Berita Terkini</h1>
            <p>Informasi terbaru dan terpercaya untuk Anda</p>
        </div>

        <div class="news-grid">

            @forelse ($beritas as $item)
                <div class="news-item active">
                    <div class="news-image">
                        @if($item->galeri && $item->galeri->file)
                            <img src="{{ asset('storage/' . $item->galeri->file) }}" 
                                 alt="{{ $item->judul }}" 
                                 style="width:100%;height:100%;object-fit:cover;border-radius:8px;">
                        @else
                            📄
                        @endif
                    </div>

                    <div class="news-content">
                        <div>
                            <h3 class="news-title">{{ $item->judul }}</h3>

                            <div class="news-meta">
                                <span>📅 {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</span>
                                <span>📂 {{ $item->kategori ?? 'Berita' }}</span>
                            </div>

                            <p class="news-excerpt">
                                {{ Str::limit(strip_tags($item->konten), 150) }}
                            </p>
                        </div>

                        <a href="{{ route('berita.show', $item->slug) }}" class="read-more">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @empty
                <p>Tidak ada berita tersedia.</p>
            @endforelse

        </div>

        {{-- PAGINATION CUSTOM (DARI TEMANMU) --}}
        @if ($beritas->hasPages())
        <div class="pagination">

            {{-- Sebelumnya --}}
            @if ($beritas->onFirstPage())
                <span class="pagination-text disabled">Sebelumnya</span>
            @else
                <a href="{{ $beritas->previousPageUrl() }}" class="pagination-text">Sebelumnya</a>
            @endif

            {{-- Nomor --}}
            @for ($i = 1; $i <= $beritas->lastPage(); $i++)
                @if($i == $beritas->currentPage())
                    <button class="pagination-btn active">{{ $i }}</button>
                @else
                    <a href="{{ $beritas->url($i) }}">
                        <button class="pagination-btn">{{ $i }}</button>
                    </a>
                @endif
            @endfor

            {{-- Selanjutnya --}}
            @if ($beritas->hasMorePages())
                <a href="{{ $beritas->nextPageUrl() }}" class="pagination-more">Selanjutnya</a>
            @else
                <span class="pagination-more disabled">Selanjutnya</span>
            @endif

        </div>
        @endif

    </div>

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        {{-- Berita Terbaru --}}
        <div class="sidebar-section">
            <h2 class="sidebar-title">🔥 Berita Terbaru</h2>

            @foreach ($beritaTerbaru as $bt)
                <a href="{{ route('berita.show', $bt->slug) }}" class="sidebar-item">
                    <div class="sidebar-image">
                        @if($bt->galeri && $bt->galeri->file)
                            <img src="{{ asset('storage/' . $bt->galeri->file) }}" 
                                 style="width:100%;height:100%;object-fit:cover;border-radius:6px;">
                        @else
                            📰
                        @endif
                    </div>

                    <div class="sidebar-content">
                        <div class="sidebar-item-title">{{ $bt->judul }}</div>
                        <div class="sidebar-date">
                            {{ \Carbon\Carbon::parse($bt->tanggal)->translatedFormat('d M Y') }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Prestasi Terbaru --}}
        <div class="sidebar-section">
            <h2 class="sidebar-title">🏆 Prestasi Terbaru</h2>

            @foreach ($prestasiTerbaru as $pt)
                <a href="{{ route('prestasi.show', $pt->slug) }}" class="sidebar-item">

                    <div class="sidebar-image">
                        @if($pt->galeri && $pt->galeri->file)
                            <img src="{{ asset('storage/' . $pt->galeri->file) }}"
                                 style="width:100%;height:100%;object-fit:cover;border-radius:6px;">
                        @else
                            🏅
                        @endif
                    </div>

                    <div class="sidebar-content">
                        <div class="sidebar-item-title">{{ $pt->judul }}</div>
                        <div class="sidebar-date">
                            {{ \Carbon\Carbon::parse($pt->tanggal)->translatedFormat('d M Y') }}
                        </div>
                    </div>

                </a>
            @endforeach

        </div>

    </aside>

</div>

@endsection
