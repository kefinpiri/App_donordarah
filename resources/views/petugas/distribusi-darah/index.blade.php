@extends('layouts.admin')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h3>
                    Data Distribusi Darah
                </h3>

                <a href="{{ route('petugas.distribusi-darah.create') }}" class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>
                    Tambah Distribusi

                </a>

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

                    <table class="table table-bordered table-striped">

                        <thead class="table-danger">

                            <tr>

                                <th>No</th>
                                <th>Pasien</th>
                                <th>Golongan Darah</th>
                                <th>Jumlah</th>
                                <th>Tanggal Distribusi</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th width="180">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($distribusiDarah as $item)
                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->permintaanDarah->nama_pasien ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $item->golongan_darah }}
                                    </td>

                                    <td>
                                        {{ $item->jumlah_kantong }}
                                    </td>

                                    <td>
                                        {{ $item->tanggal_distribusi }}
                                    </td>

                                    <td>

                                        @if ($item->status == 'Diproses')
                                            <span class="badge bg-warning">
                                                Diproses
                                            </span>
                                        @elseif($item->status == 'Dikirim')
                                            <span class="badge bg-primary">
                                                Dikirim
                                            </span>
                                        @elseif($item->status == 'Selesai')
                                            <span class="badge bg-success">
                                                Selesai
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                Ditolak
                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        {{ $item->catatan }}
                                    </td>

                                    <td>

                                        <a href="{{ route('petugas.distribusi-darah.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">

                                            Edit

                                        </a>

                                        <form action="{{ route('petugas.distribusi-darah.destroy', $item->id) }}"
                                            method="POST" class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus data?')">

                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center">

                                        Data distribusi darah belum tersedia

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
