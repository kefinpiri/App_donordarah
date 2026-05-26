<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Donor Darah</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

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
            background: #0a0a0a;
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }

        .login-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(180, 0, 0, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(180, 0, 0, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .login-card {
            position: relative;
            width: 100%;
            max-width: 420px;
            background: rgba(15, 5, 5, 0.88);
            border: 1px solid rgba(180, 0, 0, 0.25);
            border-radius: 28px;
            padding: 1.5rem 2rem;
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.7),
                0 0 50px rgba(139, 0, 0, 0.15);
            backdrop-filter: blur(20px);
        }

        .card-accent {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 90px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #ff3b30, transparent);
        }

        .login-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .login-badge {
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

        .login-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ff3b30;
        }

        .login-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 3rem;
            letter-spacing: .06em;
            color: #fff;
            margin-bottom: .2rem;
        }

        .login-title span {
            color: #ff4d4d;
        }

        .login-subtitle {
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

        #email,
        #password {
            width: 100%;
            padding: 13px 16px 13px 46px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.04);
            color: white;
            outline: none;
            transition: .3s;
        }

        #email:focus,
        #password:focus {
            border-color: rgba(255, 90, 90, 0.7);
            box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.12);
        }

        .meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.45);
            font-size: .85rem;
        }

        .forgot-link {
            color: #ff5c5c;
            text-decoration: none;
            font-size: .82rem;
        }

        .btn-login {
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
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 0, 0, 0.25);
        }

        .register-row {
            margin-top: 1rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.3);
            font-size: .85rem;
        }

        .register-row a {
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
    </style>

    <div class="login-wrapper">

        <div class="login-card">

            <div class="card-accent"></div>

            <div class="login-header">

                <div class="login-badge">
                    Portal Akses
                </div>

                <h1 class="login-title">
                    DONOR<span>DARAH</span>
                </h1>

                <p class="login-subtitle">
                    Dashboard Pengelolaan
                </p>

            </div>

            <div class="divider">
                <span>Masuk ke Akun</span>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="field-group">

                    <label class="field-label">
                        Email / Nama Pengguna
                    </label>

                    <div class="field-wrap">

                        <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">

                            <path d="M4 4h16v16H4z" />
                            <path d="m22 6-10 7L2 6" />

                        </svg>

                        <x-text-input id="email" type="email" name="email" :value="old('email')"
                            placeholder="admin@gmail.com" required autofocus />

                    </div>

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                </div>

                {{-- PASSWORD --}}
                <div class="field-group">

                    <label class="field-label">
                        Kata Sandi
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

                {{-- META --}}
                <div class="meta-row">

                    <label class="remember-label">

                        <input type="checkbox" name="remember">

                        <span>Ingat saya</span>

                    </label>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">

                            Lupa kata sandi?

                        </a>
                    @endif

                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn-login">
                    MASUK
                </button>

                {{-- REGISTER --}}
                <div class="register-row">

                    Belum punya akun?

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            Daftar Sekarang
                        </a>
                    @endif

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
