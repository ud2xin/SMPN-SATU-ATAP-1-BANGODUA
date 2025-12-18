<!-- Navbar -->
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <div class="logo-section">
            <div class="logo">🎓</div>
            <span class="school-name">SMA Negeri 1</span>
        </div>

        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <ul class="nav-menu" id="navMenu">
            <li><a href="{{ route('frontend.berita') }}">Berita</a></li>
            <li><a href="">Galeri</a></li>
            <li><a href="{{ route('frontend.karya') }}">Karya</a></li>
            <li><a href="#contact">Kontak</a></li>

            {{-- Jika mau dibuat link login Laravel --}}
            {{-- <li><a href="{{ route('login') }}" class="login-btn">Login Admin</a></li> --}}
            
            <li><a href="#login" class="login-btn">Login Admin</a></li>
        </ul>
    </div>
</nav>
