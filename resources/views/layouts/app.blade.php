<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield(
            'title',
            isset($profil)
                ? ($profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya')
                : 'MTsN 10 Tasikmalaya'
        )
    </title>

    {{-- BOOTSTRAP --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- BOOTSTRAP ICONS --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    {{-- GLOBAL CSS --}}
    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 75px;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f8f5;
            color: #17365d;
        }

        /* NAVBAR */
        .main-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5eee8;
            position: sticky;
            top: 0;
            z-index: 999;
            min-height: 72px;
        }

        .main-navbar .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            color: #14532d !important;
            text-decoration: none;
        }

        /* LOGO SEKOLAH */
        .main-navbar .navbar-brand img {
            width: 42px !important;
            height: 42px !important;
            max-width: 42px !important;
            max-height: 42px !important;
            min-width: 42px;
            min-height: 42px;
            object-fit: contain;
            display: block;
        }

        /* LOGO DEFAULT */
        .navbar-brand-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            min-height: 42px;
            border-radius: 10px;
            background: #198754;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-brand-icon i {
            font-size: 21px;
        }

        /* NAMA SEKOLAH */
        .navbar-brand-text strong {
            display: block;
            font-size: 14px;
            line-height: 1.2;
            color: #14532d;
        }

        .navbar-brand-text span {
            display: block;
            font-size: 9px;
            color: #78908a;
            margin-top: 2px;
        }

        /* MENU NAVBAR */
        .navbar-nav .nav-link {
            color: #4e655c !important;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 12px !important;
            transition: color .2s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #198754 !important;
        }

        /* FOOTER */
        .footer-new {
            width: 100%;
            margin: 0;
            padding: 45px 0 20px;
            background: linear-gradient(
                105deg,
                #0f4d2b 0%,
                #14532d 45%,
                #198754 100%
            );
            color: #ffffff;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.7fr .8fr 1fr;
            column-gap: 55px;
            padding-bottom: 25px;
        }

        .footer-description,
        .footer-links,
        .footer-contact-new {
            padding-top: 5px;
        }

        .footer-description h3 {
            margin: 0 0 12px;
            color: #ffffff;
            font-size: 17px;
            line-height: 1.3;
            font-weight: 700;
            text-transform: uppercase;
        }

        .footer-description p {
            margin: 0;
            max-width: 500px;
            color: rgba(255, 255, 255, .75);
            font-size: 13px;
            line-height: 1.65;
        }

        .footer-links h4,
        .footer-contact-new h4 {
            margin: 0 0 14px;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
        }

        .footer-links a {
            display: block;
            width: max-content;
            max-width: 100%;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, .80);
            text-decoration: none;
            font-size: 13px;
            line-height: 1.45;
            transition: .2s ease;
        }

        .footer-links a:hover {
            color: #ffffff;
            padding-left: 4px;
        }

        .footer-contact-row {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin-bottom: 12px;
            color: rgba(255, 255, 255, .82);
            font-size: 13px;
            line-height: 1.55;
        }

        .footer-contact-row i {
            width: 18px;
            min-width: 18px;
            margin-top: 3px;
            color: #ffffff;
            font-size: 14px;
        }

        .footer-contact-row span {
            display: block;
            max-width: 270px;
            overflow-wrap: anywhere;
        }

        .footer-copyright-new {
            width: 100%;
            border-top: 1px solid rgba(255, 255, 255, .22);
            padding-top: 15px;
            text-align: center;
            color: rgba(255, 255, 255, .65);
            font-size: 12px;
            line-height: 1.5;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }

            .footer-description {
                grid-column: 1 / -1;
            }

            .main-navbar .navbar-collapse {
                padding: 10px 0 15px;
            }

            .navbar-nav .nav-link {
                padding: 10px 0 !important;
            }
        }

        @media (max-width: 575px) {
            .footer-grid {
                display: block;
            }

            .footer-description,
            .footer-links,
            .footer-contact-new {
                margin-bottom: 28px;
            }

            .footer-description h3 {
                font-size: 16px;
            }

            .footer-description p,
            .footer-links a,
            .footer-contact-row {
                font-size: 12px;
            }

            .footer-copyright-new {
                font-size: 11px;
            }
        }
    </style>

    {{-- CSS KHUSUS HALAMAN --}}
    @stack('styles')
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg main-navbar">
        <div class="container">

            {{-- LOGO + NAMA SEKOLAH --}}
            <a href="{{ route('home') }}" class="navbar-brand">

                @if(isset($profil) && $profil->logo)
                    <img
                        src="{{ asset('storage/' . $profil->logo) }}"
                        alt="Logo {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                    >
                @else
                    <div class="navbar-brand-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                @endif

                <div class="navbar-brand-text">
                    <strong>
                        {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
                    </strong>
                    <span>Sistem Informasi Sekolah</span>
                </div>

            </a>

            {{-- TOGGLE MOBILE --}}
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- MENU NAVBAR --}}
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profil.public') }}">
                            Profil Sekolah
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guru.public') }}">
                            Staf & Guru
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('berita.public') }}">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeri.public') }}">
                            Galeri
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('home') }}#ekstrakurikuler"
                        >
                            Ekstrakurikuler
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    {{-- KONTEN HALAMAN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="footer-new">
        <div class="container">

            <div class="footer-grid">

                {{-- DESKRIPSI SEKOLAH --}}
                <div class="footer-description">
                    <h3>
                        {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
                    </h3>

                    <p>
                        {{ $profil->deskripsi ??
                            'MTsN 10 Tasikmalaya merupakan lembaga pendidikan yang berkomitmen memberikan pendidikan berkualitas dengan memadukan ilmu pengetahuan, pendidikan agama, akhlak, kedisiplinan, serta pengembangan prestasi siswa.'
                        }}
                    </p>
                </div>

                {{-- MENU FOOTER --}}
                <div class="footer-links">
                    <h4>Menu</h4>

                    <a href="{{ route('home') }}">
                        Beranda
                    </a>

                    <a href="{{ route('profil.public') }}">
                        Profil Sekolah
                    </a>

                    <a href="{{ route('guru.public') }}">
                        Staf & Guru
                    </a>

                    <a href="{{ route('berita.public') }}">
                        Berita
                    </a>

                    <a href="{{ route('galeri.public') }}">
                        Galeri
                    </a>

                    <a href="{{ route('home') }}#ekstrakurikuler">
                        Ekstrakurikuler
                    </a>
                </div>

                {{-- KONTAK --}}
                <div class="footer-contact-new">
                    <h4>Kontak</h4>

                    <div class="footer-contact-row">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>
                            {{ $profil->alamat ?? 'Alamat sekolah belum tersedia' }}
                        </span>
                    </div>

                    <div class="footer-contact-row">
                        <i class="bi bi-telephone-fill"></i>
                        <span>
                            {{ $profil->kontak ?? $profil->telepon ?? '-' }}
                        </span>
                    </div>
                </div>

            </div>

            {{-- COPYRIGHT --}}
            <div class="footer-copyright-new">
                &copy; {{ date('Y') }}
                {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
                — Sistem Informasi Sekolah
            </div>

        </div>
    </footer>

    {{-- BOOTSTRAP JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')

</body>
</html>
