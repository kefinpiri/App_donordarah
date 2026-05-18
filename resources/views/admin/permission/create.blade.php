@extends('layouts.admin')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">
            <h3>Tambah Permission</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.permissions.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Permission</label>

                            <input type="text" name="name" class="form-control" placeholder="Masukkan Permission">

                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
