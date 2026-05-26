@extends('layouts.admin')

@section('title', 'Laporan Permintaan Darah')

@section('content')

    {{-- HEADER --}}
    <div class="app-content-header">

        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h3 class="fw-bold mb-1">

                        <i class="bi bi-file-earmark-text-fill text-primary me-2"></i>

                        Laporan Permintaan Darah

                    </h3>

                    <p class="text-muted mb-0">

                        Data laporan permintaan darah sistem

                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="app-content">

        <div class="container-fluid">

            {{-- FILTER --}}
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body">

                    <form method="GET" action="{{ route('petugas.laporan') }}">

                        <div class="row g-3 align-items-end">

                            {{-- TANGGAL AWAL --}}
                            <div class="col-md-4">

                                <label class="form-label fw-medium">

                                    Tanggal Awal

                                </label>

                                <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}"
                                    class="form-control rounded-3">

                            </div>

                            {{-- TANGGAL AKHIR --}}
                            <div class="col-md-4">

                                <label class="form-label fw-medium">

                                    Tanggal Akhir

                                </label>

                                <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}"
                                    class="form-control rounded-3">

                            </div>

                            {{-- BUTTON --}}
                            <div class="col-md-4">

                                <button type="submit" class="btn text-white rounded-pill px-4 shadow-sm"
                                    style="background:#2563eb;">

                                    <i class="bi bi-search me-1"></i>

                                    Filter

                                </button>

                                <a href="{{ route('petugas.laporan') }}" class="btn btn-light rounded-pill px-4 shadow-sm">

                                    <i class="bi bi-arrow-clockwise me-1"></i>

                                    Reset

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            {{-- CARD STATISTIK --}}
            <div class="row g-4 mb-4">

                {{-- TOTAL --}}
                <div class="col-xl-3 col-md-6">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        <div class="card-body p-4">

                            <div class="d-flex justify-content-between align-items-start">

                                <div>

                                    <p class="text-muted mb-2 fw-medium">

                                        Total Permintaan

                                    </p>

                                    <h2 class="fw-bold mb-0">

                                        {{ $totalPermintaan }}

                                    </h2>

                                </div>

                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:58px;height:58px;background:#eff6ff;">

                                    <i class="bi bi-clipboard2-pulse-fill text-primary fs-4"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- PENDING --}}
                <div class="col-xl-3 col-md-6">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        <div class="card-body p-4">

                            <div class="d-flex justify-content-between align-items-start">

                                <div>

                                    <p class="text-muted mb-2 fw-medium">

                                        Pending

                                    </p>

                                    <h2 class="fw-bold mb-0">

                                        {{ $pending }}

                                    </h2>

                                </div>

                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:58px;height:58px;background:#fef3c7;">

                                    <i class="bi bi-hourglass-split text-warning fs-4"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- DISETUJUI --}}
                <div class="col-xl-3 col-md-6">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        <div class="card-body p-4">

                            <div class="d-flex justify-content-between align-items-start">

                                <div>

                                    <p class="text-muted mb-2 fw-medium">

                                        Disetujui

                                    </p>

                                    <h2 class="fw-bold mb-0">

                                        {{ $disetujui }}

                                    </h2>

                                </div>

                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:58px;height:58px;background:#ECFDF3;">

                                    <i class="bi bi-check-circle-fill text-success fs-4"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- DITOLAK --}}
                <div class="col-xl-3 col-md-6">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        <div class="card-body p-4">

                            <div class="d-flex justify-content-between align-items-start">

                                <div>

                                    <p class="text-muted mb-2 fw-medium">

                                        Ditolak

                                    </p>

                                    <h2 class="fw-bold mb-0">

                                        {{ $ditolak }}

                                    </h2>

                                </div>

                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:58px;height:58px;background:#fee2e2;">

                                    <i class="bi bi-x-circle-fill text-danger fs-4"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- TABLE --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="card-header border-0 py-3 px-4" style="background:#f8fafc;">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                        <div>

                            <h5 class="fw-bold mb-1">

                                Data Laporan

                            </h5>

                            <small class="text-muted">

                                Daftar laporan permintaan darah

                            </small>

                        </div>

                        {{-- BUTTON EXPORT PDF --}}
                        <div>
                            <a href="{{ route('petugas.export.pdf') }}" class="btn btn-danger rounded-pill px-4 shadow-sm">
                                <i class="bi bi-file-earmark-pdf me-1"></i>
                                Export PDF
                            </a>
                            <a
                                href="{{ route('petugas.export.excel') }}"class="btn btn-success rounded-pill px-4 shadow-sm"><i
                                    class="bi bi-file-earmark-excel me-1"></i>
                                Export Excel
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <thead style="background:#f8fafc;">

                                <tr style="border-bottom:2px solid #e5e7eb;">

                                    <th class="py-3 px-4 text-center">
                                        No
                                    </th>

                                    <th class="py-3 px-4">
                                        Nama Pasien
                                    </th>

                                    <th class="py-3 px-4">
                                        Golongan
                                    </th>

                                    <th class="py-3 px-4">
                                        Jumlah
                                    </th>

                                    <th class="py-3 px-4">
                                        Rumah Sakit
                                    </th>

                                    <th class="py-3 px-4">
                                        Status
                                    </th>

                                    <th class="py-3 px-4">
                                        Tanggal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($laporan as $item)
                                    <tr style="border-bottom:1px solid #e5e7eb;">

                                        <td class="text-center py-3 text-muted fw-semibold">

                                            {{ $loop->iteration }}

                                        </td>

                                        <td class="py-3">

                                            <div class="d-flex align-items-center gap-3">

                                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width:42px;height:42px;background:#eff6ff;">

                                                    <i class="bi bi-person-fill text-primary"></i>

                                                </div>

                                                <div>

                                                    <div class="fw-semibold text-dark">

                                                        {{ $item->nama_pasien }}

                                                    </div>

                                                    <small class="text-muted">

                                                        {{ $item->jenis_kelamin }}

                                                    </small>

                                                </div>

                                            </div>

                                        </td>

                                        <td class="py-3">

                                            <span class="badge rounded-pill px-3 py-2 fw-medium"
                                                style="background:#fee2e2;color:#dc2626;">

                                                {{ $item->golongan_darah }}

                                            </span>

                                        </td>

                                        <td class="py-3 text-muted">

                                            {{ $item->jumlah_kantong }} Kantong

                                        </td>

                                        <td class="py-3 text-muted">

                                            {{ $item->rumah_sakit }}

                                        </td>

                                        <td class="py-3">

                                            @if ($item->status == 'pending')
                                                <span class="badge rounded-pill px-3 py-2 fw-medium"
                                                    style="background:#fef3c7;color:#92400e;">

                                                    Pending

                                                </span>
                                            @elseif ($item->status == 'disetujui')
                                                <span class="badge rounded-pill px-3 py-2 fw-medium"
                                                    style="background:#ECFDF3;color:#027A48;">

                                                    Disetujui

                                                </span>
                                            @elseif ($item->status == 'ditolak')
                                                <span class="badge rounded-pill px-3 py-2 fw-medium"
                                                    style="background:#fee2e2;color:#b91c1c;">

                                                    Ditolak

                                                </span>
                                            @endif

                                        </td>

                                        <td class="py-3 text-muted">

                                            {{ $item->tanggal_permintaan }}

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7" class="text-center py-5">

                                            <div class="d-flex flex-column align-items-center text-muted">

                                                <div class="rounded-circle d-flex align-items-center justify-content-center mb-3"
                                                    style="width:70px;height:70px;background:#f8fafc;">

                                                    <i class="bi bi-file-earmark-x fs-2"></i>

                                                </div>

                                                <h6 class="fw-bold mb-1">

                                                    Data Laporan Belum Ada

                                                </h6>

                                                <small>

                                                    Laporan permintaan darah akan tampil di sini

                                                </small>

                                            </div>

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

@endsection
