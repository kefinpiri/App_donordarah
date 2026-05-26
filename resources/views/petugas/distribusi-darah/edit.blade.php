@extends('layouts.admin')

@section('content')
    <div class="app-content-header">

        <div class="container-fluid">

            <h3 class="mb-3">

                Edit Distribusi Darah

            </h3>

        </div>

    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card shadow-sm">

                <div class="card-body">

                    <form action="{{ route('petugas.distribusi-darah.update', $distribusiDarah->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            {{-- PERMINTAAN DARAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Permintaan Darah
                                </label>

                                <select name="permintaan_darah_id" class="form-select">

                                    @foreach ($permintaanDarah as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $distribusiDarah->permintaan_darah_id == $item->id ? 'selected' : '' }}>

                                            {{ $item->nama_pasien }}
                                            -
                                            {{ $item->golongan_darah }}

                                        </option>
                                    @endforeach

                                </select>

                            </div>

                            {{-- GOLONGAN DARAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Golongan Darah
                                </label>

                                <select name="golongan_darah" class="form-select">

                                    <option value="A" {{ $distribusiDarah->golongan_darah == 'A' ? 'selected' : '' }}>
                                        A
                                    </option>

                                    <option value="B" {{ $distribusiDarah->golongan_darah == 'B' ? 'selected' : '' }}>
                                        B
                                    </option>

                                    <option value="AB" {{ $distribusiDarah->golongan_darah == 'AB' ? 'selected' : '' }}>
                                        AB
                                    </option>

                                    <option value="O" {{ $distribusiDarah->golongan_darah == 'O' ? 'selected' : '' }}>
                                        O
                                    </option>

                                </select>

                            </div>

                            {{-- JUMLAH --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Jumlah Kantong
                                </label>

                                <input type="number" name="jumlah_kantong" class="form-control"
                                    value="{{ $distribusiDarah->jumlah_kantong }}">

                            </div>

                            {{-- TANGGAL --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Tanggal Distribusi
                                </label>

                                <input type="date" name="tanggal_distribusi" class="form-control"
                                    value="{{ $distribusiDarah->tanggal_distribusi }}">

                            </div>

                            {{-- STATUS --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Status
                                </label>

                                <select name="status" class="form-select">

                                    <option value="Diproses"
                                        {{ $distribusiDarah->status == 'Diproses' ? 'selected' : '' }}>
                                        Diproses
                                    </option>

                                    <option value="Dikirim" {{ $distribusiDarah->status == 'Dikirim' ? 'selected' : '' }}>
                                        Dikirim
                                    </option>

                                    <option value="Selesai" {{ $distribusiDarah->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>

                                    <option value="Ditolak" {{ $distribusiDarah->status == 'Ditolak' ? 'selected' : '' }}>
                                        Ditolak
                                    </option>

                                </select>

                            </div>

                            {{-- CATATAN --}}
                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Catatan
                                </label>

                                <textarea name="catatan" rows="4" class="form-control">{{ $distribusiDarah->catatan }}</textarea>

                            </div>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-primary">

                                Update

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
