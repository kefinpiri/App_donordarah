@extends('layouts.admin')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="mb-0">Data Stok Darah</h3>

                <a href="{{ route('petugas.stok-darah.create') }}" class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>
                    Tambah Data

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

                    <table class="table table-bordered table-striped align-middle">

                        <thead class="table-dark">

                            <tr>
                                <th>No</th>
                                <th>Golongan Darah</th>
                                <th>Jumlah Kantong</th>
                                <th>Tanggal Donor</th>
                                <th>Tanggal Kedaluwarsa</th>
                                <th>Keterangan</th>
                                <th width="150">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($stokDarah as $item)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $item->golongan_darah }}</td>

                                    <td>{{ $item->jumlah_kantong }}</td>

                                    <td>{{ $item->tanggal_donor }}</td>

                                    <td>{{ $item->tanggal_kedaluwarsa }}</td>

                                    <td>{{ $item->keterangan }}</td>

                                    <td>

                                        <a href="{{ route('petugas.stok-darah.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">

                                            Edit

                                        </a>

                                        <form action="{{ route('petugas.stok-darah.destroy', $item->id) }}" method="POST"
                                            class="d-inline">

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

                                    <td colspan="7" class="text-center">
                                        Data stok darah belum tersedia
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
