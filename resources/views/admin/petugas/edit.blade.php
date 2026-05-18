@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="mb-4">
            <h3 class="text-2xl font-bold text-gray-800">
                Edit Petugas
            </h3>

            <p class="text-gray-500">
                Form edit data petugas donor darah
            </p>
        </div>

        <div class="card shadow-sm border-0 rounded-4">

            <div class="card-body p-4">

                <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- NAMA --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Nama Petugas
                            </label>

                            <input type="text" name="nama"
                                class="form-control rounded-3 @error('nama') is-invalid @enderror"
                                placeholder="Masukkan nama petugas" value="{{ old('nama', $petugas->nama) }}">

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- JENIS KELAMIN --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Jenis Kelamin
                            </label>

                            <select name="jenis_kelamin"
                                class="form-select rounded-3 @error('jenis_kelamin') is-invalid @enderror">

                                <option value="">-- Pilih --</option>

                                <option value="Laki-laki" {{ $petugas->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>

                                    Laki-laki

                                </option>

                                <option value="Perempuan" {{ $petugas->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>

                                    Perempuan

                                </option>

                            </select>

                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- NO HP --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Nomor HP
                            </label>

                            <input type="text" name="no_hp"
                                class="form-control rounded-3 @error('no_hp') is-invalid @enderror"
                                placeholder="Masukkan nomor HP" value="{{ old('no_hp', $petugas->no_hp) }}">

                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- ALAMAT --}}
                        <div class="col-md-12 mb-4">

                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea name="alamat" rows="4" class="form-control rounded-3 @error('alamat') is-invalid @enderror"
                                placeholder="Masukkan alamat petugas">{{ old('alamat', $petugas->alamat) }}</textarea>

                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex gap-2">

                        <button type="submit" class="btn btn-warning px-4 rounded-3">

                            Update

                        </button>

                        <a href="{{ route('admin.petugas.index') }}" class="btn btn-secondary px-4 rounded-3">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
