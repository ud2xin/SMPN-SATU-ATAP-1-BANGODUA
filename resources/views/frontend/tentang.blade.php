@extends('layouts.app')

@section('content')
    <div class="py-12 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Grid Layout untuk Visi & Misi -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">

                <!-- Visi -->
                <div class="group bg-white rounded-2xl shadow-xl p-8 md:p-10 hover:shadow-2xl transition-all duration-300 border-t-4 border-indigo-500 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-indigo-700">Visi</h2>
                    </div>
                    <div class="relative">
                        <div class="absolute -left-4 top-0 text-8xl text-indigo-100 font-serif">"</div>
                        <p class="text-gray-700 leading-relaxed text-lg relative z-10 pl-6">
                            Menjadi sekolah unggul yang menghasilkan generasi berkarakter, berprestasi, dan berwawasan luas.
                        </p>
                    </div>
                </div>

                <!-- Misi -->
                <div class="group bg-white rounded-2xl shadow-xl p-8 md:p-10 hover:shadow-2xl transition-all duration-300 border-t-4 border-purple-500 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-purple-700">Misi</h2>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start group/item">
                            <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-gray-700 text-lg">Menyelenggarakan pendidikan yang berkualitas dan berkarakter.</span>
                        </li>
                        <li class="flex items-start group/item">
                            <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-gray-700 text-lg">Mendorong prestasi akademik dan non-akademik siswa.</span>
                        </li>
                        <li class="flex items-start group/item">
                            <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-gray-700 text-lg">Membangun lingkungan belajar yang kreatif, inovatif, dan inklusif.</span>
                        </li>
                        <li class="flex items-start group/item">
                            <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-gray-700 text-lg">Membina kerjasama yang baik dengan orang tua dan masyarakat.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sejarah Section -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-3xl shadow-2xl p-8 md:p-12 text-white relative overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24"></div>

                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4 backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold">Sejarah Sekolah</h2>
                    </div>

                    <div class="bg-white bg-opacity-10 rounded-2xl p-8 backdrop-blur-sm border border-white border-opacity-20">
                        <p class="text-white text-lg leading-relaxed mb-6">
                            UPTD SMP Negeri Satu Atap 1 Bangodua didirikan berdasarkan SK Pendirian No. 425.11/Kep864_disdik/2007 pada tanggal 22 Agustus 2007, berada di bawah pembinaan Kementerian Pendidikan Dasar dan Menengah serta naungan Pemerintah Daerah Kabupaten Indramayu. Sekolah ini berlokasi di Jl. Guntur No 6, Blok Sukaasih, Desa Mulyasari, Kecamatan Bangodua, Kabupaten Indramayu, Provinsi Jawa Barat.<br>
                            <br>
                            Sebagai sekolah negeri yang menyelenggarakan pendidikan jenjang SMP (DIKDAS), SMPN Satu Atap 1 Bangodua memiliki luas lahan 10.000 m², dilengkapi dengan fasilitas listrik dari PLN dan akses internet melalui CNI (Wavelan).<br>
                            <br>
                            Sekolah ini memperoleh SK Operasional No. 1 Tahun 2018 pada tanggal 10 Januari 2018, dan sejak itu telah menjalankan kegiatan pendidikan secara resmi. Dengan akreditasi A, SMPN Satu Atap 1 Bangodua terus berkomitmen memberikan layanan pendidikan berkualitas bagi generasi muda di wilayah Bangodua dan sekitarnya.
                        </p>

                        <div class="grid md:grid-cols-3 gap-6 mt-8">
                            <div class="text-center">
                                <div class="text-4xl font-bold mb-2">143+</div>
                                <div class="text-indigo-100">Siswa Aktif</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold mb-2">11</div>
                                <div class="text-indigo-100">Tenaga Pendidik</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold mb-2">2007</div>
                                <div class="text-indigo-100">Tahun Berdiri</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
