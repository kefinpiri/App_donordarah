@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold mb-1">
                    Data Pemohon Darah
                </h3>
                @can('create pasien')
                    <p class="text-muted mb-0">
                        Daftar data pasien / pemohon darah
                    </p>
                @endcan
            </div>

        </div>

        {{-- ALERT --}}
        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        {{-- CARD --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-light">

                            <tr class="text-center">

                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No HP</th>
                                <th>Golongan Darah</th>
                                <th>Jumlah</th>
                                <th>Rumah Sakit</th>
                                <th>Status</th>
                                <th>Keterangan</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($pasien as $item)
                                <tr>

                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->nama_pasien }}
                                    </td>

                                    <td>
                                        {{ $item->jenis_kelamin }}
                                    </td>

                                    <td>
                                        {{ $item->no_hp }}
                                    </td>

                                    <td class="text-center">

                                        <span class="badge bg-danger">

                                            {{ $item->golongan_darah }}

                                        </span>
                                    </td>

                                    <td class="text-center">

                                        {{ $item->jumlah_kantong }} Kantong

                                    </td>

                                    <td>

                                        {{ $item->rumah_sakit }}

                                    </td>

                                    <td class="text-center">

                                        @if ($item->status == 'pending')
                                            <span class="badge bg-secondary">
                                                Pending
                                            </span>
                                        @elseif($item->status == 'diproses')
                                            <span class="badge bg-warning">
                                                Diproses
                                            </span>
                                        @elseif($item->status == 'selesai')
                                            <span class="badge bg-success">
                                                Disetujui
                                            </span>
                                        @elseif($item->status == 'ditolak')
                                            <span class="badge bg-danger">
                                                Ditolak
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                {{ $item->status }}
                                            </span>
                                        @endif

                                    </td>
                                    <td>
                                        {{ $item->keterangan ?? '-' }}
                                    </td>
                                </tr>
                            @empty

                                <tr>

                                    <td colspan="9" class="text-center text-muted py-4">

                                        Data pasien belum tersedia

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    {{-- AUTO HIDE ALERT --}}
    <script>
        setTimeout(() => {

            let alert = document.getElementById('success-alert');

            if (alert) {

                alert.style.transition = "0.3s ease";
                alert.style.opacity = "0";
                alert.style.transform = "translateY(-10px)";

                setTimeout(() => {

                    alert.remove();

                }, 300);

            }

        }, 1800);
    </script>
@endsection
