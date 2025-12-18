<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/berita.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/single-berita.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/single-karya.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/karya.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">

            {{-- NAVBAR --}}
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="content-wrapper">
                @yield('content')
            </main>

        </div>

        {{-- FOOTER --}}
        @include('layouts.footer')

        <script src="{{ asset('assets/js/all.js') }}"></script>
        <script src="{{ asset('assets/js/berita.js') }}"></script>
        <script src="{{ asset('assets/js/single-berita.js') }}"></script>
        <script src="{{ asset('assets/js/single-karya.js') }}"></script>
        @stack('scripts')
    </body>
</html>
