<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'MTsN 10 Tasikmalaya')</title>

    {{-- Bootstrap CSS --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            background: #f3f8f5;
            color: #263b2e;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* =========================
           NAVBAR
        ========================= */
        .navbar-sekolah {
            position: relative;
            z-index: 1000;
            flex-shrink: 0;
            min-height: 96px;
            padding: 12px 0;
            background: #fff;
            border-bottom: 1px solid #e5eee8;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .03);
        }

        .navbar-sekolah .container-fluid {
            padding-left: 3%;
            padding-right: 3%;
        }

        .brand-sekolah {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-shrink: 0;
            margin-right: 20px;
            text-decoration: none;
        }

        .logo-sekolah {
            display: block;
            width: 56px;
            height: 56px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .nama-sekolah {
            margin: 0;
            color: #14532d;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.4;
            white-space: nowrap;
        }

        .deskripsi-sekolah {
            display: block;
            margin-top: 2px;
            color: #52645a;
            font-size: 12px;
        }

        .navbar-sekolah .navbar-nav {
            gap: 4px;
        }

        .navbar-sekolah .nav-link {
            padding: 12px 10px;
            color: #43554a;
            font-size: 15px;
            font-weight: 600;
            white-space: nowrap;
            transition: color .2s ease;
        }

        .navbar-sekolah .nav-link:hover,
        .navbar-sekolah .nav-link.active {
            color: #198754;
        }

        .navbar-sekolah .navbar-toggler {
            border: 1px solid #dce8df;
            padding: 7px 10px;
        }

        .navbar-sekolah .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(25, 135, 84, .15);
        }

        /* =========================
           KONTEN HALAMAN
        ========================= */
        main {
            flex: 1 0 auto;
            width: 100%;
        }

        /* =========================
           FOOTER HIJAU
        ========================= */
        .footer-sekolah {
            display: block;
            width: 100%;
            margin-top: auto;
            padding: 38px 0 18px;
            background: linear-gradient(
                110deg,
                #14532d 0%,
                #198754 55%,
                #229c68 100%
            );
            color: #fff;
        }

        .footer-container {
            width: 100%;
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr .8fr 1fr;
            gap: 50px;
            padding-bottom: 30px;
        }

        .footer-column h5 {
            margin: 0 0 15px;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
        }

        /* Identitas sekolah */
        .footer-identitas {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .footer-logo {
            display: block;
            width: 52px;
            height: 52px;
            flex-shrink: 0;
            object-fit: contain;
        }

        .footer-identitas h5 {
            margin: 0 0 4px;
            font-size: 16px;
            font-weight: 700;
        }

        .footer-identitas p {
            margin: 0;
            color: rgba(255, 255, 255, .78);
            font-size: 12px;
        }

        .footer-deskripsi {
            margin: 0;
            color: rgba(255, 255, 255, .8);
            font-size: 13px;
            line-height: 1.8;
            text-align: justify;
        }

        /* Menu footer */
        .footer-menu {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .footer-menu a {
            width: fit-content;
            color: rgba(255, 255, 255, .88);
            font-size: 13px;
            text-decoration: none;
            transition: .2s ease;
        }

        .footer-menu a:hover {
            color: #fff;
            padding-left: 4px;
        }

        /* Kontak footer */
        .footer-kontak p {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 0 0 12px;
            color: rgba(255, 255, 255, .9);
            font-size: 13px;
            line-height: 1.7;
        }

        .footer-kontak i {
            margin-top: 3px;
            color: #fff;
            font-size: 14px;
            flex-shrink: 0;
        }

        /* Copyright */
        .footer-bottom {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 17px;
            border-top: 1px solid rgba(255, 255, 255, .22);
            color: rgba(255, 255, 255, .75);
            font-size: 12px;
            text-align: center;
        }

        /* =========================
           RESPONSIVE NAVBAR
        ========================= */
        @media (max-width: 1399px) {
            .navbar-sekolah .container-fluid {
                padding-right: 20px;
                padding-left: 20px;
            }

            .brand-sekolah {
                margin-right: 10px;
            }

            .navbar-sekolah .nav-link {
                padding: 10px 7px;
                font-size: 14px;
            }

            .nama-sekolah {
                font-size: 18px;
            }
        }

        @media (max-width: 1199px) {
            .navbar-sekolah .navbar-collapse {
                padding-top: 15px;
            }

            .navbar-sekolah .navbar-nav {
                align-items: stretch !important;
                gap: 0;
            }

            .navbar-sekolah .nav-link {
                padding: 11px 0;
                border-bottom: 1px solid #f0f3f0;
            }
        }

        /* =========================
           RESPONSIVE MOBILE
        ========================= */
        @media (max-width: 768px) {
            .footer-sekolah {
                padding-top: 30px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 27px;
                padding-bottom: 25px;
            }

            .footer-deskripsi {
                text-align: left;
            }
        }

        @media (max-width: 600px) {
            .navbar-sekolah .container-fluid {
                padding-right: 15px;
                padding-left: 15px;
            }

            .brand-sekolah {
                gap: 9px;
                margin-right: 8px;
            }

            .logo-sekolah {
                width: 45px;
                height: 45px;
            }

            .nama-sekolah {
                font-size: 15px;
            }

            .deskripsi-sekolah {
                font-size: 10px;
            }

            .footer-container {
                padding-right: 20px;
                padding-left: 20px;
            }
        }
    </style>

    {{-- CSS tambahan dari halaman --}}
    @stack('styles')
</head>

<body>

    {{-- =========================
         NAVBAR UTAMA
    ========================= --}}
    <nav class="navbar navbar-expand-xl navbar-light navbar-sekolah">
        <div class="container-fluid">

            {{-- LOGO DAN IDENTITAS SEKOLAH --}}
            <a class="brand-sekolah" href="{{ route('home') }}">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo MTsN 10 Tasikmalaya"
                    class="logo-sekolah"
                >

                <div>
                    <div class="nama-sekolah">
                        MTsN 10 Tasikmalaya
                    </div>

                    <span class="deskripsi-sekolah">
                        Sistem Informasi Sekolah
                    </span>
                </div>
            </a>

            {{-- TOMBOL MENU RESPONSIF --}}
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSekolah"
                aria-controls="navbarSekolah"
                aria-expanded="false"
                aria-label="Buka navigasi"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- MENU NAVIGASI --}}
            <div class="collapse navbar-collapse" id="navbarSekolah">
                <ul class="navbar-nav ms-auto align-items-xl-center">

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}"
                        >
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->is('profil-sekolah*') ? 'active' : '' }}"
                            href="{{ url('/profil-sekolah') }}"
                        >
                            Profil Sekolah
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->is('guru*') ? 'active' : '' }}"
                            href="{{ url('/guru') }}"
                        >
                            Staf &amp; Guru
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->is('siswa*') ? 'active' : '' }}"
                            href="{{ url('/siswa') }}"
                        >
                            Siswa
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->is('berita*') ? 'active' : '' }}"
                            href="{{ url('/berita') }}"
                        >
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->is('galeri*') ? 'active' : '' }}"
                            href="{{ url('/galeri') }}"
                        >
                            Galeri
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->is('ekstrakurikuler*') ? 'active' : '' }}"
                            href="{{ url('/ekstrakurikuler') }}"
                        >
                            Ekstrakurikuler
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('profil_pembuat.public') ? 'active' : '' }}"
                            href="{{ route('profil_pembuat.public') }}"
                        >
                            Profil Pembuat
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    {{-- =========================
         KONTEN SETIAP HALAMAN
    ========================= --}}
    <main>
        @yield('content')
    </main>

    {{-- =========================
         FOOTER HIJAU MTsN 10
    ========================= --}}
    <footer class="footer-sekolah">
        <div class="footer-container">

            <div class="footer-content">

                {{-- KOLOM 1: IDENTITAS SEKOLAH --}}
                <div class="footer-column">

                    <div class="footer-identitas">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Logo MTsN 10 Tasikmalaya"
                            class="footer-logo"
                        >

                        <div>
                            <h5>MTsN 10 TASIKMALAYA</h5>
                            <p>Sistem Informasi Sekolah</p>
                        </div>
                    </div>

                    <p class="footer-deskripsi">
                        MTsN 10 Tasikmalaya berkomitmen memberikan pendidikan
                        berkualitas, membangun karakter peserta didik,
                        meningkatkan prestasi, serta membentuk generasi
                        yang berilmu, mandiri, dan berakhlak mulia.
                    </p>

                </div>

                {{-- KOLOM 2: MENU --}}
                <div class="footer-column">
                    <h5>Menu</h5>

                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Beranda</a>
                        <a href="{{ url('/profil-sekolah') }}">Profil Sekolah</a>
                        <a href="{{ url('/guru') }}">Staf &amp; Guru</a>
                        <a href="{{ url('/siswa') }}">Siswa</a>
                        <a href="{{ url('/berita') }}">Berita</a>
                        <a href="{{ url('/galeri') }}">Galeri</a>
                        <a href="{{ url('/ekstrakurikuler') }}">Ekstrakurikuler</a>
                        <a href="{{ route('profil_pembuat.public') }}">Profil Pembuat</a>
                    </div>
                </div>

                {{-- KOLOM 3: KONTAK --}}
                <div class="footer-column footer-kontak">
                    <h5>Kontak</h5>

                    <p>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>
                            MTsN 10 Tasikmalaya<br>
                            Tasikmalaya, Jawa Barat, Indonesia
                        </span>
                    </p>

                    <p>
                        <i class="bi bi-envelope-fill"></i>
                        <span>Informasi sekolah</span>
                    </p>
                </div>

            </div>

            {{-- COPYRIGHT --}}
            <div class="footer-bottom">
                &copy; {{ date('Y') }} MTsN 10 Tasikmalaya.
                Seluruh hak cipta dilindungi.
            </div>

        </div>
    </footer>

    {{-- BOOTSTRAP JAVASCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- JavaScript tambahan dari halaman --}}
    @stack('scripts')

</body>
</html>
