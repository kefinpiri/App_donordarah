@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold">
                    Data Role
                </h3>

                <p class="text-muted mb-0">
                    Kelola role user sistem
                </p>

            </div>

            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary rounded-3">

                Tambah Role

            </a>

        </div>

        {{-- ALERT SUCCESS --}}
        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show rounded-3">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        {{-- CARD --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered align-middle">

                        <thead class="table-light">

                            <tr>

                                <th width="80">
                                    No
                                </th>

                                <th>
                                    Nama Role
                                </th>

                                <th width="300">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($roles as $item)
                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $item->name }}
                                    </td>

                                    <td>

                                        {{-- PERMISSION --}}
                                        <a href="{{ route('admin.roles.permission', $item->id) }}"
                                            class="btn btn-info btn-sm rounded-3">

                                            Permission

                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.roles.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm rounded-3">

                                            Edit

                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('admin.roles.destroy', $item->id) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm rounded-3"
                                                onclick="return confirm('Yakin hapus role?')">

                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="3" class="text-center text-muted py-4">

                                        Data role belum ada

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

                alert.style.transition = "0.3s";
                alert.style.opacity = "0";

                setTimeout(() => {

                    alert.remove();

                }, 300);

            }

        }, 2000);
    </script>
@endsection
