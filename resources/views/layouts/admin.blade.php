<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ config('app.name', 'Donor Darah') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="color-scheme" content="light dark" />

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
        onload="this.media='all'" />

    {{-- OverlayScrollbars --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <style>
        .app-sidebar {
            background-color: #7f1d1d !important;
            border-right: none !important;
        }

        .sidebar-brand {
            background-color: #6b1919 !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding: 14px 16px !important;
        }

        .brand-link {
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            text-decoration: none !important;
        }

        .brand-image {
            width: 32px !important;
            height: 32px !important;
            border-radius: 8px !important;
            object-fit: cover !important;
        }

        .brand-text {
            color: #ffffff !important;
            font-size: 15px !important;
            font-weight: 500 !important;
            letter-spacing: 0.01em !important;
        }

        /* Nav item & link */
        .sidebar-menu .nav-item {
            margin: 1px 8px !important;
        }

        .sidebar-menu .nav-link {
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            padding: 9px 12px !important;
            border-radius: 8px !important;
            color: rgba(255, 255, 255, 0.6) !important;
            font-size: 13px !important;
            font-weight: 400 !important;
            transition: background 0.15s, color 0.15s !important;
            text-decoration: none !important;
        }

        .sidebar-menu .nav-link:hover {
            background: rgba(255, 255, 255, 0.08) !important;
            color: #ffffff !important;
        }

        .sidebar-menu .nav-link.active {
            background: rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            font-weight: 500 !important;
        }

        /* Ikon */
        .sidebar-menu .nav-icon {
            font-size: 16px !important;
            flex-shrink: 0 !important;
            width: 18px !important;
            text-align: center !important;
        }

        /* Teks menu */
        .sidebar-menu .nav-link p {
            margin: 0 !important;
            line-height: 1 !important;
        }
    </style>
    @stack('styles')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        @include('layouts.admin.navbar')
        @include('layouts.admin.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                @yield('header')
            </div>
            <div class="app-content">
                @yield('content')
            </div>
        </main>

        @include('layouts.admin.footer')

    </div>

    {{-- OverlayScrollbars --}}
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    {{-- Popper --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    {{-- AdminLTE --}}
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector('.sidebar-wrapper');

            if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: 'os-theme-light',
                        autoHide: 'leave',
                        clickScroll: true,
                    },
                });
            }
        });
    </script>

    @stack('scripts')

    <script>
        var _0x4a21 = [
            "\x25\x63\x4B\x65\x66\x69\x6E\x20\x50\x69\x72\x69",
            "\x63\x6F\x6C\x6F\x72\x3A\x67\x72\x65\x65\x6E\x3B\x20\x66\x6F\x6E\x74\x2D\x73\x69\x7A\x65\x3A\x32\x35\x70\x78",
            "\x6C\x6F\x67"
        ];

        console[_0x4a21[2]](_0x4a21[0], _0x4a21[1]);
    </script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>

</html>
