<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('admin/dashboard') }}">
            <span class="align-middle">JAM DIGITAL</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ request()->is(['admin','admin/dashboard']) ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Display Masjid
            </li>

            <li class="sidebar-item {{ request()->is('admin/jadwal-sholat*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/jadwal-sholat') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Jadwal Sholat</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->is('admin/petugas-jumat*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/petugas-jumat') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Petugas Jum'at</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->is('admin/kegiatan-masjid*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/kegiatan-masjid') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Kegiatan Masjid</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->is('admin/slider*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/slider') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Slider Image</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->is('admin/running-text*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/running-text') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Running Text</span>
                </a>
            </li>

            <li class="sidebar-header">
                Laporan Keuangan
            </li>
            <li class="sidebar-item {{ request()->is('admin/kategori-keuangan*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/kategori-keuangan') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Kategori Keuangan</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->is('admin/keuangan-masjid*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/keuangan-masjid') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Keuangan Masjid</span>
                </a>
            </li>

            <li class="sidebar-header">
                Pengaturan
            </li>
            <li class="sidebar-item {{ request()->is('admin/pengaturan-detail-masjid*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/pengaturan-detail-masjid') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Pengaturan Masjid</span>
                </a>
            </li>
            <li class="sidebar-item mb-5 {{ request()->is('admin/pengaturan-app*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/pengaturan-app') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Pengaturan Aplikasi</span>
                </a>
            </li>
        </ul>
    </div>
</nav>