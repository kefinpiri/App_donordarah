@extends('layouts.admin')

@section('content')
    {{-- ── Content Header ── --}}
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        <i class="bi bi-people-fill text-danger me-2"></i>
                        Data Pendonor
                    </h3>
                    <small class="text-muted">Kelola seluruh data pendonor darah</small>
                </div>
                @can('create pendonor')
                    <div class="col-sm-6 text-end mt-2 mt-sm-0">
                        <a href="{{ route('admin.pendonor.create') }}" class="btn btn-danger">
                            <i class="bi bi-plus-circle me-1"></i>
                            Tambah Pendonor
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
    {{-- Alert Success --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <span>{{ session('success') }}</span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Summary Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-3 bg-danger bg-opacity-10 p-3">
                        <i class="bi bi-people-fill text-danger fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-4 lh-1">{{ $pendonors->count() }}</div>
                        <small class="text-muted">Total Pendonor</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-3 bg-primary bg-opacity-10 p-3">
                        <i class="bi bi-gender-male text-primary fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-4 lh-1">
                            {{ $pendonors->where('jenis_kelamin', 'laki-laki')->count() }}
                        </div>
                        <small class="text-muted">laki-laki</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-3 bg-pink bg-opacity-10 p-3" style="background-color:#fce4ec!important">
                        <i class="bi bi-gender-female fs-4" style="color:#e91e63"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-4 lh-1">
                            {{ $pendonors->where('jenis_kelamin', 'perempuan')->count() }}
                        </div>
                        <small class="text-muted">Perempuan</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-3 bg-success bg-opacity-10 p-3">
                        <i class="bi bi-droplet-half text-success fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-4 lh-1">
                            {{ $pendonors->unique('golongan_darah')->count() }}
                        </div>
                        <small class="text-muted">Jenis Darah</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Card --}}
    <div class="card shadow-sm border-0">

        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2 py-3">
            <h5 class="card-title mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-table text-danger"></i>
                Daftar Pendonor
            </h5>
            <span class="badge bg-danger rounded-pill">
                {{ $pendonors->count() }} data
            </span>
        </div>

        <div class="card-body">

            {{-- Search --}}
            <form action="" method="GET" class="mb-4">
                <div class="row g-2 align-items-end">
                    <div class="col-12 col-md-5">
                        <label class="form-label fw-semibold mb-1 small text-muted">Cari Pendonor</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-start-0 ps-0"
                                placeholder="Nama pendonor..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <button class="btn btn-danger w-100">
                            <i class="bi bi-search me-1"></i> Cari
                        </button>
                    </div>
                    @if (request('search'))
                        <div class="col-6 col-md-2">
                            <a href="{{ route('admin.pendonor.index') }}" class="btn btn-outline-secondary w-100">
                                <i class="bi bi-x-circle me-1"></i> Reset
                            </a>
                        </div>
                    @endif
                </div>
            </form>

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr class="table-danger">
                            <th class="text-center" width="5%">No</th>
                            <th>Nama Pendonor</th>
                            <th class="text-center">Gol. Darah</th>
                            <th class="text-center">Rhesus</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th class="text-center" width="16%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pendonors as $item)
                            <tr>
                                <td class="text-center fw-semibold text-muted">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-danger bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0"
                                            style="width:36px;height:36px">
                                            <i class="bi bi-person-fill text-danger"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $item->nama }}</div>
                                            <small class="text-muted">
                                                <i class="bi bi-{{ $item->jenis_kelamin == 'Laki-laki' ? 'gender-male text-primary' : 'gender-female' }} me-1"
                                                    style="{{ $item->jenis_kelamin != 'Laki-laki' ? 'color:#e91e63' : '' }}"></i>
                                                {{ $item->jenis_kelamin }}
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <span class="badge bg-danger rounded-pill px-3 fs-6 fw-bold">
                                        {{ $item->golongan_darah }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    @if ($item->rhesus == '+')
                                        <span class="badge bg-success rounded-pill px-2">
                                            <i class="bi bi-plus-circle me-1"></i>Positif
                                        </span>
                                    @else
                                        <span class="badge bg-secondary rounded-pill px-2">
                                            <i class="bi bi-dash-circle me-1"></i>Negatif
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="tel:{{ $item->no_hp }}"
                                        class="text-decoration-none text-body d-flex align-items-center gap-1">
                                        <i class="bi bi-telephone-fill text-success small"></i>
                                        {{ $item->no_hp }}
                                    </a>
                                </td>

                                <td>
                                    <span class="d-inline-block text-truncate" style="max-width:160px"
                                        title="{{ $item->alamat }}">
                                        <i class="bi bi-geo-alt text-muted me-1"></i>
                                        {{ $item->alamat }}
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center gap-1 flex-wrap">

                                        <a href="{{ route('admin.pendonor.show', $item->id) }}"
                                            class="btn btn-info btn-sm" title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        @can('edit pendonor')
                                            <a href="{{ route('admin.pendonor.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm" title="Edit Data">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        @endcan
                                        @can('delete pendonor')
                                            <form action="{{ route('admin.pendonor.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data"
                                                    onclick="return confirm('Yakin ingin menghapus data pendonor ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="d-flex flex-column align-items-center gap-2 text-muted">
                                        <i class="bi bi-inbox fs-1 text-secondary opacity-50"></i>
                                        <span class="fw-semibold">Data pendonor belum tersedia</span>
                                        <a href="{{ route('admin.pendonor.create') }}"
                                            class="btn btn-sm btn-danger mt-1">
                                            <i class="bi bi-plus-circle me-1"></i> Tambah Pendonor
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
            {{-- end table-responsive --}}

        </div>
        {{-- end card-body --}}

        @if ($pendonors->count() > 0)
            <div class="card-footer bg-transparent text-muted small">
                <i class="bi bi-info-circle me-1"></i>
                Menampilkan <strong>{{ $pendonors->count() }}</strong> data pendonor
            </div>
        @endif

    </div>
    {{-- end card --}}

    </div>
    </div>
@endsection
