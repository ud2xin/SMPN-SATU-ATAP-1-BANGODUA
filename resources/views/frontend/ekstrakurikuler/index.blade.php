<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero Header -->
            <div class="text-center mb-12">
                <div class="inline-block mb-4">
                    <span class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold">Pengembangan Bakat & Minat</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-4">
                    Ekstrakurikuler
                </h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Temukan dan kembangkan bakat serta minatmu melalui berbagai kegiatan ekstrakurikuler
                </p>
                <div class="mt-6 h-1 w-24 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <!-- Ekstrakurikuler Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($ekstrakurikuler as $item)
                    <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                        <!-- Image Container -->
                        <div class="relative h-56 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            @if($item->gambar)
                                <img
                                    src="{{ asset('storage/'.$item->gambar) }}"
                                    alt="{{ $item->nama }}"
                                    class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-100 to-purple-100">
                                    <svg class="w-24 h-24 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                            @endif

                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                    <a href="{{ route('frontend.ekstrakurikuler.show', $item->id) }}"
                                       class="w-full block text-center bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-4 py-2 rounded-lg font-semibold transition">
                                        <span class="flex items-center justify-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Lihat Detail
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <!-- Icon Badge -->
                            <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm p-2.5 rounded-full shadow-xl">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 bg-white">
                            <h3 class="font-bold text-xl text-gray-900 mb-3 line-clamp-1 group-hover:text-indigo-600 transition">
                                {{ $item->nama }}
                            </h3>

                            <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed mb-4">
                                {{ $item->deskripsi ?: 'Kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa' }}
                            </p>

                            <!-- Info Footer -->
                            <div class="space-y-2 pt-4 border-t border-gray-100">
                                @if($item->pembina)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">{{ $item->pembina }}</span>
                                    </div>
                                @endif

                                @if($item->jadwal)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $item->jadwal }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Button -->
                            <a href="{{ route('frontend.ekstrakurikuler.show', $item->id) }}"
                               class="mt-4 w-full block text-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-4 py-2.5 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                Selengkapnya
                                <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>

                        <!-- Bottom Border Accent -->
                        <div class="h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transform scale-x-0 group-hover:scale-x-100 transition duration-500"></div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full flex flex-col items-center justify-center py-20">
                        <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full p-8 mb-6">
                            <svg class="w-24 h-24 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-500 mb-2">Belum Ada Ekstrakurikuler</h3>
                        <p class="text-gray-400 text-center max-w-md">
                            Saat ini belum ada kegiatan ekstrakurikuler yang tersedia.<br>Silakan cek kembali nanti.
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($ekstrakurikuler->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="bg-white rounded-xl shadow-lg p-2">
                        {{ $ekstrakurikuler->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
