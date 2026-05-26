@extends('layouts.admin')

@section('title', 'Permintaan Darah')

@section('content')

    <div class="container py-4">

        <div class="card shadow border-0 rounded-4">

            <div class="card-header bg-danger text-white rounded-top-4">

                <h4 class="mb-0">
                    Form Permintaan Darah
                </h4>

            </div>

            <div class="card-body p-4">

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('pemohon.permintaan-darah.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Pasien
                        </label>

                        <input type="text" name="nama_pasien" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Jenis Kelamin
                        </label>

                        <select name="jenis_kelamin" class="form-select" required>

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

                    <div class="mb-3">

                        <label class="form-label">
                            No HP
                        </label>

                        <input type="text" name="no_hp" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Golongan Darah
                        </label>

                        <select name="golongan_darah" class="form-select" required>

                            <option value="">
                                -- Pilih --
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

                    <div class="mb-3">

                        <label class="form-label">
                            Jumlah Kantong
                        </label>

                        <input type="number" name="jumlah_kantong" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Rumah Sakit
                        </label>

                        <input type="text" name="rumah_sakit" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Tanggal Permintaan
                        </label>

                        <input type="date" name="tanggal_permintaan" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea name="keterangan" rows="4" class="form-control"></textarea>

                    </div>

                    <button type="submit" class="btn btn-danger">

                        Kirim Permintaan

                    </button>

                </form>

            </div>

        </div>

    </div>

@endsection
