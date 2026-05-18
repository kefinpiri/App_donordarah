<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Donor Darah</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">

            <ul class="nav sidebar-menu flex-column">

                {{-- DASHBOARD (SEMUA ROLE) --}}
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- ================= ADMIN ================= --}}
                @role('admin')
                    {{-- <li class="nav-item">
                        <a href="{{ url('/admin') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-gear"></i>
                            <p>Admin</p>
                        </a>
                    </li> --}}
                    @can('view petugas')
                        <li class="nav-item">
                            <a href="{{ url('/admin/petugas') }}" class="nav-link">
                                <i class="nav-icon bi bi-person-badge"></i>
                                <p>Petugas</p>
                            </a>
                        </li>
                    @endrole

                    @can('view pendonor')
                        <li class="nav-item">
                            <a href="{{ route('admin.pendonor.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-people"></i>
                                <p>Pendonor</p>
                            </a>
                        </li>
                    @endrole

                    @can('view pasien')
                        <li class="nav-item">
                            <a href="{{ url('/admin/pasien') }}" class="nav-link">
                                <i class="nav-icon bi bi-hospital"></i>
                                <p>Pasien</p>
                            </a>
                        </li>
                        @endrole

                        <li class="nav-item">
                            <a href="{{ url('/admin/roles') }}" class="nav-link">
                                <i class="nav-icon bi bi-shield-lock"></i>
                                <p>Role</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/admin/permissions') }}" class="nav-link">
                                <i class="nav-icon bi bi-key"></i>
                                <p>Permission</p>
                            </a>
                        </li>
                    @endrole
                    {{-- ================= PETUGAS ================= --}}
                    @role('petugas')
                        <li class="nav-item">
                            <a href="{{ url('/stok-darah') }}" class="nav-link">
                                <i class="bi bi-droplet"></i>
                                <p>Stok Darah</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/permintaan-darah') }}" class="nav-link">
                                <i class="bi bi-file-medical"></i>
                                <p>Permintaan Darah</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/distribusi-darah') }}" class="nav-link">
                                <i class="bi bi-box-arrow-right"></i>
                                <p>Distribusi</p>
                            </a>
                        </li>
                    @endrole

                    {{-- ================= PENDONOR ================= --}}
                    @role('donor')
                        <li class="nav-item">
                            <a href="{{ url('/donor/profil') }}" class="nav-link">
                                <i class="nav-icon bi bi-person-circle"></i>
                                <p>Profil Donor</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/donor/jadwal') }}" class="nav-link">
                                <i class="nav-icon bi bi-calendar-event"></i>
                                <p>Jadwal Donor</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/donor/riwayat') }}" class="nav-link">
                                <i class="nav-icon bi bi-clock-history"></i>
                                <p>Riwayat Donor</p>
                            </a>
                        </li>
                    @endrole
                    {{-- ================= PASIEN / PEMOHON ================= --}}
                    @role('pemohon')
                        <li class="nav-item">
                            <a href="{{ url('/permintaan-saya') }}" class="nav-link">
                                <i class="bi bi-file-medical"></i>
                                <p>Permintaan Darah</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/status-permintaan') }}" class="nav-link">
                                <i class="bi bi-activity"></i>
                                <p>Status Permintaan</p>
                            </a>
                        </li>
                    @endrole

                </ul>

            </nav>
        </div>

    </aside>
