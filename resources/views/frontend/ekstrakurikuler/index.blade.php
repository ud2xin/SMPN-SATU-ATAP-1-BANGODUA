@extends('layouts.app')

@section('content')
    <div class="py-8 sm:py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen overflow-hidden relative">
        <!-- Animated Background Shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-32 h-32 sm:w-72 sm:h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
            <div class="absolute top-40 right-10 w-32 h-32 sm:w-72 sm:h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-32 h-32 sm:w-72 sm:h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Hero Header with Enhanced Animation -->
            <div class="text-center mb-8 sm:mb-12 animate-fadeInDown">
                <div class="inline-block mb-4 animate-bounceIn">
                    <span class="px-3 py-1.5 sm:px-4 sm:py-2 bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-700 rounded-full text-xs sm:text-sm font-semibold shadow-md hover:shadow-xl transition-all duration-300 hover:scale-110 cursor-pointer">
                        ✨ Pengembangan Bakat & Minat
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 mb-3 sm:mb-4 animate-gradient px-4">
                    Ekstrakurikuler
                </h1>
                <p class="text-gray-600 text-sm sm:text-base md:text-lg max-w-2xl mx-auto leading-relaxed px-4 animate-fadeInUp" style="animation-delay: 0.2s">
                    Temukan dan kembangkan bakat serta minatmu melalui berbagai kegiatan ekstrakurikuler
                </p>
                <div class="mt-4 sm:mt-6 h-1 w-16 sm:w-24 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 mx-auto rounded-full animate-expandWidth shadow-lg"></div>
            </div>

            <!-- Ekstrakurikuler Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @forelse($ekstrakurikuler as $index => $item)
                    <div class="ekskul-card group relative bg-white rounded-2xl sm:rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 sm:hover:-translate-y-3 animate-fadeInUp cursor-pointer"
                         style="animation-delay: {{ ($index % 6) * 0.1 }}s"
                         data-tilt>

                        <!-- Image Container -->
                        <div class="relative h-44 sm:h-48 md:h-56 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            @if($item->gambar)
                                <img
                                    src="{{ asset('storage/'.$item->gambar) }}"
                                    alt="{{ $item->nama }}"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-2"
                                    loading="lazy"
                                    style="opacity: 1;"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-100 to-purple-100">
                                    <svg class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 text-indigo-300 animate-pulse-subtle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                            @endif

                            <!-- Shimmer Effect -->
                            <div class="absolute inset-0 shimmer-effect opacity-0 group-hover:opacity-100"></div>

                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                    <a href="{{ route('frontend.ekstrakurikuler.show', $item->id) }}"
                                       class="w-full block text-center bg-white/20 backdrop-blur-md hover:bg-white/30 text-white px-3 py-2 sm:px-4 sm:py-2.5 rounded-lg font-semibold transition-all duration-300 hover:scale-105 border border-white/30">
                                        <span class="flex items-center justify-center text-xs sm:text-sm">
                                            <svg class="w-4 h-4 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Lihat Detail
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <!-- Icon Badge with Enhanced Animation -->
                            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 bg-white/95 backdrop-blur-sm p-2 rounded-full shadow-xl opacity-0 group-hover:opacity-100 transition-all duration-500 animate-bounceIn group-hover:rotate-[360deg] group-hover:scale-110">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>

                            <!-- Status Badge -->
                            <div class="absolute top-2 left-2 sm:top-3 sm:left-3 opacity-0 group-hover:opacity-100 transition-all duration-500 transform -translate-x-4 group-hover:translate-x-0">
                                <span class="px-2 py-1 sm:px-3 sm:py-1 bg-green-500/90 backdrop-blur-sm text-white text-xs rounded-full font-medium shadow-lg">
                                    Aktif
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-4 sm:p-5 md:p-6 bg-white relative">
                            <!-- Decorative Corner -->
                            <div class="absolute top-0 right-0 w-16 h-16 sm:w-20 sm:h-20 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                                <svg viewBox="0 0 100 100" class="w-full h-full text-indigo-600">
                                    <circle cx="50" cy="50" r="40" fill="currentColor"/>
                                </svg>
                            </div>

                            <h3 class="font-bold text-base sm:text-lg md:text-xl text-gray-900 mb-2 sm:mb-3 line-clamp-2 group-hover:text-indigo-600 transition-colors duration-300 relative z-10">
                                {{ $item->nama }}
                            </h3>

                            <p class="text-xs sm:text-sm text-gray-600 line-clamp-3 leading-relaxed mb-3 sm:mb-4 group-hover:text-gray-900 transition-colors duration-300 relative z-10">
                                {{ $item->deskripsi ?: 'Kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa' }}
                            </p>

                            <!-- Info Footer -->
                            <div class="space-y-1.5 sm:space-y-2 pt-3 sm:pt-4 border-t border-gray-100 relative z-10">
                                @if($item->pembina)
                                    <div class="flex items-center text-xs sm:text-sm text-gray-600 animate-slideInLeft group-hover:text-indigo-600 transition-colors duration-300">
                                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-indigo-100 flex items-center justify-center mr-2 flex-shrink-0 group-hover:bg-indigo-200 transition-colors duration-300">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span class="font-medium truncate">{{ $item->pembina }}</span>
                                    </div>
                                @endif

                                @if($item->jadwal)
                                    <div class="flex items-center text-xs sm:text-sm text-gray-600 animate-slideInLeft group-hover:text-purple-600 transition-colors duration-300" style="animation-delay: 0.1s">
                                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-purple-100 flex items-center justify-center mr-2 flex-shrink-0 group-hover:bg-purple-200 transition-colors duration-300">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span class="truncate">{{ $item->jadwal }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Button -->
                            <a href="{{ route('frontend.ekstrakurikuler.show', $item->id) }}"
                               class="mt-3 sm:mt-4 w-full block text-center bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 text-white px-4 py-2 sm:py-2.5 rounded-lg sm:rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 shadow-md hover:shadow-2xl text-xs sm:text-sm relative overflow-hidden group/btn">
                                <span class="relative z-10 flex items-center justify-center">
                                    Selengkapnya
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 inline-block ml-1 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                                <div class="absolute inset-0 bg-white/20 transform scale-x-0 group-hover/btn:scale-x-100 transition-transform duration-500 origin-left"></div>
                            </a>
                        </div>

                        <!-- Bottom Border Accent with Wave Animation -->
                        <div class="h-1 sm:h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

                        <!-- Particle Effects -->
                        <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="particle particle-1"></div>
                            <div class="particle particle-2"></div>
                            <div class="particle particle-3"></div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State with Enhanced Animation -->
                    <div class="col-span-full flex flex-col items-center justify-center py-12 sm:py-16 md:py-20 animate-fadeInUp">
                        <div class="bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 rounded-full p-6 sm:p-8 md:p-10 mb-4 sm:mb-6 animate-bounce-subtle shadow-xl">
                            <svg class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 text-indigo-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-500 mb-2 animate-fadeIn">Belum Ada Ekstrakurikuler</h3>
                        <p class="text-xs sm:text-sm md:text-base text-gray-400 text-center max-w-md px-4 animate-fadeIn" style="animation-delay: 0.2s">
                            Saat ini belum ada kegiatan ekstrakurikuler yang tersedia.<br class="hidden sm:inline">Silakan cek kembali nanti.
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination with Enhanced Animation -->
            @if($ekstrakurikuler->hasPages())
                <div class="mt-8 sm:mt-10 md:mt-12 flex justify-center animate-fadeInUp" style="animation-delay: 0.5s">
                    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-2 sm:p-3 hover:shadow-2xl transition-all duration-300 hover:scale-105">
                        {{ $ekstrakurikuler->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>

    @push('styles')
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
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

        @keyframes expandWidth {
            from { width: 0; }
            to { width: 100%; }
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }

        @keyframes blob {
            0%, 100% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes particleFloat {
            0% {
                transform: translate(0, 0);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translate(var(--tx), var(--ty));
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

        .animate-fadeInDown {
            animation: fadeInDown 0.8s ease-out;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.6s ease-out;
            animation-fill-mode: both;
        }

        .animate-bounceIn {
            animation: bounceIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .animate-expandWidth {
            animation: expandWidth 1.5s ease-out forwards;
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }

        .animate-bounce-subtle {
            animation: float 3s ease-in-out infinite;
        }

        .animate-pulse-subtle {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
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
                rgba(255, 255, 255, 0.5),
                transparent
            );
            animation: shimmer 2s infinite;
            pointer-events: none;
        }

        /* Card Hover Effects */
        .ekskul-card {
            transform-style: preserve-3d;
            will-change: transform;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ekskul-card:hover {
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .ekskul-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, transparent, rgba(79, 70, 229, 0.05), transparent);
            opacity: 0;
            transition: opacity 0.5s;
            pointer-events: none;
            z-index: 1;
        }

        .ekskul-card:hover::before {
            opacity: 1;
        }

        /* Particle Effects */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.8), transparent);
            border-radius: 50%;
            animation: particleFloat 2s ease-out infinite;
        }

        .particle-1 {
            top: 20%;
            left: 20%;
            --tx: -30px;
            --ty: -40px;
            animation-delay: 0s;
        }

        .particle-2 {
            top: 60%;
            right: 20%;
            --tx: 40px;
            --ty: -30px;
            animation-delay: 0.5s;
        }

        .particle-3 {
            bottom: 20%;
            left: 40%;
            --tx: 20px;
            --ty: 50px;
            animation-delay: 1s;
        }

        /* Ripple Effect */
        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(99, 102, 241, 0.4);
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
            z-index: 50;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .ekskul-card {
                animation-delay: 0s !important;
            }

            .animate-blob {
                animation: blob 10s infinite;
            }
        }

        /* Touch device optimizations */
        @media (hover: none) and (pointer: coarse) {
            .ekskul-card:active {
                transform: scale(0.98);
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
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth parallax effect on scroll (desktop only)
            if (window.innerWidth > 768) {
                let ticking = false;

                window.addEventListener('scroll', function() {
                    if (!ticking) {
                        window.requestAnimationFrame(function() {
                            const scrolled = window.pageYOffset;
                            const cards = document.querySelectorAll('.ekskul-card');

                            cards.forEach((card, index) => {
                                const speed = 0.03;
                                const offset = scrolled * speed * (index % 2 === 0 ? 1 : -1);
                                card.style.transform = `translateY(${offset}px)`;
                            });

                            ticking = false;
                        });

                        ticking = true;
                    }
                });
            }

            // Enhanced ripple effect on card click
            const cards = document.querySelectorAll('.ekskul-card');
            cards.forEach(card => {
                card.addEventListener('click', function(e) {
                    if (e.target.tagName === 'A' || e.target.closest('a')) return;

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

            // Simple 3D tilt effect (desktop only)
            if (window.innerWidth > 768) {
                cards.forEach(card => {
                    card.addEventListener('mousemove', function(e) {
                        const rect = this.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;

                        const centerX = rect.width / 2;
                        const centerY = rect.height / 2;

                        const rotateX = (y - centerY) / 30;
                        const rotateY = (centerX - x) / 30;

                        this.style.transition = 'transform 0.1s ease-out';
                        this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
                    });

                    card.addEventListener('mouseleave', function() {
                        this.style.transition = 'transform 0.4s ease-out';
                        this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
                    });
                });
            }

            // Lazy loading images with fade-in effect
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');

            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;

                            // Only apply fade if image hasn't loaded yet
                            if (!img.complete) {
                                img.style.opacity = '0';
                                img.style.transition = 'opacity 0.5s ease-in-out';

                                img.addEventListener('load', () => {
                                    img.style.opacity = '1';
                                }, { once: true });
                            } else {
                                // Image already loaded, show immediately
                                img.style.opacity = '1';
                            }

                            imageObserver.unobserve(img);
                        }
                    });
                }, {
                    rootMargin: '50px'
                });

                lazyImages.forEach(img => imageObserver.observe(img));
            }

            // Animate cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fadeInUp');
                    }
                });
            }, observerOptions);

            cards.forEach(card => observer.observe(card));

            // Add hover sound effect (optional - uncomment if needed)
            /*
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    // Play a subtle hover sound
                    // const audio = new Audio('/path/to/hover-sound.mp3');
                    // audio.volume = 0.1;
                    // audio.play();
                });
            });
            */
        });
    </script>
    @endpush
@endsection
