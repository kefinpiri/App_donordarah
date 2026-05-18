@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">

        {{-- HEADER --}}
        <div class="mb-4">
            <h1 class="fw-bold text-dark">
                Edit Pendonor
            </h1>

            <p class="text-muted mb-0">
                Perbarui data pendonor dengan benar.
            </p>
        </div>

        {{-- CARD --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white border-bottom py-3 rounded-top-4">
                <h5 class="mb-0 fw-semibold">
                    Form Edit Pendonor
                </h5>
            </div>

            <div class="card-body p-4">

                <form action="{{ route('admin.pendonor.update', $pendonor->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        {{-- NAMA --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Nama Lengkap
                            </label>

                            <input type="text" name="nama" value="{{ old('nama', $pendonor->nama) }}"
                                class="form-control rounded-3 py-2">

                            @error('nama')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- NIK --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                NIK
                            </label>

                            <input type="text" name="nik" value="{{ old('nik', $pendonor->nik) }}"
                                class="form-control rounded-3 py-2">

                            @error('nik')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- JENIS KELAMIN --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Jenis Kelamin
                            </label>

                            <select name="jenis_kelamin" class="form-select rounded-3 py-2">

                                <option value="">-- Pilih Jenis Kelamin --</option>

                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin', $pendonor->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>

                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $pendonor->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>

                            @error('jenis_kelamin')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- GOLONGAN DARAH --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Golongan Darah
                            </label>

                            <select name="golongan_darah" class="form-select rounded-3 py-2">

                                <option value="">-- Pilih Golongan Darah --</option>

                                <option value="A"
                                    {{ old('golongan_darah', $pendonor->golongan_darah) == 'A' ? 'selected' : '' }}>
                                    A
                                </option>

                                <option value="B"
                                    {{ old('golongan_darah', $pendonor->golongan_darah) == 'B' ? 'selected' : '' }}>
                                    B
                                </option>

                                <option value="AB"
                                    {{ old('golongan_darah', $pendonor->golongan_darah) == 'AB' ? 'selected' : '' }}>
                                    AB
                                </option>

                                <option value="O"
                                    {{ old('golongan_darah', $pendonor->golongan_darah) == 'O' ? 'selected' : '' }}>
                                    O
                                </option>

                            </select>

                            @error('golongan_darah')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- RHESUS --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Rhesus
                            </label>

                            <select name="rhesus" class="form-select rounded-3 py-2">

                                <option value="">-- Pilih Rhesus --</option>

                                <option value="+" {{ old('rhesus', $pendonor->rhesus) == '+' ? 'selected' : '' }}>
                                    Positif (+)
                                </option>

                                <option value="-" {{ old('rhesus', $pendonor->rhesus) == '-' ? 'selected' : '' }}>
                                    Negatif (-)
                                </option>

                            </select>

                            @error('rhesus')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- NO HP --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                No HP
                            </label>

                            <input type="text" name="no_hp" value="{{ old('no_hp', $pendonor->no_hp) }}"
                                class="form-control rounded-3 py-2">

                            @error('no_hp')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- TANGGAL LAHIR --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Tanggal Lahir
                            </label>

                            <input type="date" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $pendonor->tanggal_lahir) }}"
                                class="form-control rounded-3 py-2">

                            @error('tanggal_lahir')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- ALAMAT --}}
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea name="alamat" rows="4" class="form-control rounded-3 py-2">{{ old('alamat', $pendonor->alamat) }}</textarea>

                            @error('alamat')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-4 d-flex flex-column flex-sm-row gap-3">

                        <button type="submit" class="btn btn-warning rounded-3 px-4 py-2 fw-semibold">

                            <i class="bi bi-save me-1"></i>

                            Update Data

                        </button>

                        <a href="{{ route('admin.pendonor.index') }}"
                            class="btn btn-light border rounded-3 px-4 py-2 fw-semibold">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
