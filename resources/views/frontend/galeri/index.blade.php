@extends('layouts.app')

@section('content')
    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">

            <!-- Filter Tabs with Animation -->
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-8 sm:mb-10 animate-slideDown">
                <a href="{{ route('galeri.index') }}"
                    class="filter-tab px-4 sm:px-8 py-2 sm:py-3 rounded-xl text-sm sm:text-base font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:rotate-1
                    {{ !$kategori ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-indigo-300 animate-gradient' : 'bg-white text-gray-700 hover:shadow-xl' }}">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1 sm:mr-2 transition-transform group-hover:rotate-12" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Semua Galeri
                    </span>
                </a>

                <a href="{{ route('galeri.index', ['kategori' => 'galeri']) }}"
                    class="filter-tab px-4 sm:px-8 py-2 sm:py-3 rounded-xl text-sm sm:text-base font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:rotate-1
                    {{ $kategori == 'galeri' ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-indigo-300 animate-gradient' : 'bg-white text-gray-700 hover:shadow-xl' }}">
                    <span class="flex items-center">
                        <span class="animate-bounce-subtle mr-1">🏫</span> Galeri Sekolah
                    </span>
                </a>

                <a href="{{ route('galeri.index', ['kategori' => 'kegiatan']) }}"
                    class="filter-tab px-4 sm:px-8 py-2 sm:py-3 rounded-xl text-sm sm:text-base font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:rotate-1
                    {{ $kategori == 'kegiatan' ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-indigo-300 animate-gradient' : 'bg-white text-gray-700 hover:shadow-xl' }}">
                    <span class="flex items-center">
                        <span class="animate-bounce-subtle mr-1">📅</span> Kegiatan
                    </span>
                </a>
            </div>

            <!-- Gallery Grid with Stagger Animation -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">

                @forelse ($galeri as $index => $item)
                    <div class="gallery-item group relative bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 animate-fadeInUp"
                         style="animation-delay: {{ ($index % 8) * 0.1 }}s">

                        <!-- Image Container -->
                        <div class="relative h-48 sm:h-64 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul }}"
                                class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-2"
                                loading="lazy"
                            >

                            <!-- Animated Shimmer Effect -->
                            <div class="absolute inset-0 shimmer-effect opacity-0 group-hover:opacity-100"></div>

                            <!-- Category Badge with Animation -->
                            <div class="absolute top-2 sm:top-3 left-2 sm:left-3 z-10 animate-slideInLeft">
                                @if($item->kategori == 'kegiatan')
                                    <span class="inline-flex items-center px-2 sm:px-3 py-1 sm:py-1.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-bold rounded-full shadow-lg animate-pulse-subtle">
                                        <svg class="w-3 h-3 mr-1 animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        KEGIATAN
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 sm:px-3 py-1 sm:py-1.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-xs font-bold rounded-full shadow-lg animate-pulse-subtle">
                                        <svg class="w-3 h-3 mr-1 animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                        </svg>
                                        GALERI
                                    </span>
                                @endif
                            </div>

                            <!-- Overlay on Hover with Slide Up Animation -->
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

                            <!-- Zoom Icon with Rotation Animation -->
                            <button
                                onclick="openModal('modal-{{ $item->id }}')"
                                class="absolute top-2 sm:top-3 right-2 sm:right-3 bg-white/95 backdrop-blur-sm p-2 sm:p-2.5 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-white hover:scale-110 hover:rotate-90 shadow-xl z-10 animate-bounceIn">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Content with Hover Effects -->
                        <div class="p-4 sm:p-5 bg-white">
                            <h4 class="font-bold text-base sm:text-lg text-gray-900 mb-2 line-clamp-2 group-hover:text-indigo-600 transition-colors duration-300">
                                {{ $item->judul }}
                            </h4>
                            <p class="text-xs sm:text-sm text-gray-600 line-clamp-2 leading-relaxed transition-all duration-300 group-hover:text-gray-900">
                                {{ $item->deskripsi ?: 'Dokumentasi kegiatan sekolah' }}
                            </p>
                        </div>

                        <!-- Bottom Border Accent with Wave Animation -->
                        <div class="h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    </div>

                    <!-- Modal for Image Preview - Enhanced with Animations -->
                    <div id="modal-{{ $item->id }}" class="modal-overlay hidden fixed inset-0 bg-black/95 z-50 flex items-center justify-center p-4" onclick="closeModal('modal-{{ $item->id }}')">
                        <div class="relative w-full max-w-6xl mx-auto modal-content" onclick="event.stopPropagation()">

                            <!-- Close Button with Animation -->
                            <button
                                onclick="closeModal('modal-{{ $item->id }}')"
                                class="absolute -top-10 sm:-top-14 right-0 text-white hover:text-red-400 transition-all duration-300 group z-50 animate-fadeIn">
                                <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-md rounded-full px-3 sm:px-4 py-2 hover:bg-white/20 transition-all duration-300 hover:scale-110">
                                    <span class="text-xs sm:text-sm font-medium hidden sm:inline">Tutup</span>
                                    <svg class="w-6 h-6 sm:w-7 sm:h-7 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </button>

                            <!-- Modal Content Container -->
                            <div class="bg-white rounded-2xl sm:rounded-3xl overflow-hidden shadow-2xl max-h-[90vh] overflow-y-auto scrollbar-thin">

                                <!-- Header Info Bar with Gradient Animation -->
                                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-4 sm:px-6 py-3 sm:py-4 animate-gradient">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 animate-fadeInDown">
                                        <div>
                                            @if($item->kategori == 'kegiatan')
                                                <span class="inline-flex items-center px-3 sm:px-4 py-1.5 sm:py-2 bg-white/20 backdrop-blur-sm text-white text-xs sm:text-sm font-bold rounded-full animate-pulse-subtle">
                                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1.5 sm:mr-2 animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                    </svg>
                                                    KEGIATAN SEKOLAH
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 sm:px-4 py-1.5 sm:py-2 bg-white/20 backdrop-blur-sm text-white text-xs sm:text-sm font-bold rounded-full animate-pulse-subtle">
                                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1.5 sm:mr-2 animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                                    </svg>
                                                    GALERI SEKOLAH
                                                </span>
                                            @endif
                                        </div>
                                        <div class="flex items-center text-white text-xs sm:text-sm">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-semibold">{{ $item->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Section with Zoom Animation -->
                                <div class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 flex items-center justify-center min-h-[40vh] sm:min-h-[50vh] lg:min-h-[60vh] p-4 sm:p-6 lg:p-8">
                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        class="max-w-full max-h-[40vh] sm:max-h-[50vh] lg:max-h-[60vh] w-auto h-auto object-contain rounded-lg shadow-2xl animate-zoomIn"
                                    >
                                </div>

                                <!-- Caption Section with Slide Up Animation -->
                                <div class="p-4 sm:p-6 lg:p-8 space-y-4">
                                    <!-- Title -->
                                    <div class="border-l-4 border-indigo-600 pl-3 sm:pl-4 animate-slideInLeft">
                                        <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2">
                                            {{ $item->judul }}
                                        </h3>
                                        <div class="flex items-center space-x-2 sm:space-x-4 text-xs sm:text-sm text-gray-500">
                                            <span class="flex items-center">
                                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="hidden sm:inline">SMPN SATU ATAP 1 BANGODUA</span>
                                                <span class="sm:hidden">SMPN 1 Bangodua</span>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    @if($item->deskripsi)
                                        <div class="bg-gray-50 rounded-xl p-4 sm:p-6 border border-gray-200 animate-fadeInUp hover:shadow-md transition-shadow duration-300">
                                            <div class="flex items-start">
                                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-600 mr-2 sm:mr-3 flex-shrink-0 mt-0.5 sm:mt-1 animate-bounce-subtle" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                                <div class="flex-1">
                                                    <h4 class="font-semibold text-gray-900 mb-2 text-sm sm:text-base">Deskripsi:</h4>
                                                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">{{ $item->deskripsi }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-4 sm:p-6 border-2 border-dashed border-indigo-200 animate-fadeInUp">
                                            <p class="text-gray-600 text-center italic text-sm sm:text-base">
                                                <span class="animate-bounce-subtle inline-block">📸</span> Dokumentasi kegiatan SMPN SATU ATAP 1 BANGODUA
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Footer -->
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-0 pt-4 border-t border-gray-200 animate-fadeInUp">
                                        <button
                                            onclick="closeModal('modal-{{ $item->id }}')"
                                            class="w-full sm:w-auto px-4 sm:px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm sm:text-base font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                                            Tutup Preview
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                @empty
                    <!-- Empty State with Animation -->
                    <div class="col-span-full flex flex-col items-center justify-center py-16 sm:py-20 animate-fadeInUp">
                        <div class="bg-gray-100 rounded-full p-6 sm:p-8 mb-4 sm:mb-6 animate-bounce-subtle">
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

            <!-- Pagination with Animation -->
            @if($galeri->hasPages())
                <div class="mt-8 sm:mt-12 flex justify-center animate-fadeInUp">
                    <div class="bg-white rounded-xl shadow-lg p-2 hover:shadow-xl transition-shadow duration-300">
                        {{ $galeri->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>

    @push('styles')
    <style>
        /* Keyframe Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
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

        @keyframes wiggle {
            0%, 100% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(-5deg);
            }
            75% {
                transform: rotate(5deg);
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%) rotate(45deg);
            }
            100% {
                transform: translateX(100%) rotate(45deg);
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
            animation: fadeInDown 0.5s ease-out;
        }

        .animate-slideDown {
            animation: slideDown 0.6s ease-out;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.5s ease-out;
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

        .animate-bounce-subtle {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        .animate-wiggle {
            animation: wiggle 2s ease-in-out infinite;
        }

        .animate-pulse-subtle {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }

        /* Shimmer Effect */
        .shimmer-effect {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            animation: shimmer 2s infinite;
            pointer-events: none;
        }

        /* Gallery Item Hover Effects */
        .gallery-item:hover {
            animation: none;
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(79, 70, 229, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.5s;
            pointer-events: none;
            z-index: 1;
        }

        .gallery-item:hover::before {
            opacity: 1;
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
            background: linear-gradient(180deg, #818cf8, #6366f1);
            border-radius: 10px;
            transition: background 0.3s;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #6366f1, #4f46e5);
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

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .gallery-item {
                animation-delay: 0s !important;
            }
        }

        /* Loading State for Images */
        img[loading="lazy"] {
            opacity: 0;
            transition: opacity 0.5s;
        }

        img[loading="lazy"].loaded {
            opacity: 1;
        }

        /* Floating Animation for Empty State */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        // Modal Functions
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Add animation class
            setTimeout(() => {
                modal.querySelector('.modal-content').style.animation = 'zoomIn 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
            }, 10);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            const modalContent = modal.querySelector('.modal-content');

            // Add close animation
            modalContent.style.animation = 'zoomOut 0.3s ease-out';

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        // Close modal with ESC key
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

        // Lazy loading images
        document.addEventListener('DOMContentLoaded', function() {
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
                // Fallback for browsers that don't support IntersectionObserver
                lazyImages.forEach(img => {
                    img.classList.add('loaded');
                });
            }
        });

        // Add parallax effect on scroll
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.gallery-item');

            parallaxElements.forEach((el, index) => {
                if (window.innerWidth > 768) { // Only on desktop
                    const speed = 0.05;
                    const offset = scrolled * speed * (index % 2 === 0 ? 1 : -1);
                    el.style.transform = `translateY(${offset}px)`;
                }
            });
        });

        // Add ripple effect on click
        document.querySelectorAll('.filter-tab').forEach(tab => {
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
    </script>

    <style>
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

        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
    @endpush
@endsection
