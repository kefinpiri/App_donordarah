@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- HEADER -->
        <div class="mb-4">

            <h3 class="fw-bold">
                Dashboard Donor
            </h3>

            <p class="text-muted">
                Selamat datang di sistem donor darah
            </p>

        </div>

        <!-- CARD -->
        <div class="row g-4">
            <!-- TOTAL DONOR -->
            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">
                                    Total Donor
                                </h6>

                                <h2 class="fw-bold text-danger">

                                    {{ $totalDonor }}

                                </h2>

                            </div>

                            <div>

                                <i class="bi bi-droplet-fill text-danger" style="font-size: 45px;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- MENUNGGU -->
            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">
                                    Menunggu
                                </h6>

                                <h2 class="fw-bold text-warning">

                                    {{ $menunggu }}

                                </h2>

                            </div>

                            <div>

                                <i class="bi bi-clock-history text-warning" style="font-size: 45px;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- DITERIMA -->
            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">
                                    Diterima
                                </h6>

                                <h2 class="fw-bold text-success">

                                    {{ $diterima }}

                                </h2>

                            </div>

                            <div>

                                <i class="bi bi-check-circle-fill text-success" style="font-size: 45px;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- DITOLAK -->
            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">
                                    Ditolak
                                </h6>

                                <h2 class="fw-bold text-danger">

                                    {{ $ditolak }}

                                </h2>

                            </div>

                            <div>

                                <i class="bi bi-x-circle-fill text-danger" style="font-size: 45px;">
                                </i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
