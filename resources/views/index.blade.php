
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}">

    <title>@yield('title', 'Dashboard - MTsN 10 Tasikmalaya')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.31.0/dist/tabler-icons.min.css">

    <style>
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

        /* SIDEBAR */
        .left-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background: #fff;
            border-right: 1px solid #e9edf2;
            z-index: 1100;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* LOGO SEKOLAH */
        .sidebar-brand {
            min-height: 85px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            background: #fff;
            border-bottom: 1px solid #f0f2f5;
        }

        .sidebar-brand a {
            width: 100%;
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 10px;
        }

        .sidebar-logo {
            width: 52px;
            height: 52px;
            flex: 0 0 52px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-sekolah {
            display: block;
            width: 52px;
            height: 52px;
            object-fit: contain;
        }

        .sidebar-brand-text {
            min-width: 0;
        }

        .sidebar-school-name {
            margin: 0;
            color: #17365d;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.35;
            white-space: normal;
        }

        .sidebar-school-subtitle {
            display: block;
            color: #98a2b3;
            font-size: 10px;
            line-height: 1.4;
            margin-top: 4px;
        }

        /* NAVIGASI SIDEBAR */
        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 18px 15px 10px;
        }

        .sidebar-nav ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sidebar-item {
            margin-bottom: 5px;
        }

        .sidebar-link {
            width: 100%;
            min-height: 42px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 12px;
            border-radius: 7px;
            background: transparent;
            color: #4d5b73;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: all .2s ease;
        }

        .sidebar-link i {
            width: 20px;
            flex-shrink: 0;
            text-align: center;
            color: #6f7d93;
            font-size: 18px;
        }

        .sidebar-link:hover {
            background: #eaf7ef;
            color: #198754;
        }

        .sidebar-link:hover i {
            color: #198754;
        }

        .sidebar-item.active > .sidebar-link {
            background: #198754;
            color: #fff;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(25, 135, 84, .18);
        }

        .sidebar-item.active > .sidebar-link i {
            color: #fff;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: #dfe4eb;
            border-radius: 10px;
        }

        /* LOGOUT */
        .sidebar-logout {
            flex-shrink: 0;
            padding: 12px 15px 16px;
            background: #fff;
            border-top: 1px solid #f0f2f5;
        }

        .sidebar-logout form {
            margin: 0;
        }

        .logout-button {
            width: 100%;
            min-height: 42px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 12px;
            border: none;
            border-radius: 7px;
            background: transparent;
            color: #4d5b73;
            font-size: 14px;
            font-family: inherit;
            cursor: pointer;
            text-align: left;
        }

        .logout-button i {
            width: 20px;
            flex-shrink: 0;
            text-align: center;
            color: #6f7d93;
            font-size: 18px;
        }

        .logout-button:hover {
            background: #fff1f1;
            color: #dc3545;
        }

        .logout-button:hover i {
            color: #dc3545;
        }

        /* HEADER */
        .app-header {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            height: 75px;
            background: #fff;
            border-bottom: 1px solid #edf0f5;
            box-shadow: 0 1px 6px rgba(0, 0, 0, .03);
            z-index: 1000;
        }

        .header-inner {
            width: 100%;
            height: 75px;
            display: flex;
            align-items: center;
            padding: 0 25px;
        }

        .header-left {
            display: flex;
            align-items: center;
            flex-shrink: 0;
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
            background: #eaf7ef;
            color: #198754;
        }

        .notification-dot {
            position: absolute;
            top: 7px;
            right: 7px;
            width: 7px;
            height: 7px;
            background: #198754;
            border-radius: 50%;
            border: 1px solid #fff;
        }

        /* PENCARIAN */
        .header-search {
            display: flex;
            align-items: center;
            margin-left: 15px;
        }

        .search-box {
            width: min(400px, 40vw);
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #98a2b3;
            font-size: 17px;
            pointer-events: none;
        }

        .search-box input {
            width: 100%;
            height: 40px;
            padding: 0 15px 0 40px;
            border: 1px solid #e5e9f0;
            border-radius: 8px;
            background: #f8fafc;
            color: #2a3547;
            font-size: 13px;
            outline: none;
        }

        .search-box input:focus {
            background: #fff;
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, .10);
        }

        /* PROFIL HEADER */
        .header-inner > .dropdown {
            margin-left: auto;
        }

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
            background: #eaf7ef;
            color: #198754;
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
            text-transform: capitalize;
        }

        .profile-chevron {
            color: #98a2b3;
            font-size: 14px;
        }

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
            background: #eaf7ef;
            color: #198754;
        }

        /* KONTEN UTAMA */
        .body-wrapper {
            margin-left: 250px;
            padding-top: 75px;
            min-height: 100vh;
            background: #f6f8fc;
        }

        .body-wrapper-inner {
            padding: 25px 30px 35px;
        }

        .body-wrapper .container-fluid {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .left-sidebar {
                width: 250px;
                transform: translateX(-100%);
            }

            .app-header {
                left: 0;
            }

            .body-wrapper {
                margin-left: 0;
            }

            .header-inner {
                padding: 0 15px;
            }

            .header-search {
                margin-left: 10px;
            }

            .search-box {
                width: min(220px, 35vw);
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

    <!-- SIDEBAR -->
    <aside class="left-sidebar">

        <!-- LOGO SEKOLAH -->
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
                <div class="sidebar-logo">
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo MTsN 10 Tasikmalaya"
                        class="logo-sekolah"
                    >
                </div>

                <div class="sidebar-brand-text">
                    <h5 class="sidebar-school-name">MTsN 10 Tasikmalaya</h5>
                    <small class="sidebar-school-subtitle">Sistem Informasi Sekolah</small>
                </div>
            </a>
        </div>

        <!-- MENU -->
        <nav class="sidebar-nav">
            <ul>
                <li class="sidebar-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i class="ti ti-layout-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('profile-sekolah*') ? 'active' : '' }}">
                    <a href="{{ url('/profile-sekolah') }}" class="sidebar-link">
                        <i class="ti ti-school"></i>
                        <span>Profil Sekolah</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/guru*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/guru') }}" class="sidebar-link">
                        <i class="ti ti-users"></i>
                        <span>Data Guru</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/siswa*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/siswa') }}" class="sidebar-link">
                        <i class="ti ti-user"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/berita*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/berita') }}" class="sidebar-link">
                        <i class="ti ti-news"></i>
                        <span>Berita</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/galeri*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/galeri') }}" class="sidebar-link">
                        <i class="ti ti-photo"></i>
                        <span>Galeri</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/ekstrakurikuler*') ? 'active' : '' }}">
                    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="sidebar-link">
                        <i class="ti ti-trophy"></i>
                        <span>Ekstrakurikuler</span>
                    </a>
                </li>

                @if(session('role') === 'admin')
                    <li class="sidebar-item {{ request()->is('admin/user*') ? 'active' : '' }}">
                        <a href="{{ url('/admin/user') }}" class="sidebar-link">
                            <i class="ti ti-user-cog"></i>
                            <span>User</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>

        <!-- LOGOUT -->
        <div class="sidebar-logout">
            <form action="{{ url('/logout') }}" method="POST"
                onsubmit="return confirm('Apakah Anda yakin ingin logout?');">
                @csrf

                <button type="submit" class="logout-button">
                    <i class="ti ti-logout"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- HEADER -->
    <header class="app-header">
        <div class="header-inner">

            <div class="header-left">
                <button type="button" class="notification-button" aria-label="Notifikasi">
                    <i class="ti ti-bell"></i>
                    <span class="notification-dot"></span>
                </button>
            </div>

            <div class="header-search">
                <div class="search-box">
                    <i class="ti ti-search"></i>
                    <input
                        type="text"
                        id="headerSearch"
                        placeholder="Cari menu..."
                        autocomplete="off"
                    >
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="header-profile" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-avatar">
                        <i class="ti ti-user"></i>
                    </div>

                    <div class="profile-detail">
                        <div class="profile-name">{{ session('username', 'Admin') }}</div>
                        <div class="profile-role">{{ session('role', 'Admin') }}</div>
                    </div>

                    <i class="ti ti-chevron-down profile-chevron"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    @if(session('role') === 'admin')
                        <li>
                            <a class="dropdown-item" href="{{ url('/admin/user') }}">
                                <i class="ti ti-user me-2"></i>
                                Akun Saya
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    @endif

                    <li>
                        <form action="{{ url('/logout') }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin logout?');">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="ti ti-logout me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="body-wrapper">
        <div class="body-wrapper-inner">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </main>

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const headerSearch = document.getElementById('headerSearch');

        if (headerSearch) {
            headerSearch.addEventListener('keydown', function (event) {
                if (event.key !== 'Enter') return;

                const keyword = this.value.toLowerCase().trim();
                if (!keyword) return;

                const menus = [
                    {
                        keywords: ['dashboard', 'home'],
                        url: @json(route('dashboard'))
                    },
                    {
                        keywords: ['profil', 'sekolah'],
                        url: @json(url('/profile-sekolah'))
                    },
                    {
                        keywords: ['guru', 'pengajar'],
                        url: @json(url('/admin/guru'))
                    },
                    {
                        keywords: ['siswa', 'murid'],
                        url: @json(url('/admin/siswa'))
                    },
                    {
                        keywords: ['berita'],
                        url: @json(url('/admin/berita'))
                    },
                    {
                        keywords: ['galeri', 'foto'],
                        url: @json(url('/admin/galeri'))
                    },
                    {
                        keywords: ['ekstrakurikuler', 'ekskul'],
                        url: @json(route('admin.ekstrakurikuler.index'))
                    },
                    @if(session('role') === 'admin')
                    {
                        keywords: ['user', 'akun'],
                        url: @json(url('/admin/user'))
                    },
                    @endif
                ];

                const found = menus.find(menu =>
                    menu.keywords.some(word => keyword.includes(word))
                );

                if (found) {
                    window.location.href = found.url;
                } else {
                    alert('Pencarian "' + this.value + '" tidak ditemukan.');
                }
            });
        }
    </script>

    @stack('scripts')
</body>
</html>