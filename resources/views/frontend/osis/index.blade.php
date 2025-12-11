@extends('layouts.app')

@section('content')
    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero Header dengan Animasi -->
            <div class="text-center mb-12 animate-fadeInDown">
                <div class="inline-block mb-4 animate-bounce-slow">
                    <span class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold
                        shadow-md hover:shadow-lg transition-shadow duration-300">
                        Organisasi Siswa
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-transparent bg-clip-text
                    bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 mb-4 animate-gradient">
                    Struktur OSIS
                </h1>
                <p class="text-gray-600 text-base sm:text-lg lg:text-xl max-w-2xl mx-auto px-4">
                    SMPN SATU ATAP 1 BANGODUA
                </p>
                <div class="mt-6 h-1 w-16 sm:w-24 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full
                    animate-pulse-slow"></div>
            </div>

            <!-- OSIS Structure by Urut -->
            @php
                // Group by urut
                $groupedOsis = $osis->groupBy('urut')->sortKeys();
            @endphp

            @foreach($groupedOsis as $urut => $members)
                <div class="mb-16 animate-fadeInUp" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                    <!-- Level Indicator -->
                    <div class="flex items-center justify-center mb-8">
                        <div class="flex-grow h-px bg-gradient-to-r from-transparent via-indigo-300 to-transparent
                            animate-expandWidth"></div>
                        <div class="px-4 sm:px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full
                            shadow-lg mx-2 sm:mx-4 transform hover:scale-110 transition-transform duration-300">
                            <span class="text-white font-semibold text-sm sm:text-base">
                                {{ $members->first()->jabatan }}
                            </span>
                        </div>
                        <div class="flex-grow h-px bg-gradient-to-r from-transparent via-indigo-300 to-transparent
                            animate-expandWidth"></div>
                    </div>

                    <!-- Members Grid - Dinamis berdasarkan jumlah -->
                    <div class="grid
                        @if($members->count() == 1)
                            grid-cols-1 max-w-md mx-auto
                        @elseif($members->count() == 2)
                            grid-cols-1 sm:grid-cols-2 max-w-3xl mx-auto
                        @elseif($members->count() == 3)
                            grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 max-w-5xl mx-auto
                        @else
                            grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4
                        @endif
                        gap-4 sm:gap-6 lg:gap-8">

                        @foreach($members as $member)
                            <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden
                                transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3
                                animate-scaleIn cursor-pointer"
                                style="animation-delay: {{ $loop->index * 0.1 }}s;">
                                <!-- Image Container -->
                                <div class="relative h-64 sm:h-72 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                                    @if($member->foto)
                                        <img
                                            src="{{ asset('storage/' . $member->foto) }}"
                                            alt="{{ $member->nama }}"
                                            class="w-full h-full object-cover transition-transform duration-700
                                            group-hover:scale-110 group-hover:rotate-2"
                                            loading="lazy"
                                        >
                                    @else
                                        <div class="w-full h-full flex items-center justify-center
                                            bg-gradient-to-br from-indigo-100 to-purple-100
                                            group-hover:from-indigo-200 group-hover:to-purple-200 transition-colors">
                                            <svg class="w-20 h-20 sm:w-24 md:w-32 text-indigo-300 animate-float"
                                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Overlay Gradient -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent
                                        opacity-0 group-hover:opacity-100 transition-all duration-500">
                                        <div class="absolute bottom-0 left-0 right-0 p-4">
                                            <div class="text-center text-white transform translate-y-4
                                                group-hover:translate-y-0 transition-all duration-500 animate-slideInUp">
                                                <div class="flex items-center justify-center space-x-1 mb-2">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="text-sm font-medium">{{ $members->first()->jabatan }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Badge Icon -->
                                    <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm rounded-full p-2
                                        transform scale-0 group-hover:scale-100 transition-transform duration-300
                                        shadow-lg">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-4 sm:p-6 bg-white text-center">
                                    <h3 class="font-bold text-lg sm:text-xl text-gray-900 mb-3 line-clamp-2
                                        group-hover:text-indigo-600 transition-colors duration-300">
                                        {{ $member->nama }}
                                    </h3>

                                    @if($member->jabatan)
                                        <div class="inline-flex items-center px-3 sm:px-4 py-2 bg-gradient-to-r
                                            from-indigo-100 to-purple-100 text-indigo-700 rounded-full text-xs sm:text-sm
                                            font-semibold group-hover:from-indigo-200 group-hover:to-purple-200
                                            transition-all duration-300 shadow-sm group-hover:shadow-md">
                                            <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-2 animate-pulse-slow" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                            </svg>
                                            <span class="truncate">{{ $member->jabatan }}</span>
                                        </div>
                                    @else
                                        <div class="inline-flex items-center px-3 sm:px-4 py-2 bg-gray-100 text-gray-500
                                            rounded-full text-xs sm:text-sm font-medium group-hover:bg-gray-200
                                            transition-all duration-300 shadow-sm">
                                            <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="truncate">{{ $member->jabatan }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Bottom Border Accent -->
                                <div class="h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
                                    transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500
                                    origin-left"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            @if($osis->isEmpty())
                <!-- Empty State dengan Animasi -->
                <div class="flex flex-col items-center justify-center py-12 sm:py-20 animate-fadeIn">
                    <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full p-6 sm:p-8 mb-6
                        animate-bounce-slow">
                        <svg class="w-16 h-16 sm:w-24 sm:h-24 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-500 mb-2 px-4">Belum Ada Data OSIS</h3>
                    <p class="text-gray-400 text-center max-w-md text-sm sm:text-base px-4">
                        Struktur organisasi OSIS belum tersedia.<br>Silakan cek kembali nanti.
                    </p>
                </div>
            @endif
        </div>
    </div>

    <style>
        /* Animasi Keyframes */
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

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes expandWidth {
            from {
                transform: scaleX(0);
            }
            to {
                transform: scaleX(1);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
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

        /* Animasi Classes */
        .animate-fadeInDown {
            animation: fadeInDown 0.8s ease-out;
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
            animation-fill-mode: both;
        }

        .animate-scaleIn {
            animation: scaleIn 0.6s ease-out;
            animation-fill-mode: both;
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-out;
        }

        .animate-expandWidth {
            animation: expandWidth 1s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-slideInUp {
            animation: slideInUp 0.5s ease-out;
        }

        .animate-bounce-slow {
            animation: bounce 2s infinite;
        }

        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Responsif Image Loading */
        img {
            image-rendering: -webkit-optimize-contrast;
        }
    </style>
@endsection
