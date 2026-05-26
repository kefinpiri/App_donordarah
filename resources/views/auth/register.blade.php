<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Donor Darah</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            min-height: 100vh;
            background: #ffffff;
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            padding: 1rem;
        }

        .register-card {
            width: 100%;
            max-width: 430px;
            background: rgba(15, 5, 5, 0.95);
            border: 1px solid rgba(180, 0, 0, 0.2);
            border-radius: 28px;
            padding: 1.5rem 2rem;
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.2),
                0 0 30px rgba(139, 0, 0, 0.08);
        }

        .card-accent {
            width: 90px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #ff3b30, transparent);
            margin: -1.5rem auto 1rem;
        }

        .register-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .register-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(180, 0, 0, 0.15);
            border: 1px solid rgba(200, 30, 30, 0.3);
            color: #ff9b9b;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 6px 15px;
            border-radius: 999px;
            margin-bottom: .5rem;
        }

        .register-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ff3b30;
        }

        .register-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 3rem;
            letter-spacing: .06em;
            color: #fff;
            margin-bottom: .2rem;
        }

        .register-title span {
            color: #ff4d4d;
        }

        .register-subtitle {
            color: rgba(255, 255, 255, 0.35);
            font-size: .85rem;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 1rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.08);
        }

        .divider span {
            color: rgba(255, 255, 255, 0.25);
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .1em;
        }

        .field-group {
            margin-bottom: 1rem;
        }

        .field-label {
            display: block;
            margin-bottom: 6px;
            color: rgba(255, 255, 255, 0.45);
            font-size: .74rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .field-wrap {
            position: relative;
        }

        .field-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: rgba(255, 120, 120, 0.7);
        }

        input,
        select {
            width: 100%;
            padding: 13px 16px 13px 46px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.04);
            color: white;
            outline: none;
            transition: .3s;
        }

        select {
            appearance: none;
        }

        input:focus,
        select:focus {
            border-color: rgba(255, 90, 90, 0.7);
            box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.12);
        }

        option {
            color: black;
        }

        .btn-register {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 13px;
            background: linear-gradient(135deg, #d64541, #96281b);
            color: white;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.2rem;
            letter-spacing: .15em;
            cursor: pointer;
            transition: .3s;
            margin-top: .5rem;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 0, 0, 0.25);
        }

        .login-row {
            margin-top: 1rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.3);
            font-size: .85rem;
        }

        .login-row a {
            color: #ff4d4d;
            text-decoration: none;
            font-weight: 700;
        }

        .card-footer-line {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .footer-dot {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: rgba(255, 80, 80, 0.5);
        }

        .card-footer-line span {
            color: rgba(255, 255, 255, 0.18);
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .12em;
        }

        .text-red-600 {
            color: #ff7b7b !important;
            font-size: .75rem;
            margin-top: 5px;
        }
    </style>

    <div class="register-wrapper">

        <div class="register-card">

            <div class="card-accent"></div>

            <div class="register-header">

                <div class="register-badge">
                    Portal Registrasi
                </div>

                <h1 class="register-title">
                    DONOR<span>DARAH</span>
                </h1>

                <p class="register-subtitle">
                    Buat Akun Baru
                </p>

            </div>

            <div class="divider">
                <span>Daftar Akun</span>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- NAME --}}
                <div class="field-group">

                    <label class="field-label">
                        Nama Lengkap
                    </label>

                    <div class="field-wrap">

                        <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">

                            <path d="M20 21a8 8 0 1 0-16 0" />
                            <circle cx="12" cy="7" r="4" />

                        </svg>

                        <x-text-input id="name" type="text" name="name" :value="old('name')"
                            placeholder="Masukkan nama lengkap" required autofocus />

                    </div>

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>

                {{-- EMAIL --}}
                <div class="field-group">

                    <label class="field-label">
                        Email
                    </label>

                    <div class="field-wrap">

                        <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">

                            <path d="M4 4h16v16H4z" />
                            <path d="m22 6-10 7L2 6" />

                        </svg>

                        <x-text-input id="email" type="email" name="email" :value="old('email')"
                            placeholder="nama@email.com" required />

                    </div>

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>

                {{-- PASSWORD --}}
                <div class="field-group">

                    <label class="field-label">
                        Password
                    </label>

                    <div class="field-wrap">

                        <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">

                            <rect x="3" y="11" width="18" height="11" rx="2" />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />

                        </svg>

                        <x-text-input id="password" type="password" name="password" placeholder="••••••••" required />

                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>

                {{-- ROLE --}}
                <div class="field-group">

                    <label class="field-label">
                        Role
                    </label>

                    <div class="field-wrap">

                        <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">

                            <path d="M12 2v20" />
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7H14a3.5 3.5 0 0 1 0 7H6" />

                        </svg>

                        <select id="role" name="role" required>

                            <option value="pemohon">
                                Pemohon
                            </option>

                            <option value="donor">
                                Donor
                            </option>

                        </select>

                    </div>

                    <x-input-error :messages="$errors->get('role')" class="mt-2" />

                </div>

                {{-- CONFIRM PASSWORD --}}
                <div class="field-group">

                    <label class="field-label">
                        Konfirmasi Password
                    </label>

                    <div class="field-wrap">

                        <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">

                            <rect x="3" y="11" width="18" height="11" rx="2" />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />

                        </svg>

                        <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="••••••••" required />

                    </div>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn-register">
                    DAFTAR
                </button>

                {{-- LOGIN --}}
                <div class="login-row">

                    Sudah punya akun?

                    <a href="{{ route('login') }}">
                        Masuk Sekarang
                    </a>

                </div>

            </form>

            <div class="card-footer-line">

                <div class="footer-dot"></div>

                <span>Sistem Informasi Donor Darah</span>

                <div class="footer-dot"></div>

            </div>

        </div>

    </div>

</body>

</html>
