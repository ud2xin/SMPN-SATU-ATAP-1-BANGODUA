@extends('layouts.app')

@section('content')
    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero Header with Animation -->
            <div class="text-center mb-12 animate-fadeInDown">
                <div class="inline-block mb-4 animate-bounceIn">
                    <span class="px-4 py-2 bg-gradient-to-r from-indigo-100 to-purple-100 text-indigo-700 rounded-full text-sm font-semibold shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105">
                        ✨ Pengembangan Bakat & Minat
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-4 animate-gradient">
                    Ekstrakurikuler
                </h1>
                <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed px-4 animate-fadeInUp" style="animation-delay: 0.2s">
                    Temukan dan kembangkan bakat serta minatmu melalui berbagai kegiatan ekstrakurikuler
                </p>
                <div class="mt-6 h-1 w-24 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full animate-expandWidth"></div>
            </div>

            <!-- Ekstrakurikuler Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @forelse($ekstrakurikuler as $index => $item)
                    <div class="ekskul-card group relative bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-3 animate-fadeInUp" style="animation-delay: {{ ($index % 6) * 0.1 }}s">

                        <!-- Image Container -->
                        <div class="relative h-48 sm:h-56 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            @if($item->gambar)
                                <img
                                    src="{{ asset('storage/'.$item->gambar) }}"
                                    alt="{{ $item->nama }}"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-2"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-100 to-purple-100">
                                    <svg class="w-20 h-20 sm:w-24 sm:h-24 text-indigo-300 animate-pulse-subtle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                            @endif

                            <!-- Shimmer Effect -->
                            <div class="absolute inset-0 shimmer-effect opacity-0 group-hover:opacity-100"></div>

                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                    <a href="{{ route('frontend.ekstrakurikuler.show', $item->id) }}"
                                       class="w-full block text-center bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-3 sm:px-4 py-2 rounded-lg font-semibold transition-all duration-300 hover:scale-105">
                                        <span class="flex items-center justify-center text-sm sm:text-base">
                                            <svg class="w-4 h-4 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Lihat Detail
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <!-- Icon Badge with Animation -->
                            <div class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm p-2 sm:p-2.5 rounded-full shadow-xl opacity-0 group-hover:opacity-100 transition-all duration-300 animate-bounceIn group-hover:rotate-12 group-hover:scale-110">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-indigo-600 animate-wiggle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-5 sm:p-6 bg-white">
                            <h3 class="font-bold text-lg sm:text-xl text-gray-900 mb-3 line-clamp-1 group-hover:text-indigo-600 transition-colors duration-300">
                                {{ $item->nama }}
                            </h3>

                            <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed mb-4 group-hover:text-gray-900 transition-colors duration-300">
                                {{ $item->deskripsi ?: 'Kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa' }}
                            </p>

                            <!-- Info Footer -->
                            <div class="space-y-2 pt-4 border-t border-gray-100">
                                @if($item->pembina)
                                    <div class="flex items-center text-xs sm:text-sm text-gray-600 animate-slideInLeft">
                                        <svg class="w-4 h-4 mr-2 text-indigo-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium truncate">{{ $item->pembina }}</span>
                                    </div>
                                @endif

                                @if($item->jadwal)
                                    <div class="flex items-center text-xs sm:text-sm text-gray-600 animate-slideInLeft" style="animation-delay: 0.1s">
                                        <svg class="w-4 h-4 mr-2 text-purple-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="truncate">{{ $item->jadwal }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Button -->
                            <a href="{{ route('frontend.ekstrakurikuler.show', $item->id) }}"
                               class="mt-4 w-full block text-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-4 py-2.5 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 shadow-md hover:shadow-xl text-sm sm:text-base">
                                Selengkapnya
                                <svg class="w-4 h-4 inline-block ml-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>

                        <!-- Bottom Border Accent with Wave Animation -->
                        <div class="h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    </div>
                @empty
                    <!-- Empty State with Animation -->
                    <div class="col-span-full flex flex-col items-center justify-center py-16 sm:py-20 animate-fadeInUp">
                        <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full p-6 sm:p-8 mb-4 sm:mb-6 animate-bounce-subtle">
                            <svg class="w-20 h-20 sm:w-24 sm:h-24 text-indigo-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-500 mb-2 animate-fadeIn">Belum Ada Ekstrakurikuler</h3>
                        <p class="text-sm sm:text-base text-gray-400 text-center max-w-md px-4 animate-fadeIn" style="animation-delay: 0.2s">
                            Saat ini belum ada kegiatan ekstrakurikuler yang tersedia.<br>Silakan cek kembali nanti.
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination with Animation -->
            @if($ekstrakurikuler->hasPages())
                <div class="mt-10 sm:mt-12 flex justify-center animate-fadeInUp" style="animation-delay: 0.5s">
                    <div class="bg-white rounded-xl shadow-lg p-2 hover:shadow-xl transition-shadow duration-300">
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

        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
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
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-pulse-subtle {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .animate-wiggle {
            animation: wiggle 2s ease-in-out infinite;
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
                rgba(255, 255, 255, 0.4),
                transparent
            );
            animation: shimmer 2s infinite;
            pointer-events: none;
        }

        /* Card Hover Effects */
        .ekskul-card::before {
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
            z-index: 1;
        }

        .ekskul-card:hover::before {
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .ekskul-card {
                animation-delay: 0s !important;
            }
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Parallax effect on scroll
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const cards = document.querySelectorAll('.ekskul-card');

                cards.forEach((card, index) => {
                    if (window.innerWidth > 768) {
                        const speed = 0.05;
                        const offset = scrolled * speed * (index % 2 === 0 ? 1 : -1);
                        card.style.transform = `translateY(${offset}px)`;
                    }
                });
            });

            // Add ripple effect on card click
            const cards = document.querySelectorAll('.ekskul-card');
            cards.forEach(card => {
                card.addEventListener('click', function(e) {
                    // Don't add ripple if clicking on a link
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

            // Lazy loading images
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');

            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.style.opacity = '0';
                            img.addEventListener('load', () => {
                                img.style.transition = 'opacity 0.5s';
                                img.style.opacity = '1';
                            });
                            imageObserver.unobserve(img);
                        }
                    });
                });

                lazyImages.forEach(img => imageObserver.observe(img));
            }
        });
    </script>

    <style>
        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(99, 102, 241, 0.3);
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
            z-index: 10;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
    @endpush
@endsection
