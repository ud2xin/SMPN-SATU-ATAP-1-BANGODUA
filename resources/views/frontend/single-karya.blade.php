@extends('layouts.app')

@section('content')

<div class="single-karya-container">

    <div class="single-karya-card">
        <div class="single-karya-content">

            {{-- ================= IMAGE SECTION ================= --}}
            <div class="single-karya-image-section">

                {{-- MAIN IMAGE --}}
                <div class="single-karya-main-image">
                    <img 
                        id="mainImage"
                        src="{{ asset('storage/' . ($karya->coverImage->gambar ?? 'default.jpg')) }}"
                        alt="{{ $karya->judul }}"
                    >
                </div>

                {{-- GALLERY --}}
                <div class="single-karya-image-gallery">

                    @foreach($galeri as $g)
                        @if($g)
                            <div 
                                class="single-karya-gallery-item"
                                onclick="changeImage('{{ asset('storage/' . $g->gambar) }}')"
                            >
                                <img 
                                    src="{{ asset('storage/' . $g->gambar) }}"
                                    alt="Gallery {{ $loop->iteration }}"
                                >
                            </div>
                        @endif
                    @endforeach

                </div>

            </div>

            {{-- ================= INFO SECTION ================= --}}
            <div class="single-karya-info-section">

                {{-- CATEGORY + TITLE --}}
                <div>
                    <span class="single-karya-category-badge">
                        {{ ucfirst($karya->kategori) }}
                    </span>

                    <h1 class="single-karya-title">
                        {{ $karya->judul }}
                    </h1>

                    {{-- Subtitle / Deskripsi singkat --}}
                    @if($karya->deskripsi)
                        <p class="single-karya-subtitle">
                            {{ $karya->deskripsi }}
                        </p>
                    @endif
                </div>

                {{-- OWNER CARD --}}
                <div class="single-karya-student-card">

                    <div class="single-karya-student-avatar">
                        <img 
                            src="{{ asset('storage/' . ($karya->foto_pemilik ?? 'default.jpg')) }}" 
                            alt="{{ $karya->nama }}"
                        >
                    </div>

                    <div class="single-karya-student-info">
                        <h3>{{ $karya->nama }}</h3>
                        <p class="single-karya-student-class">
                            {{ $karya->info_pemilik }}
                        </p>
                    </div>

                </div>

                {{-- DESCRIPTION --}}
                <div class="single-karya-description-section">
                    <h3>Deskripsi Karya</h3>

                    <div class="single-karya-description">
                        {!! filled($karya->konten) ? $karya->konten : $karya->deskripsi !!}
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- ================= RELATED WORKS ================= --}}
    <div class="single-karya-related-section">

        <div class="single-karya-related-header">
            <h2>📚 Karya Terkait Lainnya</h2>
            <p>Karya lainnya yang mungkin Anda sukai</p>
        </div>

        <div class="single-karya-related-grid">

            @forelse($related as $rel)
                <a 
                    href="{{ route('frontend.single-karya', $rel->id) }}"
                    style="text-decoration:none; color:inherit;"
                >
                    <div class="single-karya-related-card">

                        <div class="single-karya-related-image">
                            <img 
                                src="{{ asset('storage/' . ($rel->coverImage->gambar ?? 'default.jpg')) }}" 
                                alt="{{ $rel->judul }}"
                            >
                        </div>

                        <div class="single-karya-related-content">

                            {{-- Student Info --}}
                            <div class="single-karya-related-student-info">

                                <div class="single-karya-related-student-avatar">
                                    <img 
                                        src="{{ asset('storage/' . ($rel->foto_pemilik ?? 'default.jpg')) }}" 
                                        alt="{{ $rel->nama }}"
                                    >
                                </div>

                                <div class="single-karya-related-student-details">
                                    <h4>{{ $rel->nama }}</h4>
                                    <p class="single-karya-related-student-class">
                                        {{ $rel->info_pemilik }}
                                    </p>
                                </div>

                            </div>

                            {{-- Title & Desc --}}
                            <h3>{{ $rel->judul }}</h3>
                            <p>{{ Str::limit(strip_tags($rel->konten), 80) }}</p>

                            <div class="single-karya-related-meta">
                                <span class="single-karya-related-category">
                                    {{ $rel->kategori }}
                                </span>

                                <span class="single-karya-related-date">
                                    {{ \Carbon\Carbon::parse($rel->tanggal)->format('d M Y') }}
                                </span>
                            </div>

                        </div>

                    </div>
                </a>
            @empty
                <p style="padding:20px; color:#777;">Belum ada karya terkait.</p>
            @endforelse

        </div>

    </div>

</div>

{{-- JS ganti gambar --}}
<script>
function changeImage(src) {
    document.getElementById('mainImage').src = src;
}
</script>

@endsection
