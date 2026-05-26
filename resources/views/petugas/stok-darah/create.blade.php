@extends('layouts.admin')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">

            <h3 class="mb-3">Tambah Stok Darah</h3>

        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card shadow-sm">

                <div class="card-body">

                    <form action="{{ route('petugas.stok-darah.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Golongan Darah
                            </label>

                            <select name="golongan_darah" class="form-control">

                                <option value="">-- Pilih Golongan Darah --</option>

                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Jumlah Kantong
                            </label>

                            <input type="number" name="jumlah_kantong" class="form-control">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Tanggal Donor
                            </label>

                            <input type="date" name="tanggal_donor" class="form-control">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Tanggal Kedaluwarsa
                            </label>

                            <input type="date" name="tanggal_kedaluwarsa" class="form-control">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Keterangan
                            </label>

                            <textarea name="keterangan" rows="4" class="form-control"></textarea>

                        </div>

                        <button type="submit" class="btn btn-primary">

                            Simpan

                        </button>

                        <a href="{{ route('petugas.stok-darah.index') }}" class="btn btn-secondary">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>
    </div>
@endsection
