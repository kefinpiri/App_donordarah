<aside class="app-sidebar sidebar-modern shadow-lg" data-bs-theme="dark">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" class="brand-image shadow" />
            <span class="brand-text">Donor Darah</span>
        </a>
    </div>

    {{-- MENU --}}
    <div class="sidebar-wrapper">
        <nav class="mt-3">
            <ul class="nav sidebar-menu flex-column">

                {{-- ================= ADMIN ================= --}}
                @role('admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-house-heart"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    @can('view petugas')
                        <li class="nav-item">
                            <a href="{{ url('/admin/petugas') }}"
                                class="nav-link {{ request()->is('admin/petugas*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-badge"></i>
                                <p>Petugas</p>
                            </a>
                        </li>
                    @endcan

                    @can('view pendonor')
                        <li class="nav-item">
                            <a href="{{ route('admin.pendonor.index') }}"
                                class="nav-link {{ request()->is('admin/pendonor*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-droplet-half"></i>
                                <p>Pendonor</p>
                            </a>
                        </li>
                    @endcan

                    @can('view pasien')
                        <li class="nav-item">
                            <a href="{{ url('/admin/pasien') }}"
                                class="nav-link {{ request()->is('admin/pasien*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-heart-pulse"></i>
                                <p>Pasien</p>
                            </a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <a href="{{ url('/admin/roles') }}" class="nav-link">
                            <i class="nav-icon bi bi-people"></i>
                            <p>Role</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/admin/permissions') }}" class="nav-link">
                            <i class="nav-icon bi bi-toggles"></i>
                            <p>Permission</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.laporan') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-bar-graph"></i>
                            <p>Laporan</p>
                        </a>
                    </li>
                @endrole

                {{-- ================= PETUGAS ================= --}}
                @role('petugas')
                    <li class="nav-item">
                        <a href="{{ route('petugas.dashboard') }}" class="nav-link">
                            <i class="nav-icon bi bi-house-heart"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('petugas.stok-darah.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-droplet-fill"></i>
                            <p>Stok Darah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('petugas.permintaan-darah.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-medical"></i>
                            <p>Permintaan Darah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('petugas.distribusi-darah.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-truck-front"></i>
                            <p>Distribusi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('petugas.laporan') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-bar-graph"></i>
                            <p>Laporan</p>
                        </a>
                    </li>
                @endrole

                {{-- ================= DONOR ================= --}}
                @role('donor')
                    <li class="nav-item">
                        <a href="{{ route('donor.dashboard') }}" class="nav-link">
                            <i class="nav-icon bi bi-house-heart"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/donor/jadwal') }}" class="nav-link">
                            <i class="nav-icon bi bi-calendar-heart"></i>
                            <p>Jadwal Donor</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/donor/riwayat') }}" class="nav-link">
                            <i class="nav-icon bi bi-journal-medical"></i>
                            <p>Riwayat Donor</p>
                        </a>
                    </li>
                @endrole

                {{-- ================= PEMOHON ================= --}}
                @role('pemohon')
                    <li class="nav-item">
                        <a href="{{ route('pemohon.dashboard') }}" class="nav-link">
                            <i class="nav-icon bi bi-house-heart"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pemohon.permintaan-darah.create') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-medical-fill"></i>
                            <p>Permintaan Darah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pemohon.permintaan-darah.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-activity"></i>
                            <p>Status Permintaan</p>
                        </a>
                    </li>
                @endrole

            </ul>
        </nav>
    </div>

</aside>
