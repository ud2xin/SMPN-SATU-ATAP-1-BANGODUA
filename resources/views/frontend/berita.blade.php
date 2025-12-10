@extends('layouts.app')

@section('content')

<div class="news-container">
    <div class="news-main-content">

        <div class="news-header">
            <h1>📰 Berita Terkini</h1>
            <p>Informasi terbaru dan terpercaya untuk Anda</p>
        </div>

        <div class="news-grid">

            {{-- LOOP BERITA --}}
            @foreach($beritas as $berita)
                <div class="news-item">

                    {{-- AMAN DARI NULL --}}
                    <img src="{{ asset('storage/' . ($berita->galeri->gambar ?? 'default.jpg')) }}" class="news-image" alt="{{ $berita->judul }}">
                    <div class="news-content">
                        <div>
                            <h3 class="news-title">{{ $berita->judul }}</h3>

                            <div class="news-meta">
                                <span>📅 {{ $berita->created_at->format('d F Y') }}</span>
                                <span>📂 {{ ucfirst($berita->kategori) }}</span>
                            </div>

                            <p class="news-excerpt">
                                {{ Str::limit(strip_tags($berita->konten), 150) }}
                            </p>
                        </div>

                        <a href="{{ route('frontend.single-berita', $berita->slug) }}" class="read-more">
                            Baca Selengkapnya →
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

        {{-- CUSTOM PAGINATION --}}
        @if($beritas->hasPages())
        <div class="pagination-container">
            {{-- Tombol Previous --}}
            @if($beritas->onFirstPage())
                <button class="pagination-btn" id="prevBtn" disabled>← Sebelumnya</button>
            @else
                <a href="{{ $beritas->previousPageUrl() }}" class="pagination-btn" id="prevBtn">← Sebelumnya</a>
            @endif

            {{-- Container untuk nomor halaman yang akan di-generate --}}
            <div id="pageNumbers"></div>

            {{-- Tombol Next --}}
            @if($beritas->hasMorePages())
                <a href="{{ $beritas->nextPageUrl() }}" class="pagination-btn" id="nextBtn">Selanjutnya →</a>
            @else
                <button class="pagination-btn" id="nextBtn" disabled>Selanjutnya →</button>
            @endif
        </div>
        @endif

    </div>

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        {{-- Sidebar – Berita Terbaru --}}
        <div class="sidebar-section">
            <h2 class="sidebar-title">🔥 Berita Terbaru</h2>

            @foreach($beritaTerbaru as $bt)
                <a href="{{ route('frontend.single-berita', $bt->slug) }}" class="sidebar-link">
                    <div class="sidebar-item">
                        <img src="{{ asset('storage/' . ($bt->galeri->gambar ?? 'default.jpg')) }}" class="sidebar-image" alt="{{ $bt->judul }}">

                        <div class="sidebar-content">
                            <div class="sidebar-item-title">{{ $bt->judul }}</div>
                            <div class="sidebar-date">{{ $bt->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>


        {{-- Sidebar – Prestasi --}}
        <div class="sidebar-section">
            <h2 class="sidebar-title">🏆 Prestasi Terbaru</h2>

            @foreach($prestasiTerbaru as $p)
                <a href="{{ route('frontend.single-berita', $p->slug) }}" class="sidebar-link">
                    <div class="sidebar-item">
                        <img src="{{ asset('storage/' . ($p->galeri->gambar ?? 'default.jpg')) }}" class="sidebar-image" alt="{{ $p->judul }}">

                        <div class="sidebar-content">
                            <div class="sidebar-item-title">{{ $p->judul }}</div>
                            <div class="sidebar-date">{{ $p->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>

    </aside>

</div>
{{-- Pass data ke JavaScript --}}
<script>
    window.paginationData = {
        currentPage: {{ $beritas->currentPage() }},
        lastPage: {{ $beritas->lastPage() }},
        baseUrl: "{{ $beritas->url(1) }}".replace(/page=\d+/, 'page=')
    };
</script>

{{-- Include file pagination.js --}}
<script src="{{ asset('js/berita.js') }}"></script>

@endsection