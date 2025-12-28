@extends('layouts.app')

@section('content')
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

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Initial Hidden State */
        .animate-on-scroll {
            opacity: 0;
        }

        /* Animasi Classes */
        .animate-fadeInDown {
            animation: fadeInDown 0.8s ease-out;
        }

        .animate-fadeInUp.animated {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-scaleIn.animated {
            animation: scaleIn 0.6s ease-out forwards;
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-out;
        }

        .animate-expandWidth.animated {
            animation: expandWidth 1s ease-out forwards;
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

    <div class="margin-gw py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero Header dengan Animasi -->
            <div class="text-center mb-12 animate-fadeInDown">
                <div class="inline-block mb-4 animate-bounce-slow">
                    <span class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold
                        shadow-md hover:shadow-lg transition-shadow duration-300">
                        Tenaga Pendidik
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-transparent bg-clip-text
                    bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 mb-4 animate-gradient">
                    Daftar Guru
                </h1>
                <p class="text-gray-600 text-base sm:text-lg lg:text-xl max-w-2xl mx-auto px-4">
                    SMPN SATU ATAP 1 BANGODUA
                </p>
                <div class="mt-6 h-1 w-16 sm:w-24 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full
                    animate-pulse-slow"></div>
            </div>

            <!-- Group by urut -->
            @php
                $grouped = $guru->groupBy('urut')->sortKeys();
                
                // Mapping urut ke nama badge statis
                $badgeMapping = [
                    1 => 'Kepsek & Wakasek',
                    2 => 'Guru',
                    3 => 'Staff'
                ];
            @endphp

            @foreach($grouped as $urut => $items)
                <div class="mb-16 animate-on-scroll animate-fadeInUp" data-delay="{{ $loop->index * 100 }}">

                    <!-- Jabatan Indicator -->
                    <div class="flex items-center justify-center mb-8">
                        <div class="flex-grow h-px bg-gradient-to-r from-transparent via-indigo-300 to-transparent
                            animate-on-scroll animate-expandWidth" data-delay="{{ $loop->index * 100 }}"></div>

                        <div class="px-4 sm:px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full
                            shadow-lg mx-2 sm:mx-4 transform hover:scale-110 transition-transform duration-300">
                            <span class="text-white font-semibold text-sm sm:text-base">
                                {{ $badgeMapping[$urut] ?? $items->first()->jabatan }}
                            </span>
                        </div>

                        <div class="flex-grow h-px bg-gradient-to-r from-transparent via-indigo-300 to-transparent
                            animate-on-scroll animate-expandWidth" data-delay="{{ $loop->index * 100 }}"></div>
                    </div>

                    <!-- Grid Responsif -->
                    <div class="grid
                        @if($items->count() == 1)
                            grid-cols-1 max-w-sm mx-auto
                        @elseif($items->count() == 2)
                            grid-cols-1 sm:grid-cols-2 max-w-2xl mx-auto
                        @elseif($items->count() == 3)
                            grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 max-w-4xl mx-auto
                        @else
                            grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4
                        @endif
                        gap-4 sm:gap-6 lg:gap-8">

                        @foreach($items as $g)
                            <div class="group relative bg-white rounded-3xl shadow-lg overflow-hidden
                                transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3
                                animate-on-scroll animate-scaleIn cursor-pointer"
                                data-delay="{{ ($loop->parent->index * 100) + ($loop->index * 100) }}">

                                <!-- Foto - Diperbesar untuk efek lonjong -->
                                <div class="relative h-80 sm:h-96 lg:h-[28rem] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                                    @if($g->foto)
                                        <img src="{{ asset('storage/' . $g->foto) }}"
                                             class="w-full h-full object-cover transition-transform duration-700
                                             group-hover:scale-110 group-hover:rotate-2"
                                             alt="{{ $g->nama }}" loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center
                                            bg-gradient-to-br from-indigo-100 to-purple-100
                                            group-hover:from-indigo-200 group-hover:to-purple-200 transition-colors">
                                            <svg class="w-24 h-24 sm:w-32 md:w-40 text-indigo-300 animate-float"
                                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Badge Corner -->
                                    <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm rounded-full p-2
                                        transform scale-0 group-hover:scale-100 transition-transform duration-300
                                        shadow-lg">
                                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Konten - Lebih compact -->
                                <div class="p-5 sm:p-6 bg-white text-center">
                                    <div class="inline-flex items-center px-3 sm:px-4 py-1.5 bg-gradient-to-r
                                        from-indigo-100 to-purple-100 text-indigo-700 rounded-full text-xs sm:text-sm
                                        font-semibold group-hover:from-indigo-200 group-hover:to-purple-200
                                        transition-all duration-300 shadow-sm group-hover:shadow-md">

                                        <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-2 animate-pulse-slow" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                                  clip-rule="evenodd"/>
                                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                                        </svg>

                                        <span class="truncate">{{ $g->jabatan }}</span>
                                    </div>
                                </div>

                                <!-- Bottom Border Animation -->
                                <div class="h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
                                    transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500
                                    origin-left"></div>

                            </div>
                        @endforeach

                    </div>
                </div>
            @endforeach

            <!-- Empty State dengan Animasi -->
            @if($guru->isEmpty())
                <div class="flex flex-col items-center py-12 sm:py-20 animate-fadeIn">
                    <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full p-6 sm:p-8 mb-6
                        animate-bounce-slow">
                        <svg class="w-16 h-16 sm:w-24 sm:h-24 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-500 mb-2 px-4">Belum Ada Data Guru</h3>
                    <p class="text-gray-400 text-center max-w-md text-sm sm:text-base px-4">
                        Data guru belum tersedia.<br>Silakan cek kembali nanti.
                    </p>
                </div>
            @endif

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
                            element.style.opacity = '1';
                        }, delay);
                        
                        // Unobserve after animation to improve performance
                        observer.unobserve(element);
                    }
                });
            }, observerOptions);

            // Observe semua elemen dengan animasi scroll
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            animatedElements.forEach(el => observer.observe(el));

            // Add ripple effect on card click
            const cards = document.querySelectorAll('.group.relative.bg-white');
            cards.forEach(card => {
                card.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(99, 102, 241, 0.3);
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        transform: scale(0);
                        animation: ripple 0.6s ease-out;
                        pointer-events: none;
                        z-index: 50;
                    `;

                    this.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 600);
                });
            });

            // Parallax effect on scroll (optional, desktop only)
            if (window.innerWidth > 768) {
                let ticking = false;
                
                window.addEventListener('scroll', function() {
                    if (!ticking) {
                        window.requestAnimationFrame(function() {
                            const scrolled = window.pageYOffset;
                            const parallaxCards = document.querySelectorAll('.group.relative.bg-white');

                            parallaxCards.forEach((card, index) => {
                                const speed = 0.02;
                                const offset = scrolled * speed * (index % 2 === 0 ? 1 : -1);
                                card.style.transform = `translateY(${offset}px)`;
                            });

                            ticking = false;
                        });
                        ticking = true;
                    }
                });
            }

            // Lazy loading images with fade-in effect
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');

            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;

                            if (!img.complete) {
                                img.style.opacity = '0';
                                img.style.transition = 'opacity 0.5s ease-in-out';

                                img.addEventListener('load', () => {
                                    img.style.opacity = '1';
                                }, { once: true });
                            } else {
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
        });
    </script>
@endsection