@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        {{-- HEADER --}}
        <td class="text-center">

            {{-- BUTTON DETAIL --}}
            <a href="{{ route('admin.pasien.show', $item->id) }}" class="btn btn-info btn-sm">

                Detail

            </a>

            {{-- BUTTON EDIT --}}
            <a href="{{ route('admin.pasien.edit', $item->id) }}" class="btn btn-warning btn-sm">

                Edit

            </a>

            {{-- BUTTON DELETE --}}
            <form action="{{ route('admin.pasien.destroy', $item->id) }}" method="POST" class="d-inline">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">

                    Hapus

                </button>

            </form>

        </td>

        {{-- CARD --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- NAMA --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Nama Lengkap
                            </label>

                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $pasien->nama) }}">

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- JENIS KELAMIN --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Jenis Kelamin
                            </label>

                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">

                                <option value="">
                                    -- Pilih --
                                </option>

                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>

                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
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
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Nomor HP
                            </label>

                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                                value="{{ old('no_hp', $pasien->no_hp) }}">

                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- GOLONGAN DARAH --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Golongan Darah
                            </label>

                            <select name="golongan_darah" class="form-select @error('golongan_darah') is-invalid @enderror">

                                <option value="">
                                    -- Pilih --
                                </option>

                                <option value="A"
                                    {{ old('golongan_darah', $pasien->golongan_darah) == 'A' ? 'selected' : '' }}>
                                    A
                                </option>

                                <option value="B"
                                    {{ old('golongan_darah', $pasien->golongan_darah) == 'B' ? 'selected' : '' }}>
                                    B
                                </option>

                                <option value="AB"
                                    {{ old('golongan_darah', $pasien->golongan_darah) == 'AB' ? 'selected' : '' }}>
                                    AB
                                </option>

                                <option value="O"
                                    {{ old('golongan_darah', $pasien->golongan_darah) == 'O' ? 'selected' : '' }}>
                                    O
                                </option>

                            </select>

                            @error('golongan_darah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- JUMLAH DARAH --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Jumlah Darah
                            </label>

                            <input type="number" name="jumlah_darah"
                                class="form-control @error('jumlah_darah') is-invalid @enderror"
                                value="{{ old('jumlah_darah', $pasien->jumlah_darah) }}">

                            @error('jumlah_darah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- RUMAH SAKIT --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Rumah Sakit
                            </label>

                            <input type="text" name="rumah_sakit"
                                class="form-control @error('rumah_sakit') is-invalid @enderror"
                                value="{{ old('rumah_sakit', $pasien->rumah_sakit) }}">

                            @error('rumah_sakit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- STATUS --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Status Permintaan
                            </label>

                            <select name="status" class="form-select @error('status') is-invalid @enderror">

                                <option value="Menunggu"
                                    {{ old('status', $pasien->status) == 'Menunggu' ? 'selected' : '' }}>
                                    Menunggu
                                </option>

                                <option value="Diproses"
                                    {{ old('status', $pasien->status) == 'Diproses' ? 'selected' : '' }}>
                                    Diproses
                                </option>

                                <option value="Disetujui"
                                    {{ old('status', $pasien->status) == 'Disetujui' ? 'selected' : '' }}>
                                    Disetujui
                                </option>

                                <option value="Ditolak"
                                    {{ old('status', $pasien->status) == 'Ditolak' ? 'selected' : '' }}>
                                    Ditolak
                                </option>

                            </select>

                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- ALAMAT --}}
                        <div class="col-12 mb-3">

                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea name="alamat" rows="4" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $pasien->alamat) }}</textarea>

                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex gap-2 mt-3">

                        <button type="submit" class="btn btn-primary">

                            Update Data

                        </button>

                        <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
