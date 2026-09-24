<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin - Profil Sekolah</title>

    <link rel="shortcut icon"
        type="image/png"
        href="{{ asset('images/logos/favicon.png') }}" />

    <link rel="stylesheet"
        href="{{ asset('css/styles.min.css') }}" />

    <style>
        body {
            background: #f5f7fb;
        }

        .app-topstrip {
            display: none !important;
        }

        .school-brand {
            font-size: 20px;
            font-weight: 700;
            color: #2a3547;
        }

        .school-subtitle {
            font-size: 12px;
            color: #7c8fac;
        }

        .dashboard-title {
            font-size: 25px;
            font-weight: 600;
            color: #2a3547;
        }

        .dashboard-subtitle {
            color: #7c8fac;
        }

        .stat-card {
            border: 0;
            border-radius: 12px;
            overflow: hidden;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 24px;
        }

        .icon-blue {
            background: #e8f1ff;
            color: #5d87ff;
        }

        .icon-green {
            background: #e7f8ef;
            color: #13deb9;
        }

        .icon-orange {
            background: #fff1e6;
            color: #ffae1f;
        }

        .icon-purple {
            background: #f0e9ff;
            color: #8b5cf6;
        }

        .icon-red {
            background: #ffe8e8;
            color: #fa896b;
        }

        .menu-card {
            border: 0;
            border-radius: 12px;
            transition: .2s;
        }

        .menu-card:hover {
            transform: translateY(-3px);
        }

        .menu-icon {
            width: 45px;
            height: 45px;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;
        }

        .profile-info {
            padding: 12px 0;
            border-bottom: 1px solid #edf2f7;
        }

        .profile-info:last-child {
            border-bottom: 0;
        }

        .profile-label {
            color: #7c8fac;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .profile-value {
            color: #2a3547;
            font-weight: 500;
        }

        .welcome-box {
            border: 0;
            border-radius: 15px;
            background: linear-gradient(135deg, #5d87ff, #4570ea);
            color: white;
        }

        .welcome-box h3 {
            color: white;
        }

        .welcome-box p {
            color: rgba(255, 255, 255, .85);
        }

        .sidebar-link.active {
            background: #ecf2ff;
            color: #5d87ff;
        }

        .sidebar-link.active i {
            color: #5d87ff;
        }

        .quick-link {
            text-decoration: none;
            color: #2a3547;
        }

        .quick-link:hover {
            color: #5d87ff;
        }

        .logo-preview {
            max-width: 140px;
            max-height: 55px;
            object-fit: contain;
        }
    </style>
</head>


<body>

    <div class="page-wrapper"
        id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin6"
        data-sidebartype="full"
        data-sidebar-position="fixed"
        data-header-position="fixed">


        {{-- =====================================================
            SIDEBAR
        ====================================================== --}}

        <aside class="left-sidebar">

            <div>

                {{-- LOGO --}}
                <div class="brand-logo d-flex align-items-center justify-content-between">

                    <a href="{{ url('/') }}"
                        class="text-nowrap logo-img text-decoration-none">

                        @if(isset($profil) && !empty($profil->logo))

                            <img src="{{ asset('storage/' . $profil->logo) }}"
                                class="logo-preview"
                                alt="Logo Sekolah">

                        @else

                            <div>
                                <div class="school-brand">
                                    ADMIN SEKOLAH
                                </div>

                                <div class="school-subtitle">
                                    Sistem Informasi Sekolah
                                </div>
                            </div>

                        @endif

                    </a>

                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer"
                        id="sidebarCollapse">

                        <i class="ti ti-x fs-6"></i>

                    </div>

                </div>


                {{-- MENU --}}
                <nav class="sidebar-nav scroll-sidebar"
                    data-simplebar="">

                    <ul id="sidebarnav">


                        {{-- =============================
                            MENU UTAMA
                        ============================== --}}

                        <li class="nav-small-cap">

                            <iconify-icon
                                icon="solar:menu-dots-linear"
                                class="nav-small-cap-icon fs-4">
                            </iconify-icon>

                            <span class="hide-menu">
                                MENU UTAMA
                            </span>

                        </li>


                        {{-- DASHBOARD --}}
                        <li class="sidebar-item">

                            <a class="sidebar-link active"
                                href="{{ url('/') }}">

                                <span class="d-flex">

                                    <i class="ti ti-dashboard"></i>

                                </span>

                                <span class="hide-menu">
                                    Dashboard
                                </span>

                            </a>

                        </li>


                        {{-- PROFIL SEKOLAH --}}
                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ url('/admin/profil') }}">

                                <span class="d-flex">

                                    <i class="ti ti-school"></i>

                                </span>

                                <span class="hide-menu">
                                    Profil Sekolah
                                </span>

                            </a>

                        </li>


                        {{-- GURU --}}
                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ url('/admin/guru') }}">

                                <span class="d-flex">

                                    <i class="ti ti-users"></i>

                                </span>

                                <span class="hide-menu">
                                    Data Guru
                                </span>

                            </a>

                        </li>


                        {{-- SISWA --}}
                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ url('/admin/siswa') }}">

                                <span class="d-flex">

                                    <i class="ti ti-school"></i>

                                </span>

                                <span class="hide-menu">
                                    Data Siswa
                                </span>

                            </a>

                        </li>


                        {{-- BERITA --}}
                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ url('/admin/berita') }}">

                                <span class="d-flex">

                                    <i class="ti ti-news"></i>

                                </span>

                                <span class="hide-menu">
                                    Berita
                                </span>

                            </a>

                        </li>


                        {{-- GALERI --}}
                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ url('/admin/galeri') }}">

                                <span class="d-flex">

                                    <i class="ti ti-photo"></i>

                                </span>

                                <span class="hide-menu">
                                    Galeri
                                </span>

                            </a>

                        </li>


                        {{-- EKSTRAKURIKULER --}}
                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ url('/admin/ekstrakurikuler') }}">

                                <span class="d-flex">

                                    <i class="ti ti-trophy"></i>

                                </span>

                                <span class="hide-menu">
                                    Ekstrakurikuler
                                </span>

                            </a>

                        </li>


                        {{-- USER --}}
                        <li class="sidebar-item">

                            <a class="sidebar-link"
                                href="{{ url('/admin/user') }}">

                                <span class="d-flex">

                                    <i class="ti ti-user"></i>

                                </span>

                                <span class="hide-menu">
                                    Pengguna
                                </span>

                            </a>

                        </li>


                        {{-- PEMBATAS --}}
                        <li>

                            <span class="sidebar-divider lg"></span>

                        </li>


                        {{-- INFORMASI --}}
                        <li class="nav-small-cap">

                            <iconify-icon
                                icon="solar:menu-dots-linear"
                                class="nav-small-cap-icon fs-4">
                            </iconify-icon>

                            <span class="hide-menu">
                                INFORMASI
                            </span>

                        </li>


                        {{-- LOGOUT --}}
                        <li class="sidebar-item">

                            <form action="{{ url('/logout') }}"
                                method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">

                                @csrf

                                <button type="submit"
                                    class="sidebar-link border-0 bg-transparent w-100 text-start">

                                    <span class="d-flex">

                                        <i class="ti ti-logout"></i>

                                    </span>

                                    <span class="hide-menu">
                                        Logout
                                    </span>

                                </button>

                            </form>

                        </li>

                    </ul>

                </nav>

            </div>

        </aside>


        {{-- =====================================================
            MAIN CONTENT
        ====================================================== --}}

        <div class="body-wrapper">


            {{-- HEADER --}}
            <header class="app-header">

                <nav class="navbar navbar-expand-lg navbar-light">

                    <ul class="navbar-nav">

                        <li class="nav-item d-block d-xl-none">

                            <a class="nav-link sidebartoggler"
                                id="headerCollapse"
                                href="javascript:void(0)">

                                <i class="ti ti-menu-2"></i>

                            </a>

                        </li>

                    </ul>


                    <div class="navbar-collapse justify-content-end">

                        <ul class="navbar-nav flex-row align-items-center">

                            <li class="nav-item dropdown">

                                <a class="nav-link"
                                    href="javascript:void(0)"
                                    data-bs-toggle="dropdown">

                                    <i class="ti ti-user-circle fs-6"></i>

                                    <span class="ms-2">

                                        {{ session('username', 'Admin') }}

                                    </span>

                                </a>


                                <div class="dropdown-menu dropdown-menu-end">

                                    <div class="p-3">

                                        <h6 class="mb-1">

                                            {{ session('username', 'Admin') }}

                                        </h6>

                                        <small class="text-muted">

                                            {{ session('role', 'Admin') }}

                                        </small>

                                    </div>

                                </div>

                            </li>

                        </ul>

                    </div>

                </nav>

            </header>


            {{-- =====================================================
                CONTENT
            ====================================================== --}}

            <div class="body-wrapper-inner">

                <div class="container-fluid">


                    {{-- =============================
                        WELCOME
                    ============================== --}}

                    <div class="card welcome-box mb-4">

                        <div class="card-body p-4">

                            <div class="row align-items-center">

                                <div class="col-md-8">

                                    <h3 class="mb-2">

                                        Selamat Datang,
                                        {{ session('username', 'Admin') }}

                                    </h3>

                                    <p class="mb-0">

                                        Kelola informasi sekolah melalui
                                        Sistem Informasi Profil Sekolah.

                                    </p>

                                </div>


                                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                                    <i class="ti ti-school"
                                        style="font-size:80px; opacity:.25;">
                                    </i>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- =============================
                        STATISTIK DATABASE
                    ============================== --}}

                    <div class="row">


                        {{-- GURU --}}
                        <div class="col-lg-3 col-md-6">

                            <div class="card stat-card">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="stat-icon icon-blue">

                                            <i class="ti ti-users"></i>

                                        </div>

                                        <div class="ms-3">

                                            <h3 class="mb-0">

                                                {{ $jumlahGuru ?? 0 }}

                                            </h3>

                                            <span class="text-muted">

                                                Data Guru

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- SISWA --}}
                        <div class="col-lg-3 col-md-6">

                            <div class="card stat-card">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="stat-icon icon-green">

                                            <i class="ti ti-school"></i>

                                        </div>

                                        <div class="ms-3">

                                            <h3 class="mb-0">

                                                {{ $jumlahSiswa ?? 0 }}

                                            </h3>

                                            <span class="text-muted">

                                                Data Siswa

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- BERITA --}}
                        <div class="col-lg-3 col-md-6">

                            <div class="card stat-card">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="stat-icon icon-orange">

                                            <i class="ti ti-news"></i>

                                        </div>

                                        <div class="ms-3">

                                            <h3 class="mb-0">

                                                {{ $jumlahBerita ?? 0 }}

                                            </h3>

                                            <span class="text-muted">

                                                Berita

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- EKSTRAKURIKULER --}}
                        <div class="col-lg-3 col-md-6">

                            <div class="card stat-card">

                                <div class="card-body">

                                    <div class="d-flex align-items-center">

                                        <div class="stat-icon icon-purple">

                                            <i class="ti ti-trophy"></i>

                                        </div>

                                        <div class="ms-3">

                                            <h3 class="mb-0">

                                                {{ $jumlahEkskul ?? 0 }}

                                            </h3>

                                            <span class="text-muted">

                                                Ekstrakurikuler

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- =============================
                        PROFIL SEKOLAH + GALERI
                    ============================== --}}

                    <div class="row mt-2">


                        {{-- PROFIL --}}
                        <div class="col-lg-8">

                            <div class="card">

                                <div class="card-body">

                                    <div class="d-flex align-items-center justify-content-between">

                                        <div>

                                            <h4 class="card-title mb-1">

                                                Profil Sekolah

                                            </h4>

                                            <p class="card-subtitle">

                                                Data dari tabel
                                                <b>profil_sekolah</b>

                                            </p>

                                        </div>


                                        <a href="{{ url('/admin/profil') }}"
                                            class="btn btn-primary">

                                            <i class="ti ti-edit"></i>

                                            Kelola

                                        </a>

                                    </div>


                                    <hr>


                                    @if(isset($profil))

                                        <div class="row">

                                            {{-- NAMA --}}
                                            <div class="col-md-6">

                                                <div class="profile-info">

                                                    <div class="profile-label">
                                                        Nama Sekolah
                                                    </div>

                                                    <div class="profile-value">

                                                        {{ $profil->nama_sekolah ?? '-' }}

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- KEPALA --}}
                                            <div class="col-md-6">

                                                <div class="profile-info">

                                                    <div class="profile-label">
                                                        Kepala Sekolah
                                                    </div>

                                                    <div class="profile-value">

                                                        {{ $profil->kepala_sekolah ?? '-' }}

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- NPSN --}}
                                            <div class="col-md-6">

                                                <div class="profile-info">

                                                    <div class="profile-label">
                                                        NPSN
                                                    </div>

                                                    <div class="profile-value">

                                                        {{ $profil->npsn ?? '-' }}

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- KONTAK --}}
                                            <div class="col-md-6">

                                                <div class="profile-info">

                                                    <div class="profile-label">
                                                        Kontak
                                                    </div>

                                                    <div class="profile-value">

                                                        {{ $profil->kontak ?? '-' }}

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- ALAMAT --}}
                                            <div class="col-md-12">

                                                <div class="profile-info">

                                                    <div class="profile-label">
                                                        Alamat
                                                    </div>

                                                    <div class="profile-value">

                                                        {{ $profil->alamat ?? '-' }}

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- TAHUN BERDIRI --}}
                                            <div class="col-md-6">

                                                <div class="profile-info">

                                                    <div class="profile-label">
                                                        Tahun Berdiri
                                                    </div>

                                                    <div class="profile-value">

                                                        {{ $profil->tahun_berdiri ?? '-' }}

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- VISI MISI --}}
                                            <div class="col-md-6">

                                                <div class="profile-info">

                                                    <div class="profile-label">
                                                        Visi & Misi
                                                    </div>

                                                    <div class="profile-value">

                                                        {{ $profil->visi_misi ?? '-' }}

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @else

                                        <div class="alert alert-warning mb-0">

                                            Data profil sekolah belum tersedia.

                                        </div>

                                    @endif

                                </div>

                            </div>

                        </div>


                        {{-- DATA GALERI --}}
                        <div class="col-lg-4">

                            <div class="card">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h4 class="card-title mb-1">

                                                Galeri

                                            </h4>

                                            <p class="card-subtitle">

                                                Data galeri sekolah

                                            </p>

                                        </div>

                                        <i class="ti ti-photo fs-7 text-primary"></i>

                                    </div>


                                    <div class="mt-4 text-center">

                                        <div class="stat-icon icon-blue mx-auto mb-3">

                                            <i class="ti ti-photo"></i>

                                        </div>

                                        <h2 class="mb-1">

                                            {{ $jumlahGaleri ?? 0 }}

                                        </h2>

                                        <p class="text-muted mb-3">

                                            Total Galeri

                                        </p>

                                        <a href="{{ url('/admin/galeri') }}"
                                            class="btn btn-outline-primary">

                                            Kelola Galeri

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- =============================
                        MENU CEPAT
                    ============================== --}}

                    <div class="row mt-2">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-body">

                                    <h4 class="card-title mb-1">

                                        Menu Cepat

                                    </h4>

                                    <p class="card-subtitle mb-4">

                                        Kelola data sesuai tabel database
                                        sekolah.

                                    </p>


                                    <div class="row">


                                        {{-- PROFIL --}}
                                        <div class="col-md-3 col-sm-6 mb-3">

                                            <a href="{{ url('/admin/profil') }}"
                                                class="quick-link">

                                                <div class="card menu-card bg-light-primary">

                                                    <div class="card-body">

                                                        <div class="d-flex align-items-center">

                                                            <div class="menu-icon icon-blue">

                                                                <i class="ti ti-school"></i>

                                                            </div>

                                                            <div class="ms-3">

                                                                <h6 class="mb-1">
                                                                    Profil Sekolah
                                                                </h6>

                                                                <small class="text-muted">
                                                                    profil_sekolah
                                                                </small>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>


                                        {{-- GURU --}}
                                        <div class="col-md-3 col-sm-6 mb-3">

                                            <a href="{{ url('/admin/guru') }}"
                                                class="quick-link">

                                                <div class="card menu-card">

                                                    <div class="card-body">

                                                        <div class="d-flex align-items-center">

                                                            <div class="menu-icon icon-green">

                                                                <i class="ti ti-users"></i>

                                                            </div>

                                                            <div class="ms-3">

                                                                <h6 class="mb-1">
                                                                    Data Guru
                                                                </h6>

                                                                <small class="text-muted">
                                                                    guru
                                                                </small>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>


                                        {{-- SISWA --}}
                                        <div class="col-md-3 col-sm-6 mb-3">

                                            <a href="{{ url('/admin/siswa') }}"
                                                class="quick-link">

                                                <div class="card menu-card">

                                                    <div class="card-body">

                                                        <div class="d-flex align-items-center">

                                                            <div class="menu-icon icon-purple">

                                                                <i class="ti ti-school"></i>

                                                            </div>

                                                            <div class="ms-3">

                                                                <h6 class="mb-1">
                                                                    Data Siswa
                                                                </h6>

                                                                <small class="text-muted">
                                                                    siswa
                                                                </small>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>


                                        {{-- BERITA --}}
                                        <div class="col-md-3 col-sm-6 mb-3">

                                            <a href="{{ url('/admin/berita') }}"
                                                class="quick-link">

                                                <div class="card menu-card">

                                                    <div class="card-body">

                                                        <div class="d-flex align-items-center">

                                                            <div class="menu-icon icon-orange">

                                                                <i class="ti ti-news"></i>

                                                            </div>

                                                            <div class="ms-3">

                                                                <h6 class="mb-1">
                                                                    Berita
                                                                </h6>

                                                                <small class="text-muted">
                                                                    berita
                                                                </small>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>


                                        {{-- GALERI --}}
                                        <div class="col-md-3 col-sm-6 mb-3">

                                            <a href="{{ url('/admin/galeri') }}"
                                                class="quick-link">

                                                <div class="card menu-card">

                                                    <div class="card-body">

                                                        <div class="d-flex align-items-center">

                                                            <div class="menu-icon icon-blue">

                                                                <i class="ti ti-photo"></i>

                                                            </div>

                                                            <div class="ms-3">

                                                                <h6 class="mb-1">
                                                                    Galeri
                                                                </h6>

                                                                <small class="text-muted">
                                                                    galeri
                                                                </small>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>


                                        {{-- EKSKUL --}}
                                        <div class="col-md-3 col-sm-6 mb-3">

                                            <a href="{{ url('/admin/ekstrakurikuler') }}"
                                                class="quick-link">

                                                <div class="card menu-card">

                                                    <div class="card-body">

                                                        <div class="d-flex align-items-center">

                                                            <div class="menu-icon icon-orange">

                                                                <i class="ti ti-trophy"></i>

                                                            </div>

                                                            <div class="ms-3">

                                                                <h6 class="mb-1">
                                                                    Ekstrakurikuler
                                                                </h6>

                                                                <small class="text-muted">
                                                                    ekstrakurikuler
                                                                </small>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>


                                        {{-- USER --}}
                                        <div class="col-md-3 col-sm-6 mb-3">

                                            <a href="{{ url('/admin/user') }}"
                                                class="quick-link">

                                                <div class="card menu-card">

                                                    <div class="card-body">

                                                        <div class="d-flex align-items-center">

                                                            <div class="menu-icon icon-purple">

                                                                <i class="ti ti-user"></i>

                                                            </div>

                                                            <div class="ms-3">

                                                                <h6 class="mb-1">
                                                                    Pengguna
                                                                </h6>

                                                                <small class="text-muted">
                                                                    user
                                                                </small>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- =============================
                        DATA TERBARU
                    ============================== --}}

                    <div class="row mt-2">


                        {{-- GURU --}}
                        <div class="col-lg-6">

                            <div class="card">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div>

                                            <h4 class="card-title mb-1">
                                                Data Guru
                                            </h4>

                                            <p class="card-subtitle">
                                                Data terbaru dari tabel guru
                                            </p>

                                        </div>

                                        <a href="{{ url('/admin/guru') }}"
                                            class="btn btn-sm btn-primary">

                                            Lihat Semua

                                        </a>

                                    </div>


                                    <div class="table-responsive mt-3">

                                        <table class="table align-middle">

                                            <thead>

                                                <tr>

                                                    <th>
                                                        Nama Guru
                                                    </th>

                                                    <th>
                                                        NIP
                                                    </th>

                                                    <th>
                                                        Mapel
                                                    </th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @forelse(($guruTerbaru ?? []) as $guru)

                                                    <tr>

                                                        <td>
                                                            {{ $guru->nama_guru }}
                                                        </td>

                                                        <td>
                                                            {{ $guru->nip }}
                                                        </td>

                                                        <td>
                                                            {{ $guru->mapel }}
                                                        </td>

                                                    </tr>

                                                @empty

                                                    <tr>

                                                        <td colspan="3"
                                                            class="text-center text-muted">

                                                            Belum ada data guru.

                                                        </td>

                                                    </tr>

                                                @endforelse

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- SISWA --}}
                        <div class="col-lg-6">

                            <div class="card">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div>

                                            <h4 class="card-title mb-1">
                                                Data Siswa
                                            </h4>

                                            <p class="card-subtitle">
                                                Data terbaru dari tabel siswa
                                            </p>

                                        </div>

                                        <a href="{{ url('/admin/siswa') }}"
                                            class="btn btn-sm btn-primary">

                                            Lihat Semua

                                        </a>

                                    </div>


                                    <div class="table-responsive mt-3">

                                        <table class="table align-middle">

                                            <thead>

                                                <tr>

                                                    <th>
                                                        NISN
                                                    </th>

                                                    <th>
                                                        Nama
                                                    </th>

                                                    <th>
                                                        Jenis Kelamin
                                                    </th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @forelse(($siswaTerbaru ?? []) as $siswa)

                                                    <tr>

                                                        <td>
                                                            {{ $siswa->nisn }}
                                                        </td>

                                                        <td>
                                                            {{ $siswa->nama_siswa }}
                                                        </td>

                                                        <td>
                                                            {{ $siswa->jenis_kelamin }}
                                                        </td>

                                                    </tr>

                                                @empty

                                                    <tr>

                                                        <td colspan="3"
                                                            class="text-center text-muted">

                                                            Belum ada data siswa.

                                                        </td>

                                                    </tr>

                                                @endforelse

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- FOOTER --}}
                    <div class="py-4 text-center">

                        <p class="mb-0 text-muted">

                            Sistem Informasi Profil Sekolah

                        </p>

                    </div>


                </div>

            </div>

        </div>

    </div>


    {{-- JAVASCRIPT --}}

    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('js/app.min.js') }}"></script>

</body>

</html>