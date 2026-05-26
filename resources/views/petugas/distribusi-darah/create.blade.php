@extends('layouts.admin')

@section('content')
    <div class="app-content-header">

        <div class="container-fluid">

            <h3 class="mb-3">

                Tambah Distribusi Darah

            </h3>

        </div>

    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card shadow-sm">

                <div class="card-body">

                    <form action="{{ route('petugas.distribusi-darah.store') }}" method="POST">

                        @csrf

                        <div class="row">

                            {{-- PERMINTAAN DARAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Permintaan Darah
                                </label>

                                <select name="permintaan_darah_id" class="form-select">

                                    <option value="">
                                        -- Pilih Permintaan --
                                    </option>

                                    @foreach ($permintaanDarah as $item)
                                        <option value="{{ $item->id }}">

                                            {{ $item->nama_pasien }}
                                            -
                                            {{ $item->golongan_darah }}

                                        </option>
                                    @endforeach

                                </select>

                                @error('permintaan_darah_id')
                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>
                                @enderror

                            </div>

                            {{-- GOLONGAN DARAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Golongan Darah
                                </label>

                                <select name="golongan_darah" class="form-select">

                                    <option value="">-- Pilih --</option>

                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>

                                </select>

                                @error('golongan_darah')
                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>
                                @enderror

                            </div>

                            {{-- JUMLAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Jumlah Kantong
                                </label>

                                <input type="number" name="jumlah_kantong" class="form-control">

                                @error('jumlah_kantong')
                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>
                                @enderror

                            </div>

                            {{-- TANGGAL --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Tanggal Distribusi
                                </label>

                                <input type="date" name="tanggal_distribusi" class="form-control">

                                @error('tanggal_distribusi')
                                    <small class="text-danger">

                                        {{ $message }}

                                    </small>
                                @enderror

                            </div>

                            {{-- STATUS --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Status
                                </label>

                                <select name="status" class="form-select">

                                    <option value="Diproses">
                                        Diproses
                                    </option>

                                    <option value="Dikirim">
                                        Dikirim
                                    </option>

                                    <option value="Selesai">
                                        Selesai
                                    </option>

                                    <option value="Ditolak">
                                        Ditolak
                                    </option>

                                </select>

                            </div>

                            {{-- CATATAN --}}
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Catatan
                                </label>

                                <textarea name="catatan" rows="4" class="form-control"></textarea>

                            </div>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-primary">

                                Simpan

                            </button>

                            <a href="{{ route('petugas.distribusi-darah.index') }}" class="btn btn-secondary">

                                Kembali

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
