<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin - SMKS Singaparna')
    </title>


    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    {{-- CSS bawaan template --}}
    <link rel="stylesheet"
        href="{{ asset('css/styles.min.css') }}">


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;

            font-family: Arial, Helvetica, sans-serif;

            background: #f4f7fb;

            color: #172b4d;
        }


        /* ========================================
           SIDEBAR
        ======================================== */

        .left-sidebar {
            position: fixed;

            top: 0;
            left: 0;

            width: 250px;
            height: 100vh;

            z-index: 1000;

            background: linear-gradient(
                180deg,
                #155a98 0%,
                #176db0 100%
            );

            color: white;

            overflow-y: auto;
        }


        /* ========================================
           LOGO
        ======================================== */

        .brand-logo {
            height: 70px;

            display: flex;
            align-items: center;

            padding: 0 22px;

            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .brand-logo a {
            color: white;

            text-decoration: none;

            font-size: 18px;

            font-weight: 700;
        }

        .brand-logo i {
            font-size: 24px;

            margin-right: 10px;
        }


        /* ========================================
           SIDEBAR MENU
        ======================================== */

        .sidebar-nav {
            padding: 20px 12px;
        }

        .sidebar-nav ul {
            list-style: none;

            padding: 0;

            margin: 0;
        }

        .sidebar-nav li {
            margin-bottom: 6px;
        }

        .sidebar-nav a,
        .sidebar-nav button {
            width: 100%;

            display: flex;

            align-items: center;

            gap: 13px;

            padding: 12px 15px;

            border: none;

            border-radius: 8px;

            background: transparent;

            color: rgba(255,255,255,0.9);

            text-decoration: none;

            font-size: 14px;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .sidebar-nav a i,
        .sidebar-nav button i {
            width: 22px;

            font-size: 19px;
        }

        .sidebar-nav a:hover,
        .sidebar-nav button:hover {
            background: rgba(255,255,255,0.13);

            color: white;
        }

        .sidebar-nav a.active {
            background: rgba(255,255,255,0.18);

            color: white;

            font-weight: 600;
        }


        /* ========================================
           LOGOUT
        ======================================== */

        .logout-form {
            margin: 0;
        }

        .logout-form button {
            text-align: left;
        }


        /* ========================================
           HEADER
        ======================================== */

        .app-header {
            position: fixed;

            top: 0;
            right: 0;
            left: 250px;

            height: 75px;

            background: white;

            border-bottom: 1px solid #e9eef5;

            z-index: 999;

            display: flex;

            align-items: center;
        }

        .header-inner {
            width: 100%;

            padding: 0 28px;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }

        .header-title {
            font-size: 20px;

            font-weight: 700;

            color: #17365d;

            margin: 0;
        }


        /* ========================================
           PROFILE HEADER
        ======================================== */

        .header-profile {
            display: flex;

            align-items: center;

            gap: 12px;
        }

        .profile-icon {
            width: 42px;
            height: 42px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #e8f2fc;

            color: #155a98;

            font-size: 20px;
        }

        .profile-info {
            line-height: 1.2;
        }

        .profile-name {
            font-size: 14px;

            font-weight: 700;

            color: #172b4d;
        }

        .profile-role {
            margin-top: 4px;

            font-size: 12px;

            color: #8492a6;
        }


        /* ========================================
           MAIN CONTENT
        ======================================== */

        .body-wrapper {
            margin-left: 250px !important;

            padding-top: 75px !important;

            min-height: calc(100vh - 75px) !important;

            margin-top: 0 !important;
        }

        .body-wrapper-inner {
            padding: 20px 30px 30px !important;

            margin: 0 !important;
        }

        .container-fluid {
            width: 100%;

            padding: 0 !important;

            margin: 0 !important;
        }


        /* ========================================
           FIX POSISI HALAMAN
        ======================================== */

        .body-wrapper,
        .body-wrapper-inner,
        .body-wrapper .container-fluid {
            margin-top: 0 !important;
        }

        .body-wrapper-inner {
            padding-top: 20px !important;
        }

        .top-header {
            margin-top: 0 !important;

            padding-top: 0 !important;
        }

        .dashboard-content {
            margin-top: 0 !important;
        }


        /* ========================================
           GENERAL CARD
        ======================================== */

        .card-custom {
            background: white;

            border-radius: 12px;

            border: 1px solid #edf1f6;

            box-shadow: 0 3px 15px rgba(30, 60, 90, 0.05);

            padding: 24px;
        }


        /* ========================================
           USER PAGE
        ======================================== */

        .top-header {
            margin-bottom: 20px;
        }

        .top-header h3 {
            color: #0b315f;

            font-size: 24px;

            font-weight: 700;

            margin-bottom: 5px;
        }

        .top-header p {
            color: #7890a8;

            font-size: 14px;

            margin-bottom: 0;
        }

        .card-title-custom {
            color: #17365d;

            font-size: 16px;

            font-weight: 600;
        }

        .btn-tambah {
            display: inline-flex;

            align-items: center;

            padding: 9px 15px;

            border-radius: 7px;

            background: #155a98;

            color: white;

            text-decoration: none;

            font-size: 14px;

            border: none;
        }

        .btn-tambah:hover {
            background: #104b80;

            color: white;
        }

        .btn-edit {
            display: inline-flex;

            align-items: center;

            padding: 6px 10px;

            border-radius: 6px;

            background: transparent;

            color: #17365d;

            text-decoration: none;

            font-size: 13px;

            border: 1px solid #dce4ed;
        }

        .btn-edit:hover {
            background: #f4f7fb;

            color: #155a98;
        }

        .btn-hapus {
            display: inline-flex;

            align-items: center;

            padding: 6px 10px;

            border-radius: 6px;

            background: transparent;

            color: #dc3545;

            font-size: 13px;

            border: 1px solid #f1c5ca;
        }

        .btn-hapus:hover {
            background: #fff5f5;
        }

        .badge-admin {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            background: #e8f2fc;

            color: #155a98;

            font-size: 12px;

            font-weight: 600;
        }

        .badge-operator {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            background: #edf7ed;

            color: #3c7d3c;

            font-size: 12px;

            font-weight: 600;
        }


        /* ========================================
           BUTTON
        ======================================== */

        .btn-primary-custom {
            background: #155a98;

            border: none;

            color: white;

            padding: 10px 18px;

            border-radius: 7px;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            gap: 7px;

            transition: 0.2s;
        }

        .btn-primary-custom:hover {
            background: #104b80;

            color: white;
        }


        /* ========================================
           TABLE
        ======================================== */

        .table-custom {
            width: 100%;

            border-collapse: collapse;
        }

        .table-custom th {
            background: #f6f9fc;

            color: #526581;

            font-size: 13px;

            font-weight: 600;

            padding: 14px;

            text-align: left;
        }

        .table-custom td {
            padding: 14px;

            border-top: 1px solid #edf1f6;

            font-size: 14px;
        }


        /* ========================================
           ALERT
        ======================================== */

        .alert {
            border-radius: 8px;
        }


        /* ========================================
           FOOTER
        ======================================== */

        .main-footer {
            margin-left: 250px;

            margin-top: 0;

            padding: 20px 0;

            text-align: center;

            color: #8a99ad;

            font-size: 13px;
        }


        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 991px) {

            .left-sidebar {
                width: 220px;
            }

            .app-header {
                left: 220px;
            }

            .body-wrapper {
                margin-left: 220px !important;
            }

            .main-footer {
                margin-left: 220px;
            }

        }


        @media (max-width: 768px) {

            .left-sidebar {
                width: 70px;
            }

            .brand-logo {
                justify-content: center;

                padding: 0;
            }

            .brand-logo span {
                display: none;
            }

            .sidebar-nav a span,
            .sidebar-nav button span {
                display: none;
            }

            .sidebar-nav a,
            .sidebar-nav button {
                justify-content: center;

                padding: 13px 8px;
            }

            .app-header {
                left: 70px;
            }

            .body-wrapper {
                margin-left: 70px !important;
            }

            .main-footer {
                margin-left: 70px;
            }

            .profile-info {
                display: none;
            }

        }

    </style>


    @yield('css')

</head>


<body>


{{-- =========================================================
     SIDEBAR
========================================================= --}}

<aside class="left-sidebar">


    {{-- =====================================================
         LOGO
    ====================================================== --}}

    <div class="brand-logo">

        <a href="{{ url('/') }}">

            <i class="bi bi-mortarboard-fill"></i>

            <span>
                SMKS Singaparna
            </span>

        </a>

    </div>


    {{-- =====================================================
         MENU
    ====================================================== --}}

    <div class="sidebar-nav">

        <ul>


            {{-- =================================================
                 DASHBOARD
            ================================================== --}}

            <li>

                <a href="{{ url('/') }}"
                   class="{{ request()->is('/') ? 'active' : '' }}">

                    <i class="bi bi-house-door"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>


            {{-- =================================================
                 PROFIL SEKOLAH
            ================================================== --}}

            <li>

                <a href="{{ url('/profile-sekolah') }}"
                   class="{{ request()->is('profile-sekolah*') ? 'active' : '' }}">

                    <i class="bi bi-building"></i>

                    <span>
                        Profil Sekolah
                    </span>

                </a>

            </li>


            {{-- =================================================
                 DATA GURU
            ================================================== --}}

            <li>

                <a href="{{ url('/admin/guru') }}"
                   class="{{ request()->is('admin/guru*') ? 'active' : '' }}">

                    <i class="bi bi-person-badge"></i>

                    <span>
                        Data Guru
                    </span>

                </a>

            </li>


            {{-- =================================================
                 DATA SISWA
            ================================================== --}}

            <li>

                <a href="{{ url('/admin/siswa') }}"
                   class="{{ request()->is('admin/siswa*') ? 'active' : '' }}">

                    <i class="bi bi-people"></i>

                    <span>
                        Data Siswa
                    </span>

                </a>

            </li>


            {{-- =================================================
                 BERITA
            ================================================== --}}

            <li>

                <a href="{{ url('/admin/berita') }}"
                   class="{{ request()->is('admin/berita*') ? 'active' : '' }}">

                    <i class="bi bi-newspaper"></i>

                    <span>
                        Berita
                    </span>

                </a>

            </li>


            {{-- =================================================
                 GALERI
            ================================================== --}}

            <li>

                <a href="{{ url('/admin/galeri') }}"
                   class="{{ request()->is('admin/galeri*') ? 'active' : '' }}">

                    <i class="bi bi-images"></i>

                    <span>
                        Galeri
                    </span>

                </a>

            </li>


            {{-- =================================================
                 EKSTRAKURIKULER
            ================================================== --}}

            <li>

                <a href="{{ url('/admin/ekstrakurikuler') }}"
                   class="{{ request()->is('admin/ekstrakurikuler*') ? 'active' : '' }}">

                    <i class="bi bi-trophy"></i>

                    <span>
                        Ekstrakurikuler
                    </span>

                </a>

            </li>


            {{-- =================================================
                 USER
            ================================================== --}}

            <li>

                <a href="{{ url('/admin/user') }}"
                   class="{{ request()->is('admin/user') || request()->is('admin/user/*') ? 'active' : '' }}">

                    <i class="bi bi-person-gear"></i>

                    <span>
                        User
                    </span>

                </a>

            </li>


            {{-- =================================================
                 LOGOUT
            ================================================== --}}

            <li>

                <form action="{{ url('/logout') }}"
                      method="POST"
                      class="logout-form">

                    @csrf

                    <button type="submit"
                            onclick="return confirm('Anda yakin ingin keluar?')">

                        <i class="bi bi-box-arrow-right"></i>

                        <span>
                            Logout
                        </span>

                    </button>

                </form>

            </li>


        </ul>

    </div>

</aside>



{{-- =========================================================
     HEADER
========================================================= --}}

<header class="app-header">

    <div class="header-inner">


        {{-- =================================================
             JUDUL HALAMAN
        ================================================== --}}

        <div>

            <h5 class="header-title">

                @yield('title', 'Dashboard - SMKS Singaparna')

            </h5>

        </div>


        {{-- =================================================
             PROFILE
        ================================================== --}}

        <div class="header-profile">

            <div class="profile-icon">

                <i class="bi bi-person-fill"></i>

            </div>


            <div class="profile-info">

                <div class="profile-name">

                    {{ session('username', 'Admin') }}

                </div>

                <div class="profile-role">

                    {{ session('role', 'Admin') }}

                </div>

            </div>

        </div>


    </div>

</header>



{{-- =========================================================
     ISI HALAMAN
========================================================= --}}

<main class="body-wrapper">

    <div class="body-wrapper-inner">

        <div class="container-fluid">

            @yield('content')

        </div>

    </div>

</main>



{{-- =========================================================
     FOOTER
========================================================= --}}

<footer class="main-footer">

    © {{ date('Y') }} SMKS Singaparna

</footer>



{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@yield('js')


</body>

</html>