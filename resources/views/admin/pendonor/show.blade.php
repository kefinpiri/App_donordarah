@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">

        {{-- HEADER --}}
        <div class="mb-4">

            <h2 class="fw-bold text-dark mb-1">
                <i class="bi bi-droplet-fill text-danger me-2"></i>
                Detail Pengajuan Donor
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap pengajuan donor darah.
            </p>

        </div>

        {{-- CARD --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <div class="row g-4">

                    {{-- NAMA USER --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Donor
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">

                            {{ $pendonor->user->name ?? '-' }}

                        </div>

                    </div>

                    {{-- EMAIL --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">

                            {{ $pendonor->user->email ?? '-' }}

                        </div>

                    </div>

                    {{-- TANGGAL DONOR --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Tanggal Donor
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">

                            {{ $pendonor->tanggal_donor }}

                        </div>

                    </div>

                    {{-- LOKASI --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Lokasi Donor
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">

                            {{ $pendonor->lokasi }}

                        </div>

                    </div>

                    {{-- STATUS --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Status Donor
                        </label>

                        <div class="py-2">

                            @if ($pendonor->status == 'Menunggu')
                                <span class="badge bg-warning px-3 py-2">
                                    {{ $pendonor->status }}
                                </span>
                            @elseif ($pendonor->status == 'Diterima')
                                <span class="badge bg-primary px-3 py-2">
                                    {{ $pendonor->status }}
                                </span>
                            @elseif ($pendonor->status == 'Selesai')
                                <span class="badge bg-success px-3 py-2">
                                    {{ $pendonor->status }}
                                </span>
                            @else
                                <span class="badge bg-danger px-3 py-2">
                                    {{ $pendonor->status }}
                                </span>
                            @endif

                        </div>

                    </div>

                    {{-- CATATAN --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Catatan
                        </label>

                        <div class="form-control bg-light rounded-3 py-3" style="min-height:120px;">

                            {{ $pendonor->catatan ?? '-' }}

                        </div>

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="mt-4">

                    <a href="{{ route('admin.pendonor.index') }}" class="btn btn-secondary rounded-3 px-4">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>
@endsection
