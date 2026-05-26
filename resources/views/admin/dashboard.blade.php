@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">

        {{-- CHART JS --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <style>
            body {
                background: #f8fafc;
            }

            .dashboard-wrapper {
                background: #f8fafc;
            }

            /* HEADER */
            .dashboard-title {
                font-size: 2rem;
                font-weight: 800;
                color: #111827;
            }

            .dashboard-subtitle {
                color: #6b7280;
                font-size: .95rem;
            }

            .dashboard-badge {
                background: linear-gradient(135deg, #dc2626, #991b1b);
                color: white;
                padding: 10px 18px;
                border-radius: 14px;
                font-weight: 600;
                font-size: .9rem;
                box-shadow: 0 10px 25px rgba(220, 38, 38, 0.2);
            }

            /* CARD STAT */
            .stat-card {
                background: #ffffff;
                border-radius: 22px;
                padding: 22px;
                border: 1px solid #eef2f7;
                height: 100%;
                transition: .3s ease;
                box-shadow: 0 4px 18px rgba(15, 23, 42, 0.03);
            }

            .stat-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 12px 25px rgba(15, 23, 42, 0.06);
            }

            .stat-label {
                color: #6b7280;
                font-size: .85rem;
                font-weight: 600;
                margin-bottom: 10px;
            }

            .stat-value {
                font-size: 2rem;
                font-weight: 800;
                margin-bottom: 0;
            }

            .stat-icon {
                width: 65px;
                height: 65px;
                border-radius: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.8rem;
            }

            /* CHART CARD */
            .chart-card {
                background: #ffffff;
                border-radius: 22px;
                padding: 20px;
                border: 1px solid #eef2f7;
                box-shadow: 0 4px 18px rgba(15, 23, 42, 0.03);
                transition: .3s ease;
            }

            .chart-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 22px rgba(15, 23, 42, 0.06);
            }

            .chart-title {
                font-size: 1rem;
                font-weight: 700;
                color: #111827;
            }

            .chart-subtitle {
                font-size: .82rem;
                color: #6b7280;
            }

            /* TABLE */
            .table-card {
                background: #ffffff;
                border-radius: 22px;
                overflow: hidden;
                border: 1px solid #eef2f7;
                box-shadow: 0 4px 18px rgba(15, 23, 42, 0.03);
            }

            .table-header {
                padding: 18px 22px;
                border-bottom: 1px solid #f1f5f9;
                background: #ffffff;
            }

            .custom-table thead th {
                background: #fef2f2;
                color: #991b1b;
                font-size: .82rem;
                font-weight: 700;
                border: none;
                padding: 14px;
                white-space: nowrap;
            }

            .custom-table tbody td {
                padding: 14px;
                vertical-align: middle;
                border-color: #f1f5f9;
                font-size: .9rem;
            }

            .custom-table tbody tr:hover {
                background: #fffafa;
            }

            /* BADGE */
            .badge-soft-success {
                background: #dcfce7;
                color: #166534;
                padding: 7px 12px;
                border-radius: 999px;
                font-size: .72rem;
                font-weight: 700;
            }

            .badge-soft-warning {
                background: #fef3c7;
                color: #92400e;
                padding: 7px 12px;
                border-radius: 999px;
                font-size: .72rem;
                font-weight: 700;
            }

            .badge-soft-danger {
                background: #fee2e2;
                color: #991b1b;
                padding: 7px 12px;
                border-radius: 999px;
                font-size: .72rem;
                font-weight: 700;
            }

            .badge-soft-secondary {
                background: #e5e7eb;
                color: #374151;
                padding: 7px 12px;
                border-radius: 999px;
                font-size: .72rem;
                font-weight: 700;
            }

            /* RESPONSIVE */
            @media(max-width:768px) {
                .dashboard-title {
                    font-size: 1.5rem;
                }

                .stat-value {
                    font-size: 1.6rem;
                }

                .chart-card,
                .table-card,
                .stat-card {
                    border-radius: 18px;
                }
            }
        </style>

        <div class="dashboard-wrapper">

            {{-- HEADER --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

                <div>

                    <h2 class="dashboard-title mb-1">
                        Dashboard Admin
                    </h2>

                    <p class="dashboard-subtitle mb-0">
                        Selamat datang di sistem donor darah
                    </p>

                </div>

                <div class="mt-3 mt-md-0">

                    <div class="dashboard-badge">

                        <i class="bi bi-droplet-fill me-1"></i>

                        Sistem Donor Darah

                    </div>

                </div>

            </div>

            {{-- CARD STATISTIK --}}
            <div class="row g-4 mb-4">

                {{-- DONOR --}}
                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <div class="stat-label">
                                    Total Donor
                                </div>

                                <h2 class="stat-value text-danger">
                                    {{ $totalDonor }}
                                </h2>

                            </div>

                            <div class="stat-icon bg-danger-subtle text-danger">

                                <i class="bi bi-droplet-fill"></i>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- PERMINTAAN --}}
                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <div class="stat-label">
                                    Total Permintaan
                                </div>

                                <h2 class="stat-value text-primary">
                                    {{ $totalPermintaan }}
                                </h2>

                            </div>

                            <div class="stat-icon bg-primary-subtle text-primary">

                                <i class="bi bi-hospital-fill"></i>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- DISTRIBUSI --}}
                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <div class="stat-label">
                                    Total Distribusi
                                </div>

                                <h2 class="stat-value text-warning">
                                    {{ $totalDistribusi }}
                                </h2>

                            </div>

                            <div class="stat-icon bg-warning-subtle text-warning">

                                <i class="bi bi-truck"></i>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- PETUGAS --}}
                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <div class="stat-label">
                                    Total Petugas
                                </div>

                                <h2 class="stat-value text-success">
                                    {{ $totalPetugas }}
                                </h2>

                            </div>

                            <div class="stat-icon bg-success-subtle text-success">

                                <i class="bi bi-person-badge-fill"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- CHART --}}
            <div class="row g-4 mb-4">

                {{-- BAR CHART --}}
                <div class="col-lg-8">

                    <div class="chart-card">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>

                                <h5 class="chart-title mb-1">
                                    Statistik Sistem
                                </h5>

                                <p class="chart-subtitle mb-0">
                                    Monitoring data donor darah
                                </p>

                            </div>

                            <span class="badge text-bg-light border px-3 py-2">
                                Live Data
                            </span>

                        </div>

                        <div style="height:260px; position:relative;">

                            <canvas id="barChart"></canvas>

                        </div>

                    </div>

                </div>

                {{-- DONUT --}}
                <div class="col-lg-4">

                    <div class="chart-card h-100">

                        <div class="mb-3">

                            <h5 class="chart-title mb-1">
                                Persentase Sistem
                            </h5>

                            <p class="chart-subtitle mb-0">
                                Klik warna untuk melihat detail
                            </p>

                        </div>

                        <div style="height:260px; display:flex; align-items:center; justify-content:center;">

                            <canvas id="donutChart" style="max-width:220px; max-height:220px;"></canvas>

                        </div>

                    </div>

                </div>

            </div>

            {{-- TABLE --}}
            <div class="row g-4">

                {{-- DONOR TERBARU --}}
                <div class="col-lg-6">

                    <div class="table-card">

                        <div class="table-header">

                            <h5 class="fw-bold mb-0">
                                Donor Terbaru
                            </h5>

                        </div>

                        <div class="table-responsive">

                            <table class="table custom-table align-middle mb-0">

                                <thead>

                                    <tr>

                                        <th>No</th>

                                        <th>Tanggal</th>

                                        <th>Lokasi</th>

                                        <th>Status</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @forelse ($donorTerbaru as $item)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $item->tanggal_donor }}</td>

                                            <td>{{ $item->lokasi }}</td>

                                            <td>

                                                <span class="badge-soft-success">

                                                    {{ $item->status }}

                                                </span>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="4" class="text-center py-4 text-muted">

                                                Data belum tersedia

                                            </td>

                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                {{-- PERMINTAAN TERBARU --}}
                <div class="col-lg-6">

                    <div class="table-card">

                        <div class="table-header">

                            <h5 class="fw-bold mb-0">
                                Permintaan Darah Terbaru
                            </h5>

                        </div>

                        <div class="table-responsive">

                            <table class="table custom-table align-middle mb-0">

                                <thead>

                                    <tr>

                                        <th>No</th>

                                        <th>Nama Pasien</th>

                                        <th>Golongan</th>

                                        <th>Status</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @forelse ($permintaanTerbaru as $item)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $item->nama_pasien }}</td>

                                            <td>

                                                <span class="badge-soft-danger">

                                                    {{ $item->golongan_darah }}

                                                </span>

                                            </td>

                                            <td>

                                                @if ($item->status == 'Pending')
                                                    <span class="badge-soft-secondary">
                                                        Pending
                                                    </span>
                                                @elseif($item->status == 'Diproses')
                                                    <span class="badge-soft-warning">
                                                        Diproses
                                                    </span>
                                                @elseif($item->status == 'Disetujui')
                                                    <span class="badge-soft-success">
                                                        Disetujui
                                                    </span>
                                                @else
                                                    <span class="badge-soft-danger">
                                                        Ditolak
                                                    </span>
                                                @endif

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="4" class="text-center py-4 text-muted">

                                                Data belum tersedia

                                            </td>

                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- CHART SCRIPT --}}
    <script>
        // BAR CHART
        const barCtx = document.getElementById('barChart');

        new Chart(barCtx, {

            type: 'bar',

            data: {

                labels: [
                    'Donor',
                    'Permintaan',
                    'Distribusi',
                    'Petugas'
                ],

                datasets: [{

                    label: 'Jumlah',

                    data: [
                        {{ $totalDonor }},
                        {{ $totalPermintaan }},
                        {{ $totalDistribusi }},
                        {{ $totalPetugas }}
                    ],

                    backgroundColor: [
                        '#dc2626',
                        '#2563eb',
                        '#f59e0b',
                        '#16a34a'
                    ],

                    borderRadius: 10,
                    borderSkipped: false,
                    barThickness: 42
                }]
            },

            options: {

                responsive: true,
                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {

                        backgroundColor: '#111827',
                        padding: 12,
                        cornerRadius: 10,

                        callbacks: {

                            label: function(context) {

                                return context.raw + ' Data';

                            }

                        }

                    }

                },

                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {
                            stepSize: 1
                        },

                        grid: {
                            color: '#f1f5f9'
                        },

                        border: {
                            display: false
                        }

                    },

                    x: {

                        grid: {
                            display: false
                        },

                        border: {
                            display: false
                        }

                    }

                }

            }

        });

        // DONUT CHART
        const donutCtx = document.getElementById('donutChart');

        const donutChart = new Chart(donutCtx, {

            type: 'doughnut',

            data: {

                labels: [
                    'Donor',
                    'Permintaan',
                    'Distribusi',
                    'Petugas'
                ],

                datasets: [{

                    data: [
                        {{ $totalDonor }},
                        {{ $totalPermintaan }},
                        {{ $totalDistribusi }},
                        {{ $totalPetugas }}
                    ],

                    backgroundColor: [
                        '#dc2626',
                        '#2563eb',
                        '#f59e0b',
                        '#16a34a'
                    ],

                    borderWidth: 0,
                    hoverOffset: 8
                }]
            },

            options: {

                responsive: true,

                cutout: '72%',

                plugins: {

                    legend: {

                        position: 'bottom',

                        labels: {

                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 18,
                            font: {
                                size: 11
                            }

                        }

                    },

                    tooltip: {

                        backgroundColor: '#111827',
                        padding: 12,
                        cornerRadius: 10,

                        callbacks: {

                            label: function(context) {

                                return context.label + ': ' + context.raw + ' Data';

                            }

                        }

                    }

                },

                onClick: (e, elements) => {

                    if (elements.length > 0) {

                        const index = elements[0].index;

                        const label = donutChart.data.labels[index];

                        const value = donutChart.data.datasets[0].data[index];

                        alert(label + ' : ' + value + ' Data');

                    }

                }

            }

        });
    </script>
@endsection
