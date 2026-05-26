@extends('layouts.admin')

@section('title', 'Status Permintaan Darah')

@section('content')

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold text-danger">
                Status Permintaan Darah
            </h3>

            <a href="{{ route('pemohon.permintaan-darah.create') }}" class="btn btn-danger">

                + Ajukan Permintaan

            </a>

        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

            </div>
        @endif

        <div class="card shadow border-0 rounded-4">

            <div class="card-body table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-danger">

                        <tr>

                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>No Hp</th>
                            <th>Golongan</th>
                            <th>Jumlah</th>
                            <th>Rumah Sakit</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($permintaanDarah as $item)
                            <tr>

                                <td>
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

                                    @if ($item->status == 'Pending')
                                        <span class="badge bg-secondary">
                                            Pending
                                        </span>
                                    @elseif ($item->status == 'Diproses')
                                        <span class="badge bg-warning">
                                            Diproses
                                        </span>
                                    @elseif ($item->status == 'Disetujui')
                                        <span class="badge bg-info">
                                            Disetujui
                                        </span>
                                    @elseif ($item->status == 'Ditolak')
                                        <span class="badge bg-danger">
                                            Ditolak
                                        </span>
                                    @endif

                                </td>

                                <td>
                                    {{ $item->keterangan ?? '-' }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center text-muted">

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
