@extends('layouts.admin')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h3 class="mb-1 fw-bold">
                        <i class="bi bi-droplet-fill text-danger me-2"></i>
                        Data Donor Darah
                    </h3>

                    <p class="text-muted mb-0">
                        Monitoring seluruh pengajuan donor darah
                    </p>
                </div>

            </div>

        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            {{-- ALERT --}}
            @if (session('success'))
                <div class="alert alert-dismissible fade show border-0 rounded-3 mb-4 d-flex align-items-center gap-2"
                    style="background:#EAF3DE; color:#3B6D11;">

                    <i class="bi bi-check-circle-fill"></i>

                    {{ session('success') }}

                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>

                </div>
            @endif

            {{-- CARD --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="card-body p-4">

                    {{-- SEARCH --}}
                    <form action="" method="GET" class="mb-4">

                        <div class="row g-2">

                            <div class="col-md-5">

                                <div class="input-group">

                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="bi bi-search text-muted"></i>
                                    </span>

                                    <input type="text" name="search" class="form-control border-start-0 ps-0"
                                        placeholder="Cari lokasi donor..." value="{{ request('search') }}">

                                </div>

                            </div>

                            <div class="col-md-2">

                                <button class="btn w-100 text-white fw-medium" style="background-color:#b91c1c;">

                                    <i class="bi bi-search me-1"></i>
                                    Cari

                                </button>

                            </div>

                            @if (request('search'))
                                <div class="col-md-2">

                                    <a href="{{ route('admin.pendonor.index') }}" class="btn btn-outline-secondary w-100">

                                        <i class="bi bi-arrow-clockwise me-1"></i>
                                        Reset

                                    </a>

                                </div>
                            @endif

                        </div>

                    </form>

                    {{-- TABLE --}}
                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <thead style="background:#f9fafb;">

                                <tr style="border-bottom:2px solid #e5e7eb;">

                                    <th class="text-center py-3 fw-semibold text-secondary">
                                        No
                                    </th>

                                    <th class="py-3 fw-semibold text-secondary">
                                        Tanggal Donor
                                    </th>

                                    <th class="py-3 fw-semibold text-secondary">
                                        Lokasi
                                    </th>

                                    <th class="py-3 fw-semibold text-secondary">
                                        Status
                                    </th>

                                    <th class="py-3 fw-semibold text-secondary">
                                        Catatan
                                    </th>

                                    <th class="text-center py-3 fw-semibold text-secondary">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($pendonors as $item)
                                    <tr style="border-bottom:1px solid #e5e7eb;">

                                        {{-- NO --}}
                                        <td class="text-center py-3 text-muted fw-semibold">
                                            {{ $loop->iteration }}
                                        </td>

                                        {{-- TANGGAL --}}
                                        <td class="py-3">

                                            <div class="d-flex align-items-center gap-2">

                                                <i class="bi bi-calendar3 text-danger"></i>

                                                <span>
                                                    {{ \Carbon\Carbon::parse($item->tanggal_donor)->format('d M Y') }}
                                                </span>

                                            </div>

                                        </td>

                                        {{-- LOKASI --}}
                                        <td class="py-3">

                                            <div class="d-flex align-items-center gap-2">

                                                <i class="bi bi-geo-alt-fill text-danger"></i>

                                                <span>
                                                    {{ $item->lokasi }}
                                                </span>

                                            </div>

                                        </td>

                                        {{-- STATUS --}}
                                        <td class="py-3">

                                            @if ($item->status == 'Menunggu')
                                                <span class="badge rounded-pill px-3 py-2"
                                                    style="background:#FEF3C7;color:#92400E;">

                                                    Menunggu

                                                </span>
                                            @elseif ($item->status == 'Diterima')
                                                <span class="badge rounded-pill px-3 py-2"
                                                    style="background:#DBEAFE;color:#1D4ED8;">

                                                    Diterima

                                                </span>
                                            @elseif ($item->status == 'Selesai')
                                                <span class="badge rounded-pill px-3 py-2"
                                                    style="background:#DCFCE7;color:#166534;">

                                                    Selesai

                                                </span>
                                            @else
                                                <span class="badge rounded-pill px-3 py-2"
                                                    style="background:#FEE2E2;color:#991B1B;">

                                                    {{ $item->status }}

                                                </span>
                                            @endif

                                        </td>

                                        {{-- CATATAN --}}
                                        <td class="py-3 text-muted">
                                            {{ $item->catatan ?? '-' }}
                                        </td>

                                        {{-- AKSI --}}
                                        <td class="text-center py-3">

                                            <a href="{{ route('admin.pendonor.show', $item->id) }}"
                                                class="btn btn-sm rounded-pill px-3"
                                                style="background:#b91c1c;color:white;">

                                                <i class="bi bi-eye"></i>
                                                Detail

                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6" class="text-center py-5 text-muted">

                                            <i class="bi bi-droplet fs-3 d-block mb-2 text-danger"></i>

                                            Data donor belum tersedia

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                {{-- FOOTER --}}
                @if ($pendonors->count() > 0)
                    <div class="card-footer border-0 px-4 py-3" style="background:#f9fafb;">

                        <span class="text-muted small">

                            <i class="bi bi-info-circle me-1"></i>

                            Total donor:
                            <strong style="color:#b91c1c;">
                                {{ $pendonors->count() }}
                            </strong>

                        </span>

                    </div>
                @endif

            </div>

        </div>
    </div>
@endsection
