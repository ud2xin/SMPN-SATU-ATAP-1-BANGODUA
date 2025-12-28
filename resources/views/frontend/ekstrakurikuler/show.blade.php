@extends('layouts.app')

@section('content')
    <style>
        /* Keyframe Animations */
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

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(1.1);
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

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.85;
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
            animation: fadeIn 0.8s ease-out;
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
            animation-fill-mode: both;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out;
        }

        .animate-slideInUp {
            animation: slideInUp 0.6s ease-out;
        }

        .animate-zoomIn {
            animation: zoomIn 1s ease-out;
        }

        .animate-bounceIn {
            animation: bounceIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-wiggle {
            animation: wiggle 3s ease-in-out infinite;
        }

        .animate-bounce-subtle {
            animation: bounce 2s infinite;
        }

        .animate-pulse-subtle {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Card Hover Effects */
        .info-card {
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            opacity: 0;
            transition: opacity 0.5s;
            pointer-events: none;
        }

        .info-card:hover::before {
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

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .animate-slideInLeft,
            .animate-slideInRight {
                animation-delay: 0s !important;
            }
        }

        /* Reduce motion for accessibility */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>

    <div class="margin-gw py-8 sm:py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Back Button with Animation -->
            <div class="mb-6 sm:mb-8 animate-slideInLeft">
                <a href="{{ route('frontend.ekstrakurikuler.index') }}"
                   class="inline-flex items-center px-4 sm:px-6 py-2.5 sm:py-3 bg-white text-gray-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 hover:bg-gray-50 hover:-translate-x-1 text-sm sm:text-base group">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>

            <!-- Main Card with Animation -->
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden animate-fadeInUp">

                <!-- Hero Image Section -->
                <div class="relative h-64 sm:h-80 md:h-96 overflow-hidden bg-gradient-to-br from-indigo-500 to-purple-600">
                    @if($ekskul->gambar)
                        <img
                            src="{{ asset('storage/'.$ekskul->gambar) }}"
                            alt="{{ $ekskul->nama }}"
                            class="w-full h-full object-cover animate-zoomIn"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    @else
                        <div class="w-full h-full flex items-center justify-center animate-fadeIn">
                            <svg class="w-32 h-32 sm:w-40 sm:h-40 text-white/30 animate-pulse-subtle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                    @endif

                    <!-- Floating Decoration -->
                    <div class="absolute top-0 right-0 w-32 sm:w-48 h-32 sm:h-48 bg-white opacity-10 rounded-full -mr-16 sm:-mr-24 -mt-16 sm:-mt-24 animate-float"></div>
                    <div class="absolute bottom-0 left-0 w-24 sm:w-32 h-24 sm:h-32 bg-white opacity-10 rounded-full -ml-12 sm:-ml-16 -mb-12 sm:-mb-16 animate-float" style="animation-delay: 1s"></div>

                    <!-- Title Overlay with Animation -->
                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-6 md:p-8 text-white animate-slideInUp">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center mb-2 sm:mb-3">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-3 sm:mb-0 sm:mr-4 animate-bounceIn shadow-lg">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 animate-wiggle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold drop-shadow-lg">
                                {{ $ekskul->nama }}
                            </h1>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-4 sm:p-6 md:p-8 lg:p-12">

                    <!-- Info Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">

                        <!-- Pembina Card -->
                        @if($ekskul->pembina)
                        <div class="info-card bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-xl lg:rounded-2xl p-4 sm:p-6 border-2 border-indigo-200 hover:shadow-lg transition-all duration-300 hover:scale-105 animate-slideInLeft cursor-pointer">
                            <div class="flex items-center">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-indigo-500 rounded-xl flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0 animate-pulse-subtle shadow-md">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <h3 class="text-xs sm:text-sm text-indigo-600 font-semibold uppercase tracking-wide mb-1">Pembina</h3>
                                    <p class="text-base sm:text-lg lg:text-xl font-bold text-gray-900 truncate">{{ $ekskul->pembina }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Jadwal Card -->
                        @if($ekskul->jadwal)
                        <div class="info-card bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl lg:rounded-2xl p-4 sm:p-6 border-2 border-purple-200 hover:shadow-lg transition-all duration-300 hover:scale-105 animate-slideInRight cursor-pointer">
                            <div class="flex items-center">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500 rounded-xl flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0 animate-pulse-subtle shadow-md">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <h3 class="text-xs sm:text-sm text-purple-600 font-semibold uppercase tracking-wide mb-1">Jadwal Kegiatan</h3>
                                    <p class="text-base sm:text-lg lg:text-xl font-bold text-gray-900 truncate">{{ $ekskul->jadwal }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Description Section -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl lg:rounded-2xl p-4 sm:p-6 lg:p-8 border-2 border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 animate-fadeInUp" style="animation-delay: 0.3s">
                        <div class="flex items-start">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0 mt-0.5 sm:mt-1 shadow-md animate-bounce-subtle">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3 sm:mb-4">Tentang Ekstrakurikuler Ini</h2>
                                @if($ekskul->deskripsi)
                                    <div class="prose prose-sm sm:prose lg:prose-lg max-w-none">
                                        <p class="text-sm sm:text-base text-gray-700 leading-relaxed whitespace-pre-line">{{ $ekskul->deskripsi }}</p>
                                    </div>
                                @else
                                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-4 sm:p-6 border-2 border-dashed border-indigo-200 animate-pulse-subtle">
                                        <p class="text-sm sm:text-base text-gray-600 text-center italic">
                                            📚 Kegiatan ekstrakurikuler {{ $ekskul->nama }} untuk mengembangkan bakat dan minat siswa di SMPN SATU ATAP 1 BANGODUA
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Additional Info with Animation -->
            <div class="mt-6 sm:mt-8 text-center text-gray-500 text-xs sm:text-sm animate-fadeIn" style="animation-delay: 0.5s">
                <p class="flex items-center justify-center flex-wrap px-4">
                    <svg class="w-4 h-4 mr-2 animate-wiggle" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    <span>Informasi dapat berubah sewaktu-waktu</span>
                </p>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Parallax effect on scroll
            window.addEventListener('scroll', function() {
                if (window.innerWidth > 768) {
                    const scrolled = window.pageYOffset;
                    const heroSection = document.querySelector('.relative.h-64, .relative.h-80, .relative.h-96');

                    if (heroSection) {
                        const img = heroSection.querySelector('img, .w-full.h-full');
                        if (img) {
                            img.style.transform = `translateY(${scrolled * 0.3}px) scale(1.1)`;
                        }
                    }
                }
            });

            // Add ripple effect on info cards
            const infoCards = document.querySelectorAll('.info-card');
            infoCards.forEach(card => {
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

            // Smooth scroll reveal for elements
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fadeInUp');
                    }
                });
            }, observerOptions);

            // Observe all animated elements
            document.querySelectorAll('.info-card, .bg-gradient-to-br.from-gray-50').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
@endsection