<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BPS Provinsi Kalimantan Barat')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-md bg-primary fixed-top" data-bs-theme="dark">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-uppercase" href="/">
            <img src="/images/logo.webp" alt="Logo" height="40">
            <span class="fs-6">BPS Provinsi Kalimantan Barat</span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menuUtama">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="menuUtama">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('publikasi') ? 'active' : '' }}"
                       href="{{ route('publikasi.index') }}">Publikasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('publikasi/form') ? 'active' : '' }}"
                       href="{{ route('publikasi.form') }}">Tambah Publikasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="flex-grow-1">
    @yield('content')
</main>

<footer class="text-center text-muted small py-3 border-top mt-auto">
    &copy; {{ date('Y') }} BPS Provinsi Kalimantan Barat
</footer>

</body>
</html>