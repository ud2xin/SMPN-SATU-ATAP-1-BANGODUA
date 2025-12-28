@extends('layouts.app')

@section('content')
    <!-- Styles langsung di dalam content -->
    <style>
        /* Animasi Keyframes */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes zoomOut {
            from {
                opacity: 1;
                transform: scale(1);
            }
            to {
                opacity: 0;
                transform: scale(0.8);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        @keyframes pingSlow {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Animation Classes */
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out;
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .animate-fadeInDown {
            animation: fadeInDown 0.8s ease-out;
        }

        .animate-slideDown {
            animation: slideDown 0.6s ease-out;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.6s ease-out;
        }

        .animate-slideInUp {
            animation: slideInUp 0.4s ease-out;
            animation-fill-mode: both;
        }

        .animate-zoomIn {
            animation: zoomIn 0.5s ease-out;
        }

        .animate-bounceIn {
            animation: bounceIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .animate-bounce-slow {
            animation: bounce 2s infinite;
        }

        .animate-bounce-subtle {
            animation: bounce 2s infinite;
        }

        .animate-wiggle {
            animation: wiggle 2s ease-in-out infinite;
        }

        .animate-pulse-subtle {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .animate-pulse-slow {
            animation: pingSlow 3s ease-in-out infinite;
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }

        .animate-gradient-slow {
            background-size: 200% 200%;
            animation: gradient 6s ease infinite;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Scroll Animation - Hidden by default */
        .scroll-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .scroll-animate.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Shimmer Effect */
        .shimmer-effect {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 2s infinite;
            pointer-events: none;
        }

        /* Gallery Item Hover Effects */
        .gallery-item {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(8, 35, 156, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.5s;
            pointer-events: none;
            z-index: 1;
        }

        .gallery-item:hover::before {
            opacity: 1;
        }

        /* Enhanced Card Hover Transitions */
        .gallery-item:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(8, 35, 156, 0.35);
        }

        .gallery-item .image-hover {
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
        }

        .gallery-item:hover .image-hover {
            transform: scale(1.15) rotate(2deg);
        }

        /* Modal Animation */
        .modal-overlay {
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            animation: zoomIn 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        /* Custom Scrollbar */
        .scrollbar-thin::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #5189c8, #08239c);
            border-radius: 10px;
            transition: background 0.3s;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #08239c, #5189c8);
        }

        /* Filter Tab Hover Effects */
        .filter-tab {
            position: relative;
            overflow: hidden;
        }

        .filter-tab::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .filter-tab:hover::before {
            width: 300px;
            height: 300px;
        }

        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .gallery-item {
                animation-delay: 0s !important;
            }
        }

        /* Loading State untuk Images */
        img[loading="lazy"] {
            transition: opacity 0.5s;
        }

        img[loading="lazy"].loaded {
            opacity: 1;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>

    <div class="margin-gw py-12 bg-gradient-to-br from-blue-50 via-sky-50 to-cyan-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">

            <!-- Header Section dengan Animasi -->
            <div class="text-center mb-12 animate-fadeInDown">
                <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20
                    bg-gradient-to-br from-[#08239c] to-[#5189c8] rounded-2xl mb-4 shadow-lg
                    animate-bounce-slow hover:shadow-2xl transition-shadow duration-300">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white animate-pulse-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-transparent bg-clip-text
                    bg-gradient-to-r from-[#08239c] via-[#3a5fb0] to-[#5189c8] mb-3 animate-gradient px-4">
                    Galeri Sekolah
                </h1>
                <p class="text-gray-600 text-base sm:text-lg lg:text-xl max-w-2xl mx-auto px-4">
                    Dokumentasi kegiatan dan momen berharga di sekolah kami
                </p>
                <div class="mt-6 h-1 w-16 sm:w-24 bg-gradient-to-r from-[#08239c] to-[#5189c8] mx-auto rounded-full
                    animate-pulse-slow"></div>
            </div>

            <!-- Filter Tabs dengan Animasi -->
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-8 sm:mb-10 animate-slideDown">
                <a href="{{ route('galeri.index') }}"
                    class="filter-tab group px-4 sm:px-8 py-2 sm:py-3 rounded-xl text-sm sm:text-base font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:rotate-1
                    {{ !$kategori ? 'bg-gradient-to-r from-[#08239c] to-[#5189c8] text-white shadow-blue-300 animate-gradient-slow' : 'bg-white text-gray-700 hover:shadow-xl' }}">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1 sm:mr-2 transition-transform group-hover:rotate-12" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Semua Galeri
                    </span>
                </a>

                <a href="{{ route('galeri.index', ['kategori' => 'galeri']) }}"
                    class="filter-tab group px-4 sm:px-8 py-2 sm:py-3 rounded-xl text-sm sm:text-base font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:rotate-1
                    {{ $kategori == 'galeri' ? 'bg-gradient-to-r from-[#08239c] to-[#5189c8] text-white shadow-blue-300 animate-gradient-slow' : 'bg-white text-gray-700 hover:shadow-xl' }}">
                    <span class="flex items-center">
                        <span class="animate-bounce-subtle mr-1">🏫</span> Galeri Sekolah
                    </span>
                </a>

                <a href="{{ route('galeri.index', ['kategori' => 'kegiatan']) }}"
                    class="filter-tab group px-4 sm:px-8 py-2 sm:py-3 rounded-xl text-sm sm:text-base font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:rotate-1
                    {{ $kategori == 'kegiatan' ? 'bg-gradient-to-r from-[#08239c] to-[#5189c8] text-white shadow-blue-300 animate-gradient-slow' : 'bg-white text-gray-700 hover:shadow-xl' }}">
                    <span class="flex items-center">
                        <span class="animate-bounce-subtle mr-1">📅</span> Kegiatan
                    </span>
                </a>
            </div>

            <!-- Gallery Grid dengan Scroll Animation -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">

                @forelse ($galeri as $index => $item)
                    <div class="gallery-item scroll-animate group relative bg-white rounded-2xl shadow-lg overflow-hidden"
                         style="transition-delay: {{ ($index % 8) * 0.1 }}s">

                        <!-- Image Container -->
                        <div class="relative h-48 sm:h-64 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul }}"
                                class="image-hover w-full h-full object-cover"
                                loading="lazy"
                            >

                            <!-- Animated Shimmer Effect -->
                            <div class="absolute inset-0 shimmer-effect opacity-0 group-hover:opacity-100"></div>

                            <!-- Category Badge dengan Animasi -->
                            <div class="absolute top-2 sm:top-3 left-2 sm:left-3 z-10 animate-slideInLeft">
                                @if($item->kategori == 'kegiatan')
                                    <span class="inline-flex items-center px-2 sm:px-3 py-1 sm:py-1.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-bold rounded-full shadow-lg animate-pulse-subtle">
                                        <svg class="w-3 h-3 mr-1 animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        KEGIATAN
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 sm:px-3 py-1 sm:py-1.5 bg-gradient-to-r from-[#08239c] to-[#5189c8] text-white text-xs font-bold rounded-full shadow-lg animate-pulse-subtle">
                                        <svg class="w-3 h-3 mr-1 animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                        </svg>
                                        GALERI
                                    </span>
                                @endif
                            </div>

                            <!-- Overlay on Hover dengan Slide Up Animation -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                    <div class="flex items-center text-xs sm:text-sm mb-2 font-medium animate-slideInUp">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                    </div>
                                    <button
                                        onclick="openModal('modal-{{ $item->id }}')"
                                        class="w-full mt-2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg text-sm font-semibold transition-all duration-300 flex items-center justify-center hover:scale-105 animate-slideInUp"
                                        style="animation-delay: 0.1s">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                        </svg>
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>

                            <!-- Zoom Icon dengan Rotation Animation -->
                            <button
                                onclick="openModal('modal-{{ $item->id }}')"
                                class="absolute top-2 sm:top-3 right-2 sm:right-3 bg-white/95 backdrop-blur-sm p-2 sm:p-2.5 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-white hover:scale-110 hover:rotate-90 shadow-xl z-10 animate-bounceIn">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#08239c]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Content dengan Hover Effects -->
                        <div class="p-4 sm:p-5 bg-white">
                            <h4 class="font-bold text-base sm:text-lg text-gray-900 mb-2 line-clamp-2 group-hover:text-[#08239c] transition-colors duration-300">
                                {{ $item->judul }}
                            </h4>
                            <p class="text-xs sm:text-sm text-gray-600 line-clamp-2 leading-relaxed transition-all duration-300 group-hover:text-gray-900">
                                {{ $item->deskripsi ?: 'Dokumentasi kegiatan sekolah' }}
                            </p>
                        </div>

                        <!-- Bottom Border Accent dengan Wave Animation -->
                        <div class="h-1.5 bg-gradient-to-r from-[#08239c] via-[#3a5fb0] to-[#5189c8] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    </div>

                    <!-- Modal untuk Image Preview - UKURAN DIPERKECIL -->
                    <div id="modal-{{ $item->id }}" class="modal-overlay hidden fixed inset-0 bg-black/95 z-50 flex items-center justify-center p-4 mt-10" onclick="closeModal('modal-{{ $item->id }}')">
                        <div class="relative w-full max-w-4xl mx-auto modal-content mt-5" onclick="event.stopPropagation()">

                            <!-- Close Button -->
                            <button
                                onclick="closeModal('modal-{{ $item->id }}')"
                                class="absolute -top-10 sm:-top-12 right-0 text-white hover:text-red-400 transition-all duration-300 group z-50 animate-fadeIn">
                                <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-md rounded-full px-3 sm:px-4 py-2 hover:bg-white/20 transition-all duration-300 hover:scale-110">
                                    <span class="text-xs sm:text-sm font-medium hidden sm:inline">Tutup</span>
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </button>

                            <!-- Modal Content Container -->
                            <div class="bg-white rounded-xl sm:rounded-2xl overflow-hidden shadow-2xl max-h-[85vh] overflow-y-auto scrollbar-thin">

                                <!-- Header Info Bar -->
                                <div class="bg-gradient-to-r from-[#08239c] to-[#5189c8] px-4 sm:px-5 py-2.5 sm:py-3 animate-gradient-slow">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 animate-fadeInDown">
                                        <div>
                                            @if($item->kategori == 'kegiatan')
                                                <span class="inline-flex items-center px-2.5 sm:px-3 py-1 sm:py-1.5 bg-white/20 backdrop-blur-sm text-white text-xs sm:text-sm font-bold rounded-full animate-pulse-subtle">
                                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-1.5 animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                    </svg>
                                                    KEGIATAN
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 sm:px-3 py-1 sm:py-1.5 bg-white/20 backdrop-blur-sm text-white text-xs sm:text-sm font-bold rounded-full animate-pulse-subtle">
                                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-1.5 animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                                    </svg>
                                                    GALERI
                                                </span>
                                            @endif
                                        </div>
                                        <div class="flex items-center text-white text-xs sm:text-sm">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1 sm:mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-semibold">{{ $item->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Section - UKURAN LEBIH KECIL -->
                                <div class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 flex items-center justify-center min-h-[35vh] sm:min-h-[40vh] p-3 sm:p-5">
                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        class="max-w-full max-h-[35vh] sm:max-h-[40vh] w-auto h-auto object-contain rounded-lg shadow-2xl animate-zoomIn"
                                    >
                                </div>

                                <!-- Caption Section - PADDING DIKURANGI -->
                                <div class="p-3 sm:p-5 space-y-3">
                                    <!-- Title -->
                                    <div class="border-l-4 border-[#08239c] pl-3 animate-slideInLeft">
                                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-1.5">
                                            {{ $item->judul }}
                                        </h3>
                                        <div class="flex items-center space-x-2 sm:space-x-3 text-xs text-gray-500">
                                            <span class="flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="hidden sm:inline">SMPN SATU ATAP 1 BANGODUA</span>
                                                <span class="sm:hidden">SMPN 1 Bangodua</span>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    @if($item->deskripsi)
                                        <div class="bg-gray-50 rounded-lg p-3 sm:p-4 border border-gray-200 animate-fadeInUp hover:shadow-md transition-shadow duration-300">
                                            <div class="flex items-start">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#08239c] mr-2 flex-shrink-0 mt-0.5 animate-bounce-subtle" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                                <div class="flex-1">
                                                    <h4 class="font-semibold text-gray-900 mb-1.5 text-sm">Deskripsi:</h4>
                                                    <p class="text-gray-700 leading-relaxed text-sm">{{ $item->deskripsi }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg p-3 sm:p-4 border-2 border-dashed border-blue-200 animate-fadeInUp">
                                            <p class="text-gray-600 text-center italic text-sm">
                                                <span class="animate-bounce-subtle inline-block">📸</span> Dokumentasi kegiatan SMPN SATU ATAP 1 BANGODUA
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Footer -->
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-0 pt-3 border-t border-gray-200 animate-fadeInUp">
                                        <button
                                            onclick="closeModal('modal-{{ $item->id }}')"
                                            class="w-full sm:w-auto px-4 sm:px-5 py-2 bg-gradient-to-r from-[#08239c] to-[#5189c8] text-white rounded-lg text-sm font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105 hover:-translate-y-0.5">
                                            Tutup Preview
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                @empty
                    <!-- Empty State dengan Animation -->
                    <div class="col-span-full flex flex-col items-center justify-center py-16 sm:py-20 animate-fadeInUp">
                        <div class="bg-gray-100 rounded-full p-6 sm:p-8 mb-4 sm:mb-6 animate-float">
                            <svg class="w-16 h-16 sm:w-24 sm:h-24 text-gray-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-500 mb-2 animate-fadeIn">Belum Ada Foto</h3>
                        <p class="text-sm sm:text-base text-gray-400 text-center max-w-md px-4 animate-fadeIn" style="animation-delay: 0.2s">
                            Galeri untuk kategori ini masih kosong.<br>Silakan kembali lagi nanti untuk melihat update terbaru.
                        </p>
                    </div>
                @endforelse

            </div>

            {{-- CUSTOM PAGINATION - Same as Berita --}}
            @if($galeri->hasPages())
            <div class="pagination-container">
                {{-- Tombol Previous --}}
                @if($galeri->onFirstPage())
                    <button class="pagination-btn" id="prevBtn" disabled>← Sebelumnya</button>
                @else
                    <a href="{{ $galeri->previousPageUrl() }}" class="pagination-btn" id="prevBtn">← Sebelumnya</a>
                @endif

                {{-- Container untuk nomor halaman yang akan di-generate --}}
                <div id="pageNumbers"></div>

                {{-- Tombol Next --}}
                @if($galeri->hasMorePages())
                    <a href="{{ $galeri->nextPageUrl() }}" class="pagination-btn" id="nextBtn">Selanjutnya →</a>
                @else
                    <button class="pagination-btn" id="nextBtn" disabled>Selanjutnya →</button>
                @endif
            </div>
            @endif

        </div>
    </div>

    {{-- Pass data ke JavaScript --}}
    <script>
        window.paginationData = {
            currentPage: {{ $galeri->currentPage() }},
            lastPage: {{ $galeri->lastPage() }},
            baseUrl: "{{ $galeri->url(1) }}".replace(/page=\d+/, 'page='),
            kategori: "{{ $kategori ?? 'semua' }}"
        };
    </script>

    {{-- Include file pagination.js --}}
    <script src="{{ asset('js/pagination.js') }}"></script>

    <!-- JavaScript langsung di dalam content -->
    <script>
        // Scroll Animation Observer
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe semua gallery items
            const galleryItems = document.querySelectorAll('.scroll-animate');
            galleryItems.forEach(item => observer.observe(item));

            // Lazy loading images
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');

            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.addEventListener('load', () => {
                                img.classList.add('loaded');
                            });
                            observer.unobserve(img);
                        }
                    });
                });

                lazyImages.forEach(img => imageObserver.observe(img));
            } else {
                lazyImages.forEach(img => {
                    img.classList.add('loaded');
                });
            }

            // Add ripple effect on click untuk filter tabs
            const filterTabs = document.querySelectorAll('.filter-tab');
            filterTabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple-effect');

                    this.appendChild(ripple);

                    setTimeout(() => ripple.remove(), 600);
                });
            });
        });

        // Modal Functions
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            setTimeout(() => {
                modal.querySelector('.modal-content').style.animation = 'zoomIn 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
            }, 10);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            const modalContent = modal.querySelector('.modal-content');

            modalContent.style.animation = 'zoomOut 0.3s ease-out';

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        // Close modal dengan ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modals = document.querySelectorAll('[id^="modal-"]');
                modals.forEach(modal => {
                    if (!modal.classList.contains('hidden')) {
                        const modalId = modal.getAttribute('id');
                        closeModal(modalId);
                    }
                });
            }
        });
    </script>
@endsection