@extends('layouts.admin')

@section('title', 'Permintaan Darah')

@section('content')

    <div class="app-content-header">

        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h3 class="fw-bold mb-1">

                        <i class="bi bi-droplet-half text-danger me-2"></i>

                        Permintaan Darah

                    </h3>

                    <p class="text-muted mb-0">

                        Isi form permintaan darah dengan lengkap dan benar

                    </p>

                </div>

            </div>

        </div>

    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="row justify-content-center">

                <div class="col-lg-10">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        {{-- BODY --}}
                        <div class="card-body p-4 p-lg-5">

                            {{-- ERROR --}}
                            @if ($errors->any())

                                <div class="alert alert-danger border-0 rounded-4 shadow-sm">

                                    <div class="d-flex align-items-center gap-2 mb-2">

                                        <i class="bi bi-exclamation-triangle-fill"></i>

                                        <strong>
                                            Terjadi Kesalahan
                                        </strong>

                                    </div>

                                    <ul class="mb-0 ps-3">

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>

                                </div>

                            @endif

                            <form action="{{ route('pemohon.permintaan-darah.store') }}" method="POST">

                                @csrf

                                <div class="row g-4">

                                    {{-- NAMA PASIEN --}}
                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">

                                            Nama Pasien

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-0">

                                                <i class="bi bi-person-fill text-danger"></i>

                                            </span>

                                            <input type="text" name="nama_pasien"
                                                class="form-control border-0 bg-light rounded-end-3 py-3"
                                                placeholder="Masukkan nama pasien" required>

                                        </div>

                                    </div>

                                    {{-- JENIS KELAMIN --}}
                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">

                                            Jenis Kelamin

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-0">

                                                <i class="bi bi-gender-ambiguous text-danger"></i>

                                            </span>

                                            <select name="jenis_kelamin"
                                                class="form-select border-0 bg-light rounded-end-3 py-3" required>

                                                <option value="">
                                                    -- Pilih Jenis Kelamin --
                                                </option>

                                                <option value="Laki-laki">
                                                    Laki-laki
                                                </option>

                                                <option value="Perempuan">
                                                    Perempuan
                                                </option>

                                            </select>

                                        </div>

                                    </div>

                                    {{-- NO HP --}}
                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">

                                            No HP

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-0">

                                                <i class="bi bi-telephone-fill text-danger"></i>

                                            </span>

                                            <input type="text" name="no_hp"
                                                class="form-control border-0 bg-light rounded-end-3 py-3"
                                                placeholder="Masukkan nomor HP" required>

                                        </div>

                                    </div>

                                    {{-- GOLONGAN DARAH --}}
                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">

                                            Golongan Darah

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-0">

                                                <i class="bi bi-droplet-fill text-danger"></i>

                                            </span>

                                            <select name="golongan_darah"
                                                class="form-select border-0 bg-light rounded-end-3 py-3" required>

                                                <option value="">
                                                    -- Pilih Golongan Darah --
                                                </option>

                                                <option value="A">
                                                    A
                                                </option>

                                                <option value="B">
                                                    B
                                                </option>

                                                <option value="AB">
                                                    AB
                                                </option>

                                                <option value="O">
                                                    O
                                                </option>

                                            </select>

                                        </div>

                                    </div>

                                    {{-- JUMLAH --}}
                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">

                                            Jumlah Kantong

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-0">

                                                <i class="bi bi-bag-plus-fill text-danger"></i>

                                            </span>

                                            <input type="number" name="jumlah_kantong"
                                                class="form-control border-0 bg-light rounded-end-3 py-3"
                                                placeholder="Masukkan jumlah kantong" required>

                                        </div>

                                    </div>

                                    {{-- RUMAH SAKIT --}}
                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">

                                            Rumah Sakit

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-0">

                                                <i class="bi bi-hospital-fill text-danger"></i>

                                            </span>

                                            <input type="text" name="rumah_sakit"
                                                class="form-control border-0 bg-light rounded-end-3 py-3"
                                                placeholder="Masukkan rumah sakit" required>

                                        </div>

                                    </div>

                                    {{-- TANGGAL --}}
                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">

                                            Tanggal Permintaan

                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text bg-light border-0">

                                                <i class="bi bi-calendar-event-fill text-danger"></i>

                                            </span>

                                            <input type="date" name="tanggal_permintaan"
                                                class="form-control border-0 bg-light rounded-end-3 py-3" required>

                                        </div>

                                    </div>

                                    {{-- KETERANGAN --}}
                                    <div class="col-12">

                                        <label class="form-label fw-semibold">

                                            Keterangan

                                        </label>

                                        <textarea name="keterangan" rows="5" class="form-control border-0 bg-light rounded-4 p-3"
                                            placeholder="Tambahkan keterangan jika diperlukan"></textarea>

                                    </div>

                                </div>

                                {{-- BUTTON --}}
                                <div class="d-flex justify-content-end gap-3 mt-5">

                                    <a href="{{ route('pemohon.permintaan-darah.index') }}"
                                        class="btn btn-light rounded-pill px-4 py-2 shadow-sm">

                                        <i class="bi bi-arrow-left me-1"></i>

                                        Kembali

                                    </a>

                                    <button type="submit" class="btn text-white rounded-pill px-5 py-2 shadow-sm"
                                        style="background:#dc2626;">

                                        <i class="bi bi-send-fill me-1"></i>

                                        Kirim Permintaan

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
