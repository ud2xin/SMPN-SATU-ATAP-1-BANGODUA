@extends('layouts.app')

@section('content')
    <div class="margin-gw py-12 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section dengan Animasi -->
            <div class="text-center mb-12 animate-fadeInDown">
                <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20
                    bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl mb-4 shadow-lg
                    animate-bounce-slow hover:shadow-2xl transition-shadow duration-300">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white animate-pulse-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-transparent bg-clip-text
                    bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 mb-3 animate-gradient px-4">
                    Lokasi Sekolah
                </h1>
                <p class="text-gray-600 text-base sm:text-lg lg:text-xl max-w-2xl mx-auto px-4">
                    Temukan lokasi kami dan kunjungi sekolah untuk informasi lebih lanjut
                </p>
                <div class="mt-6 h-1 w-16 sm:w-24 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full
                    animate-pulse-slow"></div>
            </div>

            <!-- Main Content Card dengan Animasi -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden hover:shadow-3xl
                transition-all duration-500 animate-scaleIn transform hover:scale-[1.02]">

                <!-- School Info Section -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6 sm:p-8 md:p-10
                    text-white relative overflow-hidden animate-gradient-slow">
                    <!-- Decorative Elements dengan Animasi -->
                    <div class="absolute top-0 right-0 w-48 sm:w-64 h-48 sm:h-64 bg-white opacity-5
                        rounded-full -mr-24 sm:-mr-32 -mt-24 sm:-mt-32 animate-float"></div>
                    <div class="absolute bottom-0 left-0 w-36 sm:w-48 h-36 sm:h-48 bg-white opacity-5
                        rounded-full -ml-18 sm:-ml-24 -mb-18 sm:-mb-24 animate-float-reverse"></div>

                    <div class="relative z-10">
                        <div class="flex flex-col sm:flex-row items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-white bg-opacity-20 rounded-xl
                                flex items-center justify-center mb-4 sm:mr-4 sm:mb-0 backdrop-blur-sm
                                transform hover:scale-110 hover:rotate-12 transition-all duration-300
                                animate-slideInLeft">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div class="flex-1 animate-slideInRight">
                                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3">{{ $nama_sekolah }}</h2>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-indigo-200 mr-2 mt-1 flex-shrink-0 animate-ping-slow"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <p class="text-base sm:text-lg leading-relaxed text-indigo-50">Jl. Guntur No 6, Blok Sukaasih, Desa Mulyasari, Kecamatan Bangodua, Kabupaten Indramayu, Provinsi Jawa Barat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Section dengan Animasi -->
                <div class="p-4 sm:p-6 animate-fadeInUp">
                    <div class="rounded-2xl overflow-hidden shadow-lg border-4 border-gray-100
                        hover:border-indigo-200 transition-all duration-500
                        transform hover:shadow-2xl">
                        <div class="relative w-full" style="padding-bottom: 56.25%; height: 0;">
                            <div class="absolute inset-0 w-full h-full">
                                {!! $maps_embed !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Section dengan Animasi -->
                <div class="bg-gradient-to-r from-gray-50 to-indigo-50 p-4 sm:p-6 md:p-8 border-t border-gray-100
                    animate-fadeInUp" style="animation-delay: 0.2s;">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <a href="https://maps.google.com/?q={{ urlencode($alamat) }}"
                           target="_blank"
                           class="group flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-600
                           hover:from-indigo-700 hover:to-purple-700 text-white font-semibold
                           py-3 sm:py-4 px-4 sm:px-6 rounded-xl shadow-md hover:shadow-xl
                           transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2 group-hover:scale-110 group-hover:rotate-12 transition-transform"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            <span class="text-sm sm:text-base">Buka di Google Maps</span>
                        </a>
                        <a href="https://maps.google.com/?q={{ urlencode($alamat) }}"
                           target="_blank"
                           class="group flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-600
                           hover:from-indigo-700 hover:to-purple-700 text-white font-semibold
                           py-3 sm:py-4 px-4 sm:px-6 rounded-xl shadow-md hover:shadow-xl
                           transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2 group-hover:scale-110 group-hover:rotate-12 transition-transform"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm sm:text-base">Dapatkan Petunjuk Arah</span>
                        </a>
                    </div>
                </div>
            </div>
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
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) translateX(0px);
            }
            50% {
                transform: translateY(-20px) translateX(10px);
            }
        }

        @keyframes floatReverse {
            0%, 100% {
                transform: translateY(0px) translateX(0px);
            }
            50% {
                transform: translateY(20px) translateX(-10px);
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

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
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
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-reverse {
            animation: floatReverse 6s ease-in-out infinite;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.6s ease-out;
        }

        .animate-slideInRight {
            animation: slideInRight 0.6s ease-out;
        }

        .animate-bounce-slow {
            animation: bounce 2s infinite;
        }

        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .animate-ping-slow {
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

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Responsive iframe */
        iframe {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
