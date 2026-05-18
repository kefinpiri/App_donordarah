@extends('layouts.admin')

@section('title', 'Tambah Data Pendonor')

@section('content')

    {{-- Content Header --}}
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Data Pendonor</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pendonor.index') }}">Data Pendonor</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="app-content">
        <div class="container-fluid">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-start gap-2" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5 mt-1"></i>
                    <div>
                        <strong>Terdapat kesalahan pada formulir!</strong>
                        <ul class="mb-0 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('admin.pendonor.store') }}" method="POST" id="pendonorForm">
                @csrf

                <div class="row g-4">

                    {{-- ── LEFT COLUMN ── --}}
                    <div class="col-lg-8">

                        {{-- Card: Identitas Diri --}}
                        <div class="card card-outline card-danger mb-4">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="bi bi-person-vcard me-2 text-danger"></i>
                                    Identitas Diri
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">

                                    {{-- Nama --}}
                                    <div class="col-12">
                                        <label for="nama" class="form-label fw-semibold">
                                            Nama Lengkap <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Masukkan nama lengkap" value="{{ old('nama') }}"
                                                autocomplete="off">
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- NIK --}}
                                    <div class="col-12">
                                        <label for="nik" class="form-label fw-semibold">
                                            NIK <span class="text-danger">*</span>
                                            <small class="text-muted fw-normal">(16 digit)</small>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                                            <input type="text" name="nik" id="nik"
                                                class="form-control @error('nik') is-invalid @enderror"
                                                placeholder="Masukkan 16 digit NIK" value="{{ old('nik') }}"
                                                maxlength="16" inputmode="numeric" autocomplete="off">
                                            <span class="input-group-text">
                                                <small id="nikCount" class="text-muted">0/16</small>
                                            </span>
                                            @error('nik')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Tanggal Lahir --}}
                                    <div class="col-md-6">
                                        <label for="tanggal_lahir" class="form-label fw-semibold">
                                            Tanggal Lahir <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                            <input type="text" name="tanggal_lahir" id="tanggal_lahir"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                placeholder="Pilih tanggal lahir" value="{{ old('tanggal_lahir') }}"
                                                readonly autocomplete="off">
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <small class="text-muted">
                                            <i class="bi bi-info-circle me-1"></i>Klik field untuk membuka kalender
                                        </small>
                                    </div>

                                    {{-- Jenis Kelamin --}}
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold d-block">
                                            Jenis Kelamin <span class="text-danger">*</span>
                                        </label>
                                        <div class="d-flex gap-2">
                                            <input type="radio" class="btn-check" name="jenis_kelamin" id="laki"
                                                value="laki-laki    "
                                                {{ old('jenis_kelamin') == 'laki-laki' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary w-50" for="laki">
                                                <i class="bi bi-gender-male me-1"></i> Laki-laki
                                            </label>

                                            <input type="radio" class="btn-check" name="jenis_kelamin" id="perempuan"
                                                value="perempuan"
                                                {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-danger w-50" for="perempuan">
                                                <i class="bi bi-gender-female me-1"></i> Perempuan
                                            </label>
                                        </div>
                                        @error('jenis_kelamin')
                                            <div class="text-danger mt-1" style="font-size:.875em">
                                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Card: Kontak & Alamat --}}
                        <div class="card card-outline card-danger mb-4">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="bi bi-geo-alt me-2 text-danger"></i>
                                    Kontak & Alamat
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">

                                    {{-- No HP --}}
                                    <div class="col-12">
                                        <label for="no_hp" class="form-label fw-semibold">
                                            Nomor HP / WhatsApp <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                            <span class="input-group-text text-muted">+62</span>
                                            <input type="tel" name="no_hp" id="no_hp"
                                                class="form-control @error('no_hp') is-invalid @enderror"
                                                placeholder="8xx-xxxx-xxxx" value="{{ old('no_hp') }}" inputmode="tel"
                                                autocomplete="off">
                                            @error('no_hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Alamat --}}
                                    <div class="col-12">
                                        <label for="alamat" class="form-label fw-semibold">
                                            Alamat Lengkap <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text align-items-start pt-2">
                                                <i class="bi bi-map"></i>
                                            </span>
                                            <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror"
                                                placeholder="Jl. Nama Jalan No. XX, Kelurahan, Kecamatan, Kota/Kabupaten">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- end left col --}}

                    {{-- ── RIGHT COLUMN ── --}}
                    <div class="col-lg-4">

                        {{-- Card: Data Medis --}}
                        <div class="card card-outline card-danger mb-4">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="bi bi-droplet-half me-2 text-danger"></i>
                                    Data Medis
                                </h3>
                            </div>
                            <div class="card-body">

                                {{-- Golongan Darah --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        Golongan Darah <span class="text-danger">*</span>
                                    </label>
                                    <div class="row g-2">
                                        @foreach (['A', 'B', 'AB', 'O'] as $type)
                                            <div class="col-6">
                                                <input type="radio" class="btn-check" name="golongan_darah"
                                                    id="gd_{{ $type }}" value="{{ $type }}"
                                                    {{ old('golongan_darah') == $type ? 'checked' : '' }}>
                                                <label class="btn btn-outline-danger w-100 py-3 fs-5 fw-bold"
                                                    for="gd_{{ $type }}">
                                                    {{ $type }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('golongan_darah')
                                        <div class="text-danger mt-1" style="font-size:.875em">
                                            <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Rhesus --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        Rhesus <span class="text-danger">*</span>
                                    </label>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <input type="radio" class="btn-check" name="rhesus" id="rh_pos"
                                                value="+" {{ old('rhesus') == '+' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-success w-100 py-2 fw-semibold" for="rh_pos">
                                                <i class="bi bi-plus-circle me-1"></i> Positif
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <input type="radio" class="btn-check" name="rhesus" id="rh_neg"
                                                value="-" {{ old('rhesus') == '-' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-danger w-100 py-2 fw-semibold" for="rh_neg">
                                                <i class="bi bi-dash-circle me-1"></i> Negatif
                                            </label>
                                        </div>
                                    </div>
                                    @error('rhesus')
                                        <div class="text-danger mt-1" style="font-size:.875em">
                                            <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Blood Type Preview --}}
                                <div
                                    class="text-center p-3 rounded-3 border border-danger border-opacity-25 bg-danger bg-opacity-10">
                                    <small class="text-muted d-block mb-1 text-uppercase fw-semibold"
                                        style="letter-spacing:.5px; font-size:11px">
                                        Golongan Darah Lengkap
                                    </small>
                                    <span id="bloodPreview" class="display-5 fw-bold text-danger lh-1">—</span>
                                    <small class="text-muted d-block mt-2" id="bloodHint" style="font-size:11px">
                                        Pilih golongan &amp; rhesus
                                    </small>
                                </div>

                            </div>
                        </div>

                        {{-- Card: Aksi --}}
                        <div class="card card-outline card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="bi bi-gear me-2"></i> Aksi
                                </h3>
                            </div>
                            <div class="card-body d-grid gap-2">

                                <button type="submit" class="btn btn-danger" id="submitBtn">
                                    <span id="btnContent">
                                        <i class="bi bi-floppy me-1"></i> Simpan Data
                                    </span>
                                    <span id="btnLoading" class="d-none">
                                        <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                                        Menyimpan...
                                    </span>
                                </button>

                                <button type="reset" class="btn btn-outline-secondary" onclick="handleReset()">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Form
                                </button>

                                <a href="{{ route('admin.pendonor.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali
                                </a>

                            </div>
                        </div>

                    </div>
                    {{-- end right col --}}

                </div>
                {{-- end row --}}

            </form>

        </div>
    </div>

@endsection

@push('styles')
    {{-- Flatpickr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* Paksa input readonly flatpickr tetap terlihat aktif */
        #tanggal_lahir[readonly] {
            background-color: #fff !important;
            cursor: pointer;
        }

        .flatpickr-calendar {
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .12);
        }

        .flatpickr-day.selected,
        .flatpickr-day.selected:hover {
            background: #dc3545 !important;
            border-color: #dc3545 !important;
        }

        .flatpickr-day:hover {
            background: #fde8ec;
        }

        .flatpickr-months .flatpickr-month,
        .flatpickr-weekdays,
        span.flatpickr-weekday {
            background: #dc3545 !important;
            color: #fff !important;
            fill: #fff !important;
        }

        .flatpickr-current-month .flatpickr-monthDropdown-months,
        .flatpickr-current-month input.cur-year {
            color: #fff !important;
        }

        .flatpickr-prev-month svg,
        .flatpickr-next-month svg {
            fill: #fff !important;
        }
    </style>
@endpush

@push('scripts')
    {{-- Flatpickr JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- Flatpickr Locale Indonesia --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /* ── Flatpickr: Tanggal Lahir ───────────────────── */
            flatpickr('#tanggal_lahir', {
                locale: 'id',
                dateFormat: 'Y-m-d', // format dikirim ke server (sesuai validasi Laravel)
                altInput: true,
                altFormat: 'd F Y', // format tampil ke user: "15 Januari 2000"
                maxDate: 'today',
                allowInput: false,
                disableMobile: false, // pakai native picker di mobile
                defaultDate: '{{ old('tanggal_lahir') }}' || null,
            });

            /* ── Blood Type Preview ─────────────────────────── */
            function updateBloodPreview() {
                const goldar = document.querySelector('input[name="golongan_darah"]:checked');
                const rhesus = document.querySelector('input[name="rhesus"]:checked');
                const display = document.getElementById('bloodPreview');
                const hint = document.getElementById('bloodHint');

                if (goldar && rhesus) {
                    display.textContent = goldar.value + rhesus.value;
                    hint.innerHTML = '<i class="bi bi-check-circle-fill text-success me-1"></i>Teridentifikasi';
                } else if (goldar) {
                    display.textContent = goldar.value + ' ?';
                    hint.textContent = 'Pilih rhesus juga';
                } else {
                    display.textContent = '—';
                    hint.textContent = 'Pilih golongan & rhesus';
                }
            }

            document.querySelectorAll('input[name="golongan_darah"], input[name="rhesus"]')
                .forEach(el => el.addEventListener('change', updateBloodPreview));

            updateBloodPreview();

            /* ── NIK Counter ────────────────────────────────── */
            const nikInput = document.getElementById('nik');
            const nikCount = document.getElementById('nikCount');

            if (nikInput && nikCount) {
                function updateNikCount() {
                    const len = nikInput.value.length;
                    nikCount.textContent = len + '/16';
                    nikCount.className = len === 16 ? 'text-success fw-semibold' :
                        len > 0 ? 'text-warning fw-semibold' :
                        'text-muted';
                }
                nikInput.addEventListener('input', function() {
                    this.value = this.value.replace(/\D/g, '');
                    updateNikCount();
                });
                if (nikInput.value.length) updateNikCount();
            }

            /* ── Submit Loading State ───────────────────────── */
            const form = document.getElementById('pendonorForm');
            if (form) {
                form.addEventListener('submit', function() {
                    document.getElementById('btnContent').classList.add('d-none');
                    document.getElementById('btnLoading').classList.remove('d-none');
                    document.getElementById('submitBtn').disabled = true;
                });
            }

        });

        /* ── Reset Handler ──────────────────────────────────── */
        function handleReset() {
            setTimeout(() => {
                // Reset flatpickr
                const fp = document.getElementById('tanggal_lahir')._flatpickr;
                if (fp) fp.clear();

                // Reset blood preview
                document.getElementById('bloodPreview').textContent = '—';
                document.getElementById('bloodHint').textContent = 'Pilih golongan & rhesus';

                // Reset NIK counter
                const nikCount = document.getElementById('nikCount');
                if (nikCount) {
                    nikCount.textContent = '0/16';
                    nikCount.className = 'text-muted';
                }
            }, 50);
        }
    </script>
@endpush
