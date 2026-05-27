@extends('layouts.admin')

@section('title', 'Dashboard Pemohon')

@section('content')

    <div class="app-content">

        <div class="container-fluid">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

                <div>

                    <h3 class="fw-bold mb-1">

                        <i class="bi bi-heart-pulse-fill text-danger me-2"></i>

                        Dashboard Pemohon

                    </h3>

                    <p class="text-muted mb-0">

                        Selamat datang di sistem permintaan donor darah

                    </p>
                </div>
                <div>
                    <a href="{{ route('pemohon.permintaan-darah.create') }}"
                        class="btn text-white rounded-pill px-4 shadow-sm" style="background:#dc2626;">
                        <i class="bi bi-plus-circle-fill me-1"></i>
                        Ajukan Permintaan
                    </a>
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

                                    <p class="text-muted fw-medium mb-2">

                                        Total Permintaan

                                    </p>

                                    <h2 class="fw-bold mb-0 text-danger">

                                        {{ $totalPermintaan }}

                                    </h2>

                                </div>

                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:60px;height:60px;background:#fee2e2;">

                                    <i class="bi bi-droplet-fill text-danger fs-3"></i>

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

                                    <p class="text-muted fw-medium mb-2">

                                        Pending

                                    </p>

                                    <h2 class="fw-bold mb-0 text-warning">

                                        {{ $pending }}

                                    </h2>

                                </div>

                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:60px;height:60px;background:#fef3c7;">

                                    <i class="bi bi-hourglass-split text-warning fs-3"></i>

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

                                    <p class="text-muted fw-medium mb-2">

                                        Disetujui

                                    </p>

                                    <h2 class="fw-bold mb-0 text-success">

                                        {{ $disetujui }}

                                    </h2>

                                </div>

                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:60px;height:60px;background:#ECFDF3;">

                                    <i class="bi bi-check-circle-fill text-success fs-3"></i>

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

                                    <p class="text-muted fw-medium mb-2">

                                        Ditolak

                                    </p>

                                    <h2 class="fw-bold mb-0 text-danger">

                                        {{ $ditolak }}

                                    </h2>

                                </div>

                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:60px;height:60px;background:#fee2e2;">

                                    <i class="bi bi-x-circle-fill text-danger fs-3"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- TABLE --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                {{-- HEADER TABLE --}}
                <div class="card-header border-0 py-4 px-4" style="background:#f8fafc;">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                        <div>

                            <h5 class="fw-bold mb-1">

                                Permintaan Darah Terbaru

                            </h5>

                            <small class="text-muted">

                                Riwayat permintaan darah terbaru Anda

                            </small>

                        </div>

                        <div>

                            <span class="badge rounded-pill px-3 py-2" style="background:#fee2e2;color:#dc2626;">

                                {{ $permintaanTerbaru->count() }} Data

                            </span>

                        </div>

                    </div>

                </div>

                {{-- BODY TABLE --}}
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
                                        Jenis Kelamin
                                    </th>

                                    <th class="py-3 px-4">
                                        No HP
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
                                        Tanggal
                                    </th>

                                    <th class="py-3 px-4">
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($permintaanTerbaru as $item)
                                    <tr style="border-bottom:1px solid #e5e7eb;">

                                        <td class="text-center py-3 fw-semibold text-muted">

                                            {{ $loop->iteration }}

                                        </td>

                                        <td class="py-3 fw-semibold text-dark">

                                            {{ $item->nama_pasien }}

                                        </td>

                                        <td class="py-3 text-muted">

                                            {{ $item->jenis_kelamin }}

                                        </td>

                                        <td class="py-3 text-muted">

                                            {{ $item->no_hp }}

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

                                        <td class="py-3 text-muted">

                                            {{ \Carbon\Carbon::parse($item->tanggal_permintaan)->format('d M Y') }}

                                        </td>

                                        <td class="py-3">

                                            @if ($item->status == 'Pending')
                                                <span class="badge rounded-pill px-3 py-2 fw-medium"
                                                    style="background:#fef3c7;color:#92400e;">

                                                    Pending

                                                </span>
                                            @elseif ($item->status == 'Disetujui')
                                                <span class="badge rounded-pill px-3 py-2 fw-medium"
                                                    style="background:#ECFDF3;color:#027A48;">

                                                    Disetujui

                                                </span>
                                            @elseif ($item->status == 'Ditolak')
                                                <span class="badge rounded-pill px-3 py-2 fw-medium"
                                                    style="background:#fee2e2;color:#b91c1c;">

                                                    Ditolak

                                                </span>
                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="9" class="text-center py-5">

                                            <div class="d-flex flex-column align-items-center text-muted">

                                                <div class="rounded-circle d-flex align-items-center justify-content-center mb-3"
                                                    style="width:70px;height:70px;background:#f8fafc;">

                                                    <i class="bi bi-inbox fs-2"></i>

                                                </div>

                                                <h6 class="fw-bold mb-1">

                                                    Belum Ada Permintaan

                                                </h6>

                                                <small>

                                                    Data permintaan darah akan tampil di sini

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
