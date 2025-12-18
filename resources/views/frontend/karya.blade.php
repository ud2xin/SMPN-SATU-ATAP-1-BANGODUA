@extends('layouts.app')

@section('content')

<div class="karya-container">

    <div class="karya-header">
        <h1>📚 Galeri Karya Siswa</h1>
        <p>Kumpulan hasil karya dan prestasi siswa-siswi terbaik</p>
    </div>

    {{-- FILTER --}}
    <div class="karya-filter-section">
        <a href="?kategori=semua" 
           class="karya-filter-btn {{ ($kategori=='semua' || !$kategori) ? 'karya-active':'' }}">
            Semua Karya
        </a>

        <a href="?kategori=guru" 
           class="karya-filter-btn {{ $kategori=='guru' ? 'karya-active':'' }}">
            Karya Guru
        </a>

        <a href="?kategori=siswa" 
           class="karya-filter-btn {{ $kategori=='siswa' ? 'karya-active':'' }}">
            Karya Siswa
        </a>
    </div>

    <div class="karya-grid">

        @foreach($karyas as $karya)
            <div class="karya-card" data-category="{{ $karya->kategori }}">

                {{-- gambar cover --}}
                <div class="karya-image">
                    <img src="{{ asset('storage/' . ($karya->cover_image->gambar ?? 'default.jpg')) }}" 
                         alt="{{ $karya->judul }}">
                </div>

                <div class="karya-content">

                    {{-- info pemilik --}}
                    <div class="karya-student-info">
                        <div class="karya-student-avatar">
                            <img src="{{ asset('storage/' . ($karya->foto_pemilik ?? 'default-avatar.jpg')) }}"
                                 alt="{{ $karya->nama }}">
                        </div>

                        <div class="karya-student-details">
                            <h4>{{ $karya->nama }}</h4>
                            <p class="karya-student-class">{{ $karya->info_pemilik }}</p>
                        </div>
                    </div>

                    <h3 class="karya-title">
                        <a href="{{ route('frontend.single-karya', $karya->id) }}">
                            {{ $karya->judul }}
                        </a>
                    </h3>


                    <p class="karya-description">
                        {{ Str::limit(strip_tags($karya->deskripsi), 160) }}
                    </p>

                    <div class="karya-meta">
                        <span class="karya-category">{{ ucfirst($karya->kategori) }}</span>
                        <span class="karya-date">
                            {{ \Carbon\Carbon::parse($karya->tanggal)->format('d M Y') }}
                        </span>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

    {{-- PAGINATION --}}
    <div class="mt-6">
        {{ $karyas->links() }}
    </div>

</div>

@endsection
