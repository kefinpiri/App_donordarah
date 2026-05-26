@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-4">

                    <div class="card-header bg-danger text-white rounded-top-4">

                        <h4 class="mb-0">
                            Update Status Donor
                        </h4>

                    </div>

                    <div class="card-body p-4">

                        <form action="{{ route('petugas.donor-darah.update', $donorDarah->id) }}" method="POST">

                            @csrf
                            @method('PUT')

                            <div class="mb-3">

                                <label class="form-label">
                                    Tanggal Donor
                                </label>

                                <input type="text" class="form-control" value="{{ $donorDarah->tanggal_donor }}"
                                    readonly>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Lokasi
                                </label>

                                <input type="text" class="form-control" value="{{ $donorDarah->lokasi }}" readonly>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Status
                                </label>

                                <select name="status" class="form-select" required>

                                    <option value="Menunggu" {{ $donorDarah->status == 'Menunggu' ? 'selected' : '' }}>
                                        Menunggu
                                    </option>

                                    <option value="Diterima" {{ $donorDarah->status == 'Diterima' ? 'selected' : '' }}>
                                        Diterima
                                    </option>

                                    <option value="Selesai" {{ $donorDarah->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>

                                    <option value="Ditolak" {{ $donorDarah->status == 'Ditolak' ? 'selected' : '' }}>
                                        Ditolak
                                    </option>

                                </select>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Catatan
                                </label>

                                <textarea name="catatan" rows="4" class="form-control">{{ $donorDarah->catatan }}</textarea>

                            </div>

                            <div class="d-grid">

                                <button type="submit" class="btn btn-danger rounded-3">

                                    Update Status

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
