@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h3 class="fw-bold mb-1">
                    Assign Permission
                </h3>

                <p class="text-muted mb-0">
                    Kelola permission untuk role
                    {{ $role->name }}
                </p>

            </div>

            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary rounded-3">

                Kembali

            </a>

        </div>

        {{-- CARD --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white py-3">

                <h5 class="mb-0 fw-semibold">

                    Role :
                    {{ $role->name }}

                </h5>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.roles.permission.store', $role->id) }}" method="POST">

                    @csrf

                    <div class="row">

                        @forelse ($permissions as $permission)
                            <div class="col-12 col-md-4 mb-3">

                                <div class="form-check">

                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                        class="form-check-input"
                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>

                                    <label class="form-check-label">

                                        {{ $permission->name }}

                                    </label>

                                </div>

                            </div>

                        @empty

                            <div class="col-12">

                                <div class="alert alert-danger rounded-3">

                                    Permission belum tersedia

                                </div>

                            </div>
                        @endforelse

                    </div>

                    <button type="submit" class="btn btn-primary rounded-3 mt-3">

                        Simpan Permission

                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection
