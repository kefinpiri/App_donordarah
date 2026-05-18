@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="mb-4">

            <h3 class="fw-bold">
                Detail Pasien
            </h3>

            <p class="text-muted">
                Informasi lengkap pasien / pemohon darah
            </p>

        </div>

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Nama</label>
                        <div class="form-control">
                            {{ $pasien->nama }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Jenis Kelamin</label>
                        <div class="form-control">
                            {{ $pasien->jenis_kelamin }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">No HP</label>
                        <div class="form-control">
                            {{ $pasien->no_hp }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Golongan Darah</label>
                        <div class="form-control">
                            {{ $pasien->golongan_darah }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Jumlah Darah</label>
                        <div class="form-control">
                            {{ $pasien->jumlah_darah }} Kantong
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Rumah Sakit</label>
                        <div class="form-control">
                            {{ $pasien->rumah_sakit }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Status</label>
                        <div class="form-control">
                            {{ $pasien->status }}
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="fw-semibold">Alamat</label>
                        <textarea class="form-control" rows="4" readonly>{{ $pasien->alamat }}</textarea>
                    </div>

                </div>

                <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </div>

    </div>
@endsection
