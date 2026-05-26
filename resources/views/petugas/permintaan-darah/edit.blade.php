@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white border-0 py-3">

                <h4 class="fw-bold mb-0">
                    Validasi Permintaan Darah
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('petugas.permintaan-darah.update', $permintaanDarah->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        {{-- NAMA PASIEN --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Nama Pasien
                            </label>

                            <input type="text" class="form-control rounded-3" value="{{ $permintaanDarah->nama_pasien }}"
                                readonly>

                        </div>

                        {{-- GOLONGAN DARAH --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Golongan Darah
                            </label>

                            <input type="text" class="form-control rounded-3"
                                value="{{ $permintaanDarah->golongan_darah }}" readonly>

                        </div>

                        {{-- JUMLAH KANTONG --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Jumlah Kantong
                            </label>

                            <input type="text" class="form-control rounded-3"
                                value="{{ $permintaanDarah->jumlah_kantong }}" readonly>

                        </div>

                        {{-- RUMAH SAKIT --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Rumah Sakit
                            </label>

                            <input type="text" class="form-control rounded-3" value="{{ $permintaanDarah->rumah_sakit }}"
                                readonly>

                        </div>

                        {{-- TANGGAL --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Tanggal Permintaan
                            </label>

                            <input type="date" class="form-control rounded-3"
                                value="{{ $permintaanDarah->tanggal_permintaan }}" readonly>

                        </div>

                        {{-- STATUS --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                Status
                            </label>

                            <select name="status" class="form-select rounded-3">

                                <option value="Pending" {{ $permintaanDarah->status == 'Pending' ? 'selected' : '' }}>

                                    Pending

                                </option>

                                <option value="Diproses" {{ $permintaanDarah->status == 'Diproses' ? 'selected' : '' }}>

                                    Diproses

                                </option>

                                <option value="Disetujui" {{ $permintaanDarah->status == 'Disetujui' ? 'selected' : '' }}>

                                    Disetujui

                                </option>

                                <option value="Ditolak" {{ $permintaanDarah->status == 'Ditolak' ? 'selected' : '' }}>

                                    Ditolak

                                </option>

                            </select>

                        </div>

                        {{-- KETERANGAN --}}
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Keterangan
                            </label>

                            <textarea name="keterangan" rows="4" class="form-control rounded-3">{{ old('keterangan', $permintaanDarah->keterangan) }}</textarea>

                        </div>

                    </div>

                    <div class="mt-4 d-flex gap-2">

                        <button type="submit" class="btn btn-primary rounded-3">

                            Update Status

                        </button>

                        <a href="{{ route('petugas.permintaan-darah.index') }}" class="btn btn-secondary rounded-3">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
