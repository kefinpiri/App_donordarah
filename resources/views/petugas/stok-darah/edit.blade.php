@extends('layouts.admin')

@section('content')
    <div class="app-content-header">
        <div class="container-fluid">

            <h3 class="mb-3">Edit Stok Darah</h3>

        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card shadow-sm">

                <div class="card-body">

                    <form action="{{ route('petugas.stok-darah.update', $stokDarah->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">
                                Golongan Darah
                            </label>

                            <select name="golongan_darah" class="form-control">

                                <option value="A" {{ $stokDarah->golongan_darah == 'A' ? 'selected' : '' }}>
                                    A
                                </option>

                                <option value="B" {{ $stokDarah->golongan_darah == 'B' ? 'selected' : '' }}>
                                    B
                                </option>

                                <option value="AB" {{ $stokDarah->golongan_darah == 'AB' ? 'selected' : '' }}>
                                    AB
                                </option>

                                <option value="O" {{ $stokDarah->golongan_darah == 'O' ? 'selected' : '' }}>
                                    O
                                </option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Jumlah Kantong
                            </label>

                            <input type="number" name="jumlah_kantong" class="form-control"
                                value="{{ $stokDarah->jumlah_kantong }}">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Tanggal Donor
                            </label>

                            <input type="date" name="tanggal_donor" class="form-control"
                                value="{{ $stokDarah->tanggal_donor }}">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Tanggal Kedaluwarsa
                            </label>

                            <input type="date" name="tanggal_kedaluwarsa" class="form-control"
                                value="{{ $stokDarah->tanggal_kedaluwarsa }}">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Keterangan
                            </label>

                            <textarea name="keterangan" rows="4" class="form-control">{{ $stokDarah->keterangan }}</textarea>

                        </div>

                        <button type="submit" class="btn btn-primary">

                            Update

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
