<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }
            .animate-float {
                animation: float 3s ease-in-out infinite;
            }
            @keyframes gradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            .animate-gradient {
                background-size: 200% 200%;
                animation: gradient 15s ease infinite;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Full Screen Background with Gradient - WARNA BIRU SESUAI GAMBAR -->
        <div class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 animate-gradient relative overflow-hidden">

            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-white opacity-5 rounded-full -mr-48 -mt-48"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-white opacity-5 rounded-full -ml-40 -mb-40"></div>
            <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-white opacity-5 rounded-full"></div>

            <!-- Main Content Container -->
            <div class="relative z-10 w-full max-w-md space-y-8">

                <!-- Logo & School Name -->
                <div class="text-center">
                    <div class="flex justify-center mb-6">
                        <div class="relative">
                            <div class="w-24 h-24 bg-white rounded-2xl flex items-center justify-center shadow-2xl animate-float">
                                <svg class="w-14 h-14 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-white mb-3">
                        SMP Negeri Satu Atap 1
                    </h1>
                    <p class="text-xl font-semibold text-blue-100 mb-2">
                        Bangodua
                    </p>
                    <p class="text-sm text-blue-200">
                        Sistem Informasi Manajemen Sekolah
                    </p>
                </div>

                <!-- Login Form Card -->
                <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 backdrop-blur-sm">
                    <!-- Title -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang!</h2>
                        <p class="text-gray-600">Silakan masuk ke akun Anda</p>
                    </div>

                    {{ $slot }}
                </div>

                <!-- Features - Below Form dengan Spacing -->
                <div class="space-y-4 pt-4">
                    <div class="flex items-center bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4 text-white transform hover:scale-105 transition duration-300">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium">Manajemen Data Terpadu</span>
                    </div>
                    <div class="flex items-center bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4 text-white transform hover:scale-105 transition duration-300">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium">Keamanan Data Terjamin</span>
                    </div>
                    <div class="flex items-center bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-4 text-white transform hover:scale-105 transition duration-300">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium">Akses Cepat & Mudah</span>
                    </div>
                </div>

                <!-- Accreditation Badge dengan Spacing -->
                <div class="text-center pt-6">
                    <div class="inline-flex items-center bg-white bg-opacity-10 backdrop-blur-sm rounded-full px-6 py-3 text-white shadow-lg">
                        <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="font-semibold">Terakreditasi A</span>
                    </div>
                </div>

                <!-- Footer dengan Spacing -->
                <div class="text-center pt-8 pb-4">
                    <p class="text-sm text-blue-100">
                        © {{ date('Y') }} SMPN Satu Atap 1 Bangodua. All rights reserved.
                    </p>
                </div>
            </div>

        </div>
    </body>
</html>
