@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                <div class="card border-0 rounded-4 overflow-hidden shadow-sm">

                    {{-- Header --}}
                    <div class="card-header border-0 py-3 px-4" style="background-color: #b91c1c;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-heart-fill text-white fs-5"></i>
                            <div>
                                <h5 class="mb-0 text-white fw-medium">Jadwal Donor Darah</h5>
                                <small class="text-white-50">Isi form berikut untuk mengajukan jadwal</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">

                        @if (session('success'))
                            <div class="alert alert-success d-flex align-items-center gap-2 py-2 px-3 rounded-3 border-0 mb-4"
                                style="background-color:#EAF3DE; color:#3B6D11;">
                                <i class="bi bi-check-circle-fill fs-6"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('donor.jadwal.store') }}" method="POST">
                            @csrf

                            {{-- Tanggal --}}
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-medium mb-1">Tanggal donor</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="bi bi-calendar3 text-secondary"></i>
                                    </span>
                                    <input type="date" name="tanggal_donor"
                                        class="form-control border-start-0 ps-0 @error('tanggal_donor') is-invalid @enderror"
                                        required>
                                    @error('tanggal_donor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Lokasi --}}
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-medium mb-1">Lokasi donor</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="bi bi-geo-alt text-secondary"></i>
                                    </span>
                                    <input type="text" name="lokasi" placeholder="Masukkan lokasi donor"
                                        class="form-control border-start-0 ps-0 @error('lokasi') is-invalid @enderror"
                                        required>
                                    @error('lokasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Catatan --}}
                            <div class="mb-4">
                                <label class="form-label text-secondary small fw-medium mb-1">
                                    Catatan <span class="fw-normal">(opsional)</span>
                                </label>
                                <textarea name="catatan" rows="3" placeholder="Catatan tambahan..."
                                    class="form-control @error('catatan') is-invalid @enderror"></textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="d-flex gap-2">
                                <button type="submit"
                                    class="btn flex-fill text-white fw-medium d-flex align-items-center justify-content-center gap-2"
                                    style="background-color:#b91c1c;">
                                    <i class="bi bi-send-fill"></i>
                                    Ajukan donor
                                </button>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4">
                                    Batal
                                </a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
