@extends('layouts.admin')

@section('title', 'Dashboard Pemohon')

@section('content')

    <div class="container py-4">

        <!-- Header -->
        <div class="mb-4">

            <h3 class="fw-bold text-danger">
                Dashboard Pemohon
            </h3>

            <p class="text-muted mb-0">
                Selamat datang di sistem permintaan donor darah
            </p>

        </div>

        <!-- Statistik -->
        <div class="row g-4 mb-4">

            <!-- Total Permintaan -->
            <div class="col-md-3">

                <div class="card shadow border-0 rounded-4 h-100">

                    <div class="card-body">

                        <h6 class="text-muted">
                            Total Permintaan
                        </h6>

                        <h2 class="fw-bold text-danger">
                            {{ $totalPermintaan }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- Pending -->
            <div class="col-md-3">

                <div class="card shadow border-0 rounded-4 h-100">

                    <div class="card-body">

                        <h6 class="text-muted">
                            Pending
                        </h6>

                        <h2 class="fw-bold text-secondary">
                            {{ $pending }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- Disetujui -->
            <div class="col-md-3">

                <div class="card shadow border-0 rounded-4 h-100">

                    <div class="card-body">

                        <h6 class="text-muted">
                            Disetujui
                        </h6>

                        <h2 class="fw-bold text-success">
                            {{ $disetujui }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- Ditolak -->
            <div class="col-md-3">

                <div class="card shadow border-0 rounded-4 h-100">

                    <div class="card-body">

                        <h6 class="text-muted">
                            Ditolak
                        </h6>

                        <h2 class="fw-bold text-danger">
                            {{ $ditolak }}
                        </h2>

                    </div>

                </div>

            </div>

        </div>

        <!-- Tabel Permintaan Terbaru -->
        <div class="card shadow border-0 rounded-4">

            <div class="card-header bg-danger text-white rounded-top-4">

                <h5 class="mb-0">
                    Permintaan Darah Terbaru
                </h5>

            </div>

            <div class="card-body table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-danger">

                        <tr>

                            <th>No</th>

                            <th>Nama Pasien</th>

                            <th>Golongan</th>

                            <th>Jumlah</th>

                            <th>Rumah Sakit</th>

                            <th>Tanggal</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($permintaanTerbaru as $item)
                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->nama_pasien }}
                                </td>

                                <td>
                                    {{ $item->golongan_darah }}
                                </td>

                                <td>
                                    {{ $item->jumlah_kantong }}
                                </td>

                                <td>
                                    {{ $item->rumah_sakit }}
                                </td>

                                <td>
                                    {{ $item->tanggal_permintaan }}
                                </td>

                                <td>

                                    @if ($item->status == 'pending')
                                        <span class="badge bg-secondary">
                                            Pending
                                        </span>
                                    @elseif ($item->status == 'disetujui')
                                        <span class="badge bg-success">
                                            Disetujui
                                        </span>
                                    @elseif ($item->status == 'ditolak')
                                        <span class="badge bg-danger">
                                            Ditolak
                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center text-muted">

                                    Belum ada permintaan darah

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>
@endsection
