@extends('layouts.app')

@section('content')
    <style>
        /* Initial state - hidden */
        .fade-in-down,
        .fade-in-up,
        .slide-in-left,
        .slide-in-right,
        .slide-in-up,
        .scale-in,
        .expand-width {
            opacity: 0;
        }

        .fade-in-down {
            transform: translateY(-30px);
        }

        .fade-in-up {
            transform: translateY(30px);
        }

        .slide-in-left {
            transform: translateX(-50px);
        }

        .slide-in-right {
            transform: translateX(50px);
        }

        .slide-in-up {
            transform: translateY(20px);
        }

        .scale-in {
            transform: scale(0.9);
        }

        /* Animated state */
        .fade-in-down.animated {
            animation: fadeInDown 0.8s ease-out forwards;
        }

        .fade-in-up.animated {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .slide-in-left.animated {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .slide-in-right.animated {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .slide-in-up.animated {
            animation: slideInUp 0.6s ease-out forwards;
        }

        .scale-in.animated {
            animation: scaleIn 0.6s ease-out forwards;
        }

        .expand-width.animated {
            animation: expandWidth 1.5s ease-out forwards;
        }

        /* Keyframe Animations */
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
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

        @keyframes expandWidth {
            from {
                opacity: 0;
                width: 0;
            }
            to {
                opacity: 1;
                width: 6rem;
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
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

        @keyframes pulse-slow {
            0%, 100% {
                opacity: 0.3;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(1.05);
            }
        }

        /* Animation Classes */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-wiggle {
            animation: wiggle 3s ease-in-out infinite;
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
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

        /* Hover Effects */
        .visi-card::after,
        .misi-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(79, 70, 229, 0.05), transparent);
            opacity: 0;
            transition: opacity 0.5s;
            pointer-events: none;
        }

        .visi-card:hover::after,
        .misi-card:hover::after {
            opacity: 1;
        }

        /* Ripple Effect */
        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
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

    <div class="margin-gw py-12 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Animated Page Title -->
            <div class="text-center mb-12 fade-in-down">
                <h1 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-4 animate-gradient">
                    Visi & Misi Sekolah
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full expand-width"></div>
            </div>

            <!-- Grid Layout untuk Visi & Misi -->
            <div class="grid md:grid-cols-2 gap-6 lg:gap-8 mb-12 lg:mb-16">

                <!-- Visi Card -->
                <div class="visi-card group bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 hover:shadow-2xl transition-all duration-500 border-t-4 border-indigo-500 hover:-translate-y-2 slide-in-left relative overflow-hidden">

                    <!-- Floating Background Shapes -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-100 rounded-full blur-3xl opacity-30 group-hover:scale-150 transition-transform duration-700"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-purple-100 rounded-full blur-2xl opacity-30 group-hover:scale-150 transition-transform duration-700"></div>

                    <div class="relative z-10">
                        <!-- Header -->
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3 sm:mr-4 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white animate-pulse-subtle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl sm:text-3xl font-bold text-indigo-700 group-hover:scale-105 transition-transform duration-300">Visi</h2>
                        </div>

                        <!-- Content -->
                        <div class="relative">
                            <div class="absolute -left-2 sm:-left-4 top-0 text-6xl sm:text-8xl text-indigo-100 font-serif animate-float">"</div>
                            <p class="text-gray-700 leading-relaxed text-base sm:text-lg lg:text-xl relative z-10 pl-4 sm:pl-6">
                                Menjadi sekolah unggul yang menghasilkan generasi berkarakter, berprestasi, dan berwawasan luas.
                            </p>
                            <div class="absolute -right-2 sm:-right-4 bottom-0 text-6xl sm:text-8xl text-indigo-100 font-serif rotate-180 animate-float" style="animation-delay: 0.5s">"</div>
                        </div>

                        <!-- Decorative Line -->
                        <div class="mt-6 h-1 w-0 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full group-hover:w-full transition-all duration-700"></div>
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="misi-card group bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 hover:shadow-2xl transition-all duration-500 border-t-4 border-purple-500 hover:-translate-y-2 slide-in-right relative overflow-hidden">

                    <!-- Floating Background Shapes -->
                    <div class="absolute top-0 left-0 w-32 h-32 bg-purple-100 rounded-full blur-3xl opacity-30 group-hover:scale-150 transition-transform duration-700"></div>
                    <div class="absolute bottom-0 right-0 w-24 h-24 bg-indigo-100 rounded-full blur-2xl opacity-30 group-hover:scale-150 transition-transform duration-700"></div>

                    <div class="relative z-10">
                        <!-- Header -->
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mr-3 sm:mr-4 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white animate-pulse-subtle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl sm:text-3xl font-bold text-purple-700 group-hover:scale-105 transition-transform duration-300">Misi</h2>
                        </div>

                        <!-- Mission List -->
                        <ul class="space-y-3 sm:space-y-4">
                            <li class="flex items-start group/item slide-in-up" data-delay="100">
                                <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center mr-3 mt-1 group-hover/item:scale-125 group-hover/item:rotate-12 transition-all duration-300 shadow-md">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base lg:text-lg leading-relaxed group-hover/item:text-purple-600 transition-colors duration-300">Menyelenggarakan pendidikan yang berkualitas dan berkarakter.</span>
                            </li>
                            <li class="flex items-start group/item slide-in-up" data-delay="200">
                                <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center mr-3 mt-1 group-hover/item:scale-125 group-hover/item:rotate-12 transition-all duration-300 shadow-md">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base lg:text-lg leading-relaxed group-hover/item:text-purple-600 transition-colors duration-300">Mendorong prestasi akademik dan non-akademik siswa.</span>
                            </li>
                            <li class="flex items-start group/item slide-in-up" data-delay="300">
                                <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center mr-3 mt-1 group-hover/item:scale-125 group-hover/item:rotate-12 transition-all duration-300 shadow-md">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base lg:text-lg leading-relaxed group-hover/item:text-purple-600 transition-colors duration-300">Membangun lingkungan belajar yang kreatif, inovatif, dan inklusif.</span>
                            </li>
                            <li class="flex items-start group/item slide-in-up" data-delay="400">
                                <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center mr-3 mt-1 group-hover/item:scale-125 group-hover/item:rotate-12 transition-all duration-300 shadow-md">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base lg:text-lg leading-relaxed group-hover/item:text-purple-600 transition-colors duration-300">Membina kerjasama yang baik dengan orang tua dan masyarakat.</span>
                            </li>
                        </ul>

                        <!-- Decorative Line -->
                        <div class="mt-6 h-1 w-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full group-hover:w-full transition-all duration-700"></div>
                    </div>
                </div>
            </div>

            <!-- Sejarah Section -->
            <div class="sejarah-section bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl lg:rounded-3xl shadow-2xl p-6 sm:p-8 md:p-10 lg:p-12 mb-12 lg:mb-16 text-white relative overflow-hidden fade-in-up">

                <!-- Animated Background Elements -->
                <div class="absolute top-0 right-0 w-48 sm:w-64 h-48 sm:h-64 bg-white opacity-5 rounded-full -mr-24 sm:-mr-32 -mt-24 sm:-mt-32 animate-float"></div>
                <div class="absolute bottom-0 left-0 w-32 sm:w-48 h-32 sm:h-48 bg-white opacity-5 rounded-full -ml-16 sm:-ml-24 -mb-16 sm:-mb-24 animate-float" style="animation-delay: 1s"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 sm:w-96 h-64 sm:h-96 bg-white opacity-3 rounded-full blur-3xl animate-pulse-slow"></div>

                <div class="relative z-10">
                    <!-- Header -->
                    <div class="flex items-center mb-6 lg:mb-8">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-3 sm:mr-4 backdrop-blur-sm hover:scale-110 hover:rotate-12 transition-all duration-300 shadow-lg">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white animate-wiggle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold">Sejarah Sekolah</h2>
                    </div>

                    <!-- Content Box -->
                    <div class="bg-white bg-opacity-95 rounded-xl lg:rounded-2xl p-6 sm:p-8 backdrop-blur-md border-2 border-indigo-200 hover:shadow-xl transition-all duration-300">
                        <p class="text-gray-800 text-sm sm:text-base lg:text-lg leading-relaxed mb-6 lg:mb-8">
                            <span class="font-bold text-indigo-700">UPTD SMP Negeri Satu Atap 1 Bangodua</span> didirikan berdasarkan SK Pendirian No. <span class="font-semibold text-indigo-600">425.11/Kep864_disdik/2007</span> pada tanggal <span class="font-semibold text-indigo-600">22 Agustus 2007</span>, berada di bawah pembinaan Kementerian Pendidikan Dasar dan Menengah serta naungan Pemerintah Daerah Kabupaten Indramayu. Sekolah ini berlokasi di <span class="font-semibold text-indigo-600">Jl. Guntur No 6, Blok Sukaasih, Desa Mulyasari, Kecamatan Bangodua, Kabupaten Indramayu, Provinsi Jawa Barat.</span>
                        </p>

                        <p class="text-gray-800 text-sm sm:text-base lg:text-lg leading-relaxed mb-6 lg:mb-8">
                            Sebagai sekolah negeri yang menyelenggarakan pendidikan jenjang SMP (DIKDAS), SMPN Satu Atap 1 Bangodua memiliki luas lahan <span class="font-bold text-purple-600">10.000 m²</span>, dilengkapi dengan fasilitas listrik dari PLN dan akses internet melalui CNI (Wavelan).
                        </p>

                        <p class="text-gray-800 text-sm sm:text-base lg:text-lg leading-relaxed mb-6 lg:mb-8">
                            Sekolah ini memperoleh SK Operasional No. 1 Tahun 2018 pada tanggal 10 Januari 2018, dan sejak itu telah menjalankan kegiatan pendidikan secara resmi. Dengan <span class="font-bold text-yellow-600 bg-yellow-100 px-2 py-1 rounded">Akreditasi A</span>, SMPN Satu Atap 1 Bangodua terus berkomitmen memberikan layanan pendidikan berkualitas bagi generasi muda di wilayah Bangodua dan sekitarnya.
                        </p>

                        <!-- Statistics Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mt-6 lg:mt-8">
                            <div class="stat-card text-center bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 scale-in" data-delay="100">
                                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2 text-white counter" data-target="143">0</div>
                                <div class="text-xs sm:text-sm lg:text-base text-indigo-100 font-semibold">Siswa Aktif</div>
                                <div class="mt-2 w-12 h-1 bg-white mx-auto rounded-full"></div>
                            </div>
                            <div class="stat-card text-center bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 scale-in" data-delay="200">
                                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2 text-white counter" data-target="11">0</div>
                                <div class="text-xs sm:text-sm lg:text-base text-purple-100 font-semibold">Tenaga Pendidik</div>
                                <div class="mt-2 w-12 h-1 bg-white mx-auto rounded-full"></div>
                            </div>
                            <div class="stat-card text-center bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl p-4 sm:p-6 shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 scale-in" data-delay="300">
                                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2 text-white counter" data-target="2007">0</div>
                                <div class="text-xs sm:text-sm lg:text-base text-pink-100 font-semibold">Tahun Berdiri</div>
                                <div class="mt-2 w-12 h-1 bg-white mx-auto rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer untuk animasi scroll
            const observerOptions = {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const delay = element.getAttribute('data-delay') || 0;
                        
                        setTimeout(() => {
                            element.classList.add('animated');
                        }, delay);
                        
                        observer.unobserve(element);
                    }
                });
            }, observerOptions);

            // Observe semua elemen dengan animasi
            const animatedElements = document.querySelectorAll(
                '.fade-in-down, .fade-in-up, .slide-in-left, .slide-in-right, .slide-in-up, .scale-in, .expand-width'
            );
            
            animatedElements.forEach(el => observer.observe(el));

            // Counter Animation
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-target'));
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        let current = 0;

                        const updateCounter = () => {
                            current += increment;
                            if (current < target) {
                                counter.textContent = Math.floor(current);
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = target;
                            }
                        };

                        updateCounter();
                        counterObserver.unobserve(counter);
                    }
                });
            }, { threshold: 0.5 });

            document.querySelectorAll('.counter').forEach(counter => {
                counterObserver.observe(counter);
            });

            // Ripple effect on card click
            const cards = document.querySelectorAll('.visi-card, .misi-card, .stat-card');
            cards.forEach(card => {
                card.addEventListener('click', function(e) {
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

            // Parallax effect on scroll (optional)
            let ticking = false;
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        const scrolled = window.pageYOffset;
                        const parallaxElements = document.querySelectorAll('.visi-card, .misi-card, .sejarah-section');

                        if (window.innerWidth > 768) {
                            parallaxElements.forEach((el, index) => {
                                const speed = 0.03;
                                const offset = scrolled * speed * (index % 2 === 0 ? 1 : -1);
                                el.style.transform = `translateY(${offset}px)`;
                            });
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            });
        });
    </script>
@endsection