<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard - SMKS Singaparna')</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- Tabler Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.31.0/dist/tabler-icons.min.css">

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            background: #f6f8fc;
            color: #2a3547;
            font-family: "Segoe UI", Arial, sans-serif;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .left-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;

            width: 225px;

            background: #ffffff;

            border-right: 1px solid #e9edf2;

            z-index: 1100;

            display: flex;
            flex-direction: column;

            overflow: hidden;
        }


        /* =====================================================
           LOGO SEKOLAH
        ===================================================== */

        .sidebar-brand {
            height: 75px;

            flex-shrink: 0;

            display: flex;
            align-items: center;

            padding: 0 20px;

            background: #ffffff;

            border-bottom: 1px solid #f0f2f5;
        }

        .sidebar-brand a {
            width: 100%;

            display: flex;
            align-items: center;

            text-decoration: none;
        }

        .sidebar-logo {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: #edf3ff;
            color: #5d87ff;

            font-size: 20px;

            margin-right: 10px;
        }

        .sidebar-school-name {
            color: #2a3547;

            font-size: 15px;
            font-weight: 700;

            line-height: 1.2;

            white-space: nowrap;
        }

        .sidebar-school-subtitle {
            display: block;

            color: #98a2b3;

            font-size: 9px;

            margin-top: 3px;

            white-space: nowrap;
        }


        /* =====================================================
           SIDEBAR NAVIGATION
        ===================================================== */

        .sidebar-nav {
            flex: 1;

            overflow-y: auto;
            overflow-x: hidden;

            padding: 18px 12px 10px;
        }

        .sidebar-nav ul {
            padding: 0;
            margin: 0;

            list-style: none;
        }

        .menu-title {
            padding: 12px 8px 7px;

            color: #8b95a7;

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .3px;
        }

        .sidebar-item {
            margin-bottom: 3px;
        }

        .sidebar-link {
            width: 100%;
            min-height: 38px;

            display: flex;
            align-items: center;

            gap: 11px;

            padding: 0 10px;

            border: none;
            border-radius: 6px;

            background: transparent;

            color: #4d5b73;

            font-size: 13px;
            font-weight: 500;

            text-decoration: none;

            transition: all .2s ease;
        }

        .sidebar-link i {
            width: 19px;

            flex-shrink: 0;

            text-align: center;

            color: #6f7d93;

            font-size: 17px;
        }


        /* Hover */

        .sidebar-link:hover {
            background: #f1f5ff;
            color: #2856b9;
        }

        .sidebar-link:hover i {
            color: #2856b9;
        }


        /* Menu aktif */

        .sidebar-item.active > .sidebar-link {
            background: #2856b9;

            color: #ffffff;

            font-weight: 600;

            box-shadow: 0 2px 5px rgba(40, 86, 185, .15);
        }

        .sidebar-item.active > .sidebar-link i {
            color: #ffffff;
        }


        /* Scrollbar */

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: #dfe4eb;
            border-radius: 10px;
        }


        /* =====================================================
           LOGOUT SIDEBAR
        ===================================================== */

        .sidebar-logout {
            flex-shrink: 0;

            padding: 10px 12px 15px;

            background: #ffffff;

            border-top: 1px solid #f0f2f5;
        }

        .sidebar-logout form {
            margin: 0;
        }

        .logout-button {
            width: 100%;
            min-height: 38px;

            display: flex;
            align-items: center;

            gap: 11px;

            padding: 0 10px;

            border: none;
            border-radius: 6px;

            background: transparent;

            color: #4d5b73;

            font-size: 13px;
            font-weight: 500;

            font-family: inherit;

            cursor: pointer;

            text-align: left;
        }

        .logout-button i {
            width: 19px;

            flex-shrink: 0;

            text-align: center;

            color: #6f7d93;

            font-size: 17px;
        }

        .logout-button:hover {
            background: #fff1f1;
            color: #dc3545;
        }

        .logout-button:hover i {
            color: #dc3545;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .app-header {
            position: fixed;

            top: 0;
            left: 225px;
            right: 0;

            height: 75px;

            background: #ffffff;

            border-bottom: 1px solid #edf0f5;

            box-shadow: 0 1px 6px rgba(0, 0, 0, .03);

            z-index: 1000;
        }

        .header-inner {
            width: 100%;
            height: 75px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 25px;
        }


        /* =====================================================
           NOTIFICATION
        ===================================================== */

        .header-left {
            display: flex;
            align-items: center;
        }

        .notification-button {
            position: relative;

            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: none;

            background: transparent;

            border-radius: 50%;

            color: #4d5b73;

            font-size: 20px;

            cursor: pointer;
        }

        .notification-button:hover {
            background: #f4f7fb;
            color: #2856b9;
        }

        .notification-dot {
            position: absolute;

            top: 7px;
            right: 7px;

            width: 7px;
            height: 7px;

            background: #2856b9;

            border-radius: 50%;

            border: 1px solid #ffffff;
        }


        /* =====================================================
           PROFILE HEADER
        ===================================================== */

        .header-profile {
            display: flex;
            align-items: center;

            gap: 9px;

            text-decoration: none;

            padding: 4px 7px;

            border-radius: 7px;
        }

        .header-profile:hover {
            background: #f7f9fc;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #fff3df;

            color: #f39c12;

            font-size: 18px;
        }

        .profile-detail {
            line-height: 1.2;
        }

        .profile-name {
            color: #2a3547;

            font-size: 13px;
            font-weight: 600;
        }

        .profile-role {
            color: #98a2b3;

            font-size: 10px;

            margin-top: 3px;
        }

        .profile-chevron {
            color: #98a2b3;

            font-size: 14px;
        }


        /* =====================================================
           DROPDOWN
        ===================================================== */

        .dropdown-menu {
            min-width: 190px;

            padding: 7px;

            margin-top: 8px !important;

            border: 1px solid #edf0f5 !important;

            border-radius: 8px !important;

            box-shadow: 0 8px 25px rgba(30, 60, 90, .10) !important;
        }

        .dropdown-item {
            padding: 8px 10px;

            border-radius: 6px;

            color: #536176;

            font-size: 13px;
        }

        .dropdown-item:hover {
            background: #f3f6ff;

            color: #2856b9;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .body-wrapper {
            margin-left: 225px;

            padding-top: 75px;

            min-height: 100vh;

            background: #f6f8fc;
        }

        .body-wrapper-inner {
            padding: 25px 30px 35px;
        }

        .container-fluid {
            width: 100%;

            padding: 0 !important;

            margin: 0 !important;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            .left-sidebar {
                transform: translateX(-100%);
            }

            .app-header {
                left: 0;
            }

            .body-wrapper {
                margin-left: 0;
            }

            .profile-detail,
            .profile-chevron {
                display: none;
            }

            .body-wrapper-inner {
                padding: 20px 15px;
            }
        }

    </style>

    @stack('styles')

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="left-sidebar">


    <!-- LOGO -->

    <div class="sidebar-brand">

        <a href="{{ url('/') }}">

            <div class="sidebar-logo">
                <i class="ti ti-school"></i>
            </div>

            <div>

                <div class="sidebar-school-name">
                    SMKS Singaparna
                </div>

                <span class="sidebar-school-subtitle">
                    Sistem Informasi Sekolah
                </span>

            </div>

        </a>

    </div>


    <!-- MENU -->

    <nav class="sidebar-nav">

        <ul>


            <!-- HOME -->

            <li class="menu-title">
                HOME
            </li>


            <!-- DASHBOARD -->

            <li class="sidebar-item {{ request()->is('/') ? 'active' : '' }}">

                <a
                    href="{{ url('/') }}"
                    class="sidebar-link">

                    <i class="ti ti-layout-dashboard"></i>

                    <span>
                        Dashboard
                    </span>

                </a>

            </li>


            <!-- PROFIL -->

            <li class="sidebar-item {{ request()->is('profile-sekolah*') ? 'active' : '' }}">

                <a
                    href="{{ url('/profile-sekolah') }}"
                    class="sidebar-link">

                    <i class="ti ti-school"></i>

                    <span>
                        Profil Sekolah
                    </span>

                </a>

            </li>


            <!-- GURU -->

            <li class="sidebar-item {{ request()->is('admin/guru*') ? 'active' : '' }}">

                <a
                    href="{{ url('/admin/guru') }}"
                    class="sidebar-link">

                    <i class="ti ti-users"></i>

                    <span>
                        Data Guru
                    </span>

                </a>

            </li>


            <!-- SISWA -->

            <li class="sidebar-item {{ request()->is('admin/siswa*') ? 'active' : '' }}">

                <a
                    href="{{ url('/admin/siswa') }}"
                    class="sidebar-link">

                    <i class="ti ti-user"></i>

                    <span>
                        Data Siswa
                    </span>

                </a>

            </li>



            <!-- DATA SEKOLAH -->

            <li class="menu-title">
                DATA SEKOLAH
            </li>


            <!-- BERITA -->

            <li class="sidebar-item {{ request()->is('admin/berita*') ? 'active' : '' }}">

                <a
                    href="{{ url('/admin/berita') }}"
                    class="sidebar-link">

                    <i class="ti ti-news"></i>

                    <span>
                        Berita
                    </span>

                </a>

            </li>


            <!-- GALERI -->

            <li class="sidebar-item {{ request()->is('admin/galeri*') ? 'active' : '' }}">

                <a
                    href="{{ url('/admin/galeri') }}"
                    class="sidebar-link">

                    <i class="ti ti-photo"></i>

                    <span>
                        Galeri
                    </span>

                </a>

            </li>


            <!-- EKSTRAKURIKULER -->

            <li class="sidebar-item {{ request()->is('admin/ekstrakurikuler*') ? 'active' : '' }}">

                <a
                    href="{{ url('/admin/ekstrakurikuler') }}"
                    class="sidebar-link">

                    <i class="ti ti-trophy"></i>

                    <span>
                        Ekstrakurikuler
                    </span>

                </a>

            </li>



            <!-- PENGATURAN -->

            <li class="menu-title">
                PENGATURAN
            </li>


            <!-- USER -->

            <li class="sidebar-item {{ request()->is('admin/user*') ? 'active' : '' }}">

                <a
                    href="{{ url('/admin/user') }}"
                    class="sidebar-link">

                    <i class="ti ti-user-cog"></i>

                    <span>
                        User
                    </span>

                </a>

            </li>

        </ul>

    </nav>


    <!-- LOGOUT -->

    <div class="sidebar-logout">

        <form
            action="{{ url('/logout') }}"
            method="POST">

            @csrf

            <button
                type="submit"
                class="logout-button">

                <i class="ti ti-logout"></i>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </div>

</aside>



<!-- =====================================================
     HEADER
===================================================== -->

<header class="app-header">

    <div class="header-inner">


        <!-- NOTIFICATION -->

        <div class="header-left">

            <button
                type="button"
                class="notification-button">

                <i class="ti ti-bell"></i>

                <span class="notification-dot"></span>

            </button>

        </div>



        <!-- PROFILE -->

        <div class="dropdown">

            <a
                href="#"
                class="header-profile"
                data-bs-toggle="dropdown"
                aria-expanded="false">


                <div class="profile-avatar">

                    <i class="ti ti-user"></i>

                </div>


                <div class="profile-detail">

                    <div class="profile-name">

                        {{ session('username', 'Admin') }}

                    </div>

                    <div class="profile-role">

                        {{ session('role', 'Admin') }}

                    </div>

                </div>


                <i class="ti ti-chevron-down profile-chevron"></i>

            </a>



            <ul class="dropdown-menu dropdown-menu-end">


                <!-- AKUN -->

                <li>

                    <a
                        class="dropdown-item"
                        href="{{ url('/admin/user') }}">

                        <i class="ti ti-user me-2"></i>

                        Akun Saya

                    </a>

                </li>


                <li>

                    <hr class="dropdown-divider">

                </li>


                <!-- LOGOUT -->

                <li>

                    <form
                        action="{{ url('/logout') }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="dropdown-item text-danger">

                            <i class="ti ti-logout me-2"></i>

                            Logout

                        </button>

                    </form>

                </li>


            </ul>

        </div>

    </div>

</header>



<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<div class="body-wrapper">

    <div class="body-wrapper-inner">

        <div class="container-fluid">

            @yield('content')

        </div>

    </div>

</div>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@stack('scripts')

</body>

</html>