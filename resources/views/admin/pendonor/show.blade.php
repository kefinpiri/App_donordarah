@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">

        {{-- HEADER --}}
        <div class="mb-4">
            <h1 class="text-2xl fw-bold text-dark">
                Detail Pendonor
            </h1>

            <p class="text-muted mb-0">
                Informasi lengkap data pendonor.
            </p>
        </div>

        {{-- CARD --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <div class="row g-4">

                    {{-- NAMA --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Nama Lengkap
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">
                            {{ $pendonor->nama }}
                        </div>
                    </div>

                    {{-- NIK --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            NIK
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">
                            {{ $pendonor->nik }}
                        </div>
                    </div>

                    {{-- JENIS KELAMIN --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Jenis Kelamin
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">
                            {{ $pendonor->jenis_kelamin }}
                        </div>
                    </div>

                    {{-- GOLONGAN DARAH --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Golongan Darah
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">
                            {{ $pendonor->golongan_darah }} {{ $pendonor->rhesus }}
                        </div>
                    </div>

                    {{-- NO HP --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            No HP
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">
                            {{ $pendonor->no_hp }}
                        </div>
                    </div>

                    {{-- TANGGAL LAHIR --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Tanggal Lahir
                        </label>

                        <div class="form-control bg-light rounded-3 py-2">
                            {{ $pendonor->tanggal_lahir }}
                        </div>
                    </div>

                    {{-- ALAMAT --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                            Alamat
                        </label>

                        <div class="form-control bg-light rounded-3 py-3 min-h-[100px]">
                            {{ $pendonor->alamat }}
                        </div>
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="mt-4 flex flex-col gap-3 sm:flex-row">
                    {{-- KEMBALI --}}
                    <a href="{{ route('admin.pendonor.index') }}"
                        class="btn btn-light border rounded-3 px-4 py-2 fw-semibold">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>
@endsection
