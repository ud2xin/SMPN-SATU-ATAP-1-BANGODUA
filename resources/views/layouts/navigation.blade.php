<!-- Navbar -->
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <div class="logo-section">
        <img src="{{ asset('assets/img/Logo Satap.png') }}" alt="Logo SMA Negeri 1" class="logo">
            <span class="school-name">SMP NEGERI SATU ATAP 1 BANGODUA</span>
        </div>

        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <ul class="nav-menu" id="navMenu">
            <li class="dropdown">
                <a href="#" class="menu-gw">Informasi <span class="arrow">▼</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/lokasi') }}">Lokasi</a></li>
                    <li><a href="{{ url('/tentang') }}">Sejarah & Visi Misi</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-gw">Struktur Organisasi <span class="arrow">▼</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/osis') }}">Osis</a></li>
                    <li><a href="{{ url('/guru') }}">Guru dan Staff</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/berita') }}" class="menu-gw">Berita</a></li>
            <li><a href="{{ url('/karya') }}" class="menu-gw">Karya</a></li>
            <li><a href="{{ url('/galeri') }}" class="menu-gw">Galeri</a></li>
            <li><a href="{{ url('/spmb') }}" class="menu-gw">SPMB</a></li>
            <li><a href="#login" class="login-btn">Login Admin</a></li>
        </ul>
    </div>
</nav>