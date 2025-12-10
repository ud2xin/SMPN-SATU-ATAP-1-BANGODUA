<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMPN 1 Bangodua</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Galeri -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/galeri') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Galeri</span>
        </a>
    </li>

    <!-- Nav Item - Kegiatan -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/kegiatan') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Kegiatan</span>
        </a>
    </li>

</ul>
