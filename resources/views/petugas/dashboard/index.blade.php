@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- HEADER -->
        <div class="mb-4">

            <h3 class="fw-bold">
                Dashboard Petugas
            </h3>

            <p class="text-muted">
                Selamat datang di sistem donor darah
            </p>

        </div>

        <!-- CARD DASHBOARD -->
        <div class="row g-4">

            <!-- TOTAL STOK DARAH -->
            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">
                                    Total Stok Darah
                                </h6>

                                <h2 class="fw-bold text-danger">

                                    {{ $totalStokDarah }}

                                </h2>

                                <small>
                                    Kantong darah tersedia
                                </small>

                            </div>

                            <div>

                                <i class="bi bi-droplet-fill
                                text-danger"
                                    style="font-size: 45px;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- PERMINTAAN DARAH -->
            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">
                                    Permintaan Darah
                                </h6>

                                <h2 class="fw-bold text-primary">

                                    {{ $totalPermintaanDarah }}

                                </h2>

                                <small>
                                    Total permintaan darah
                                </small>

                            </div>

                            <div>

                                <i class="bi bi-file-medical-fill
                                text-primary"
                                    style="font-size: 45px;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- DISTRIBUSI DARAH -->
            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">
                                    Distribusi Darah
                                </h6>

                                <h2 class="fw-bold text-success">

                                    {{ $totalDistribusiDarah }}

                                </h2>

                                <small>
                                    Total distribusi darah
                                </small>
                            </div>
                            <div>

                                <i class="bi bi-truck
                                text-success"
                                    style="font-size: 45px;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- TOTAL DONOR -->
            <div class="col-lg-6 col-md-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">
                                    Total Donor
                                </h6>

                                <h2 class="fw-bold text-warning">

                                    {{ $totalDonorDarah }}

                                </h2>

                                <small>
                                    Total pengajuan donor
                                </small>

                            </div>

                            <div>

                                <i class="bi bi-person-heart
                                text-warning"
                                    style="font-size: 45px;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- DONOR MENUNGGU -->
            <div class="col-lg-6 col-md-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">
                                    Donor Menunggu
                                </h6>

                                <h2 class="fw-bold text-danger">

                                    {{ $donorMenunggu }}

                                </h2>

                                <small>
                                    Menunggu validasi petugas
                                </small>

                            </div>

                            <div>

                                <i class="bi bi-clock-history
                                text-danger"
                                    style="font-size: 45px;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
