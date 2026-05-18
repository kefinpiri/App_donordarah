@extends('layouts.admin')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Role</h3>
                </div>

                <div class="col-sm-6 text-end">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card shadow-sm border-0">

                <div class="card-header">
                    <h5 class="card-title mb-0">
                        Form Edit Role
                    </h5>
                </div>

                <a href="{{ route('admin.roles.edit', $role->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">
                                Nama Role
                            </label>

                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $role->name) }}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                            Update
                        </button>
                    </div>

                    </form>

            </div>

        </div>
    </div>
@endsection
