@extends('layouts.admin')

@section('content')
    <div class="app-content-header">

        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="mb-3">
                    Data Permintaan Darah
                </h3>

            </div>

        </div>

    </div>

    <div class="app-content">

        <div class="container-fluid">

            @if (session('success'))
                <div class="alert alert-success">

                    {{ session('success') }}

                </div>
            @endif

            <div class="card shadow-sm">

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-striped align-middle">

                        <thead class="table-danger">

                            <tr>

                                <th>No</th>

                                <th>Nama Pasien</th>

                                <th>Golongan Darah</th>

                                <th>Jumlah Kantong</th>

                                <th>Rumah Sakit</th>

                                <th>Tanggal Permintaan</th>

                                <th>Status</th>

                                <th>Keterangan</th>

                                <th width="120">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($permintaanDarah as $item)
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

                                        @if ($item->status == 'Pending')
                                            <span class="badge bg-secondary">

                                                Pending

                                            </span>
                                        @elseif($item->status == 'Diproses')
                                            <span class="badge bg-warning">

                                                Diproses

                                            </span>
                                        @elseif($item->status == 'Disetujui')
                                            <span class="badge bg-success">

                                                Disetujui

                                            </span>
                                        @else
                                            <span class="badge bg-danger">

                                                Ditolak

                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        {{ $item->keterangan }}
                                    </td>

                                    <td>

                                        <a href="{{ route('petugas.permintaan-darah.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">

                                            Validasi

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="9" class="text-center">

                                        Data permintaan darah belum tersedia

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
@endsection
