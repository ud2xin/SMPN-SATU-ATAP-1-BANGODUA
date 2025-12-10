<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $galeri->judul }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Gambar --}}
                <img
                    src="{{ asset('storage/galeri/' . $galeri->gambar) }}"
                    alt="{{ $galeri->judul }}"
                    class="w-full rounded-lg mb-4"
                    style="max-height: 500px; object-fit: contain;"
                >

                {{-- Deskripsi --}}
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ $galeri->deskripsi }}
                </p>

                {{-- Tombol kembali --}}
                <a href="{{ route('galeri.index') }}"
                    class="text-blue-600 hover:underline">
                    ← Kembali ke Galeri
                </a>

            </div>

        </div>
    </div>

</x-app-layout>
