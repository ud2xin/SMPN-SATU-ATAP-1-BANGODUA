<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('frontend.ekstrakurikuler.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-white text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

                <!-- Hero Image -->
                <div class="relative h-96 overflow-hidden bg-gradient-to-br from-indigo-500 to-purple-600">
                    @if($ekskul->gambar)
                        <img
                            src="{{ asset('storage/'.$ekskul->gambar) }}"
                            alt="{{ $ekskul->nama }}"
                            class="w-full h-full object-cover"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-40 h-40 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                    @endif

                    <!-- Title Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                        <div class="flex items-center mb-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h1 class="text-4xl md:text-5xl font-extrabold">
                                {{ $ekskul->nama }}
                            </h1>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-8 md:p-12">

                    <!-- Info Cards Grid -->
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <!-- Pembina Card -->
                        @if($ekskul->pembina)
                        <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl p-6 border-2 border-indigo-200">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-indigo-500 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm text-indigo-600 font-semibold uppercase tracking-wide">Pembina</h3>
                                    <p class="text-xl font-bold text-gray-900">{{ $ekskul->pembina }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Jadwal Card -->
                        @if($ekskul->jadwal)
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border-2 border-purple-200">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm text-purple-600 font-semibold uppercase tracking-wide">Jadwal Kegiatan</h3>
                                    <p class="text-xl font-bold text-gray-900">{{ $ekskul->jadwal }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Description Section -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-8 border-2 border-gray-100 shadow-sm">
                        <div class="flex items-start mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">Tentang Ekstrakurikuler Ini</h2>
                                @if($ekskul->deskripsi)
                                    <div class="prose prose-lg max-w-none">
                                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $ekskul->deskripsi }}</p>
                                    </div>
                                @else
                                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6 border-2 border-dashed border-indigo-200">
                                        <p class="text-gray-600 text-center italic">
                                            Kegiatan ekstrakurikuler {{ $ekskul->nama }} untuk mengembangkan bakat dan minat siswa di SMPN SATU ATAP 1 BANGODUA
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- <!-- Call to Action -->
                    <div class="mt-8 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 text-center text-white">
                        <h3 class="text-2xl font-bold mb-3">Tertarik Bergabung?</h3>
                        <p class="mb-6 text-indigo-100">
                            Hubungi guru pembina atau bagian kesiswaan untuk informasi lebih lanjut tentang pendaftaran
                        </p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="{{ route('frontend.ekstrakurikuler.index') }}"
                               class="inline-flex items-center px-8 py-3 bg-white text-indigo-600 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Lihat Ekskul Lainnya
                            </a>
                            <a href="{{ route('kontak') }}"
                               class="inline-flex items-center px-8 py-3 bg-indigo-800 hover:bg-indigo-900 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Hubungi Kami
                            </a>
                        </div>
                    </div>

                </div>
            </div> --}}

            <!-- Additional Info -->
            <div class="mt-8 text-center text-gray-500 text-sm">
                <p class="flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    Informasi dapat berubah sewaktu-waktu
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
