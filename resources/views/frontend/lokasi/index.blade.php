@extends('layouts.app')

@section('content')
    <div class="py-12 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl mb-4 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-3">
                    Lokasi Sekolah
                </h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Temukan lokasi kami dan kunjungi sekolah untuk informasi lebih lanjut
                </p>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden hover:shadow-3xl transition-all duration-300">

                <!-- School Info Section -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-8 md:p-10 text-white relative overflow-hidden">
                    <!-- Decorative Elements -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24"></div>

                    <div class="relative z-10">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4 backdrop-blur-sm">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h2 class="text-2xl md:text-3xl font-bold mb-3">{{ $nama_sekolah }}</h2>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-indigo-200 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <p class="text-lg leading-relaxed text-indigo-50">{{ $alamat }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="rounded-2xl overflow-hidden shadow-lg border-4 border-gray-100 hover:border-indigo-200 transition-colors duration-300 flex justify-center pt-6">
                    <div class="relative w-full max-w-3xl" style="padding-bottom: 56.25%; height: 0;">
                        <div class="absolute inset-0 w-full h-full">
                            {!! $maps_embed !!}
                        </div>
                    </div>
                </div>

                <!-- Action Section -->
                <div class="bg-gradient-to-r from-gray-50 to-indigo-50 p-6 md:p-8 border-t border-gray-100">
                    <div class="grid md:grid-cols-2 gap-4">
                        <a href="https://maps.google.com/?q={{ urlencode($alamat) }}" target="_blank" class="group flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-4 px-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                            <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Buka di Google Maps
                        </a>
                        <a href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($alamat) }}" target="_blank" class="group flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-4 px-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                            <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Dapatkan Petunjuk Arah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
