@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Data Petugas</h3>
            @can('create petugas')
                <a href="{{ route('admin.petugas.create') }}" class="btn btn-primary">
                    Tambah Petugas
                </a>
            @endcan
        </div>

        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($petugas as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nama }}</td>

                                <td>{{ $item->jenis_kelamin }}</td>

                                <td>{{ $item->no_hp }}</td>

                                <td>{{ $item->alamat }}</td>

                                <td>
                                    @can('edit petugas')
                                        <a href="{{ route('admin.petugas.edit', $item->id) }}" class="btn btn-warning btn-sm">

                                            Edit

                                        </a>
                                    @endcan

                                    {{-- user role permisson  --}}
                                    @can('delete petugas')
                                        <form action="{{ route('admin.petugas.destroy', $item->id) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus data?')">

                                                Hapus

                                            </button>
                                        </form>
                                    @endcan
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center">
                                    Data petugas belum ada
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>
    </div>
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
