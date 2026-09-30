@extends('index')

@section('title', 'Dashboard - SMKS Singaparna')

@section('content')

<style>

    /* =========================
       DASHBOARD
    ========================= */

    .dashboard-wrapper {
        width: 100%;
        padding: 10px 5px 30px;
    }


    /* =========================
       WELCOME
    ========================= */

    .welcome-section {
        margin-bottom: 25px;
    }

    .welcome-section h3 {
        color: #17365d;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .welcome-section p {
        color: #7890a8;
        font-size: 14px;
        margin: 0;
    }


    /* =========================
       STAT CARD
    ========================= */

    .stat-card {
        background: #ffffff;
        border: 1px solid #e6ebf2;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(30, 60, 90, 0.04);
        min-height: 125px;
        transition: 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 60, 90, 0.08);
    }

    .stat-card-body {
        padding: 22px;
    }

    .stat-title {
        color: #7890a8;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .stat-number {
        color: #17365d;
        font-size: 27px;
        font-weight: 700;
        margin: 0;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #e8f2fc;
        color: #155a98;

        font-size: 22px;
    }


    /* =========================
       CONTENT CARD
    ========================= */

    .dashboard-card {
        background: #ffffff;
        border: 1px solid #e6ebf2;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(30, 60, 90, 0.04);
        overflow: hidden;
    }

    .dashboard-card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #edf1f6;
    }

    .dashboard-card-header h5 {
        color: #17365d;
        font-size: 16px;
        font-weight: 700;
        margin: 0 0 4px;
    }

    .dashboard-card-header p {
        color: #7890a8;
        font-size: 13px;
        margin: 0;
    }

    .dashboard-card-body {
        padding: 22px;
    }


    /* =========================
       TABLE
    ========================= */

    .dashboard-table {
        width: 100%;
        border-collapse: collapse;
    }

    .dashboard-table th {
        color: #7890a8;
        background: #f8fafc;
        font-size: 12px;
        font-weight: 600;
        padding: 12px 14px;
        text-align: left;
        border-bottom: 1px solid #e8edf3;
    }

    .dashboard-table td {
        color: #334155;
        font-size: 13px;
        padding: 13px 14px;
        border-bottom: 1px solid #edf1f6;
    }

    .dashboard-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       PROFILE
    ========================= */

    .profile-box {
        background: #f8fbfe;
        border: 1px solid #e5edf5;
        border-radius: 8px;
        padding: 18px;
    }

    .profile-label {
        color: #7890a8;
        font-size: 12px;
        margin-bottom: 3px;
    }

    .profile-value {
        color: #17365d;
        font-size: 14px;
        font-weight: 600;
    }


    /* =========================
       EMPTY DATA
    ========================= */

    .empty-data {
        text-align: center;
        padding: 25px 10px;
        color: #94a3b8;
        font-size: 13px;
    }

    .empty-data i {
        font-size: 30px;
        display: block;
        margin-bottom: 8px;
    }


    /* =========================
       FLEX CARD
    ========================= */

    .flexy-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .flexy-icon {
        width: 50px;
        height: 50px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #e8f2fc;
        color: #155a98;

        font-size: 23px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .dashboard-wrapper {
            padding: 5px 0 20px;
        }

        .welcome-section h3 {
            font-size: 21px;
        }

        .stat-card-body {
            padding: 18px;
        }

    }

</style>


<div class="dashboard-wrapper">


    {{-- =====================================================
         WELCOME
    ====================================================== --}}

    <div class="welcome-section">

        <h3>
            Selamat Datang, {{ session('username', 'Admin') }}
        </h3>

        <p>
            Selamat datang di Sistem Informasi SMKS Singaparna.
        </p>

    </div>



    {{-- =====================================================
         STATISTIK
    ====================================================== --}}

    <div class="row g-4 mb-4">


        {{-- TOTAL GURU --}}

        <div class="col-xl-3 col-md-16">

            <div class="stat-card h-100">

                <div class="stat-card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <div class="stat-title">
                                Total Guru
                            </div>

                            <h3 class="stat-number">
                                {{ $jumlahGuru ?? 0 }}
                            </h3>

                        </div>

                        <div class="stat-icon">

                            <i class="bi bi-person-badge"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- TOTAL SISWA --}}

        <div class="col-xl-3 col-md-6">

            <div class="stat-card h-100">

                <div class="stat-card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <div class="stat-title">
                                Total Siswa
                            </div>

                            <h3 class="stat-number">
                                {{ $jumlahSiswa ?? 0 }}
                            </h3>

                        </div>

                        <div class="stat-icon">

                            <i class="bi bi-people"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- TOTAL BERITA --}}

        <div class="col-xl-3 col-md-6">

            <div class="stat-card h-100">

                <div class="stat-card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <div class="stat-title">
                                Total Berita
                            </div>

                            <h3 class="stat-number">
                                {{ $jumlahBerita ?? 0 }}
                            </h3>

                        </div>

                        <div class="stat-icon">

                            <i class="bi bi-newspaper"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- EKSTRAKURIKULER --}}

        <div class="col-xl-3 col-md-6">

            <div class="stat-card h-100">

                <div class="stat-card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <div class="stat-title">
                                Ekstrakurikuler
                            </div>

                            <h3 class="stat-number">
                                {{ $jumlahEkskul ?? 0 }}
                            </h3>

                        </div>

                        <div class="stat-icon">

                            <i class="bi bi-trophy"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- =====================================================
         BARIS PROFIL + FLEXy
    ====================================================== --}}

    <div class="row g-4 mb-4">


        {{-- PROFIL SEKOLAH --}}

        <div class="col-lg-6">

            <div class="dashboard-card h-100">

                <div class="dashboard-card-header">

                    <h5>
                        <i class="bi bi-building me-2"></i>
                        Profil Sekolah
                    </h5>

                    <p>
                        Informasi singkat sekolah
                    </p>

                </div>

                <div class="dashboard-card-body">

                    @if(isset($profil))

                        <div class="profile-box">

                            <div class="mb-3">

                                <div class="profile-label">
                                    Nama Sekolah
                                </div>

                                <div class="profile-value">
                                    {{ $profil->nama_sekolah ?? '-' }}
                                </div>

                            </div>


                            <div class="mb-3">

                                <div class="profile-label">
                                    Alamat
                                </div>

                                <div class="profile-value">
                                    {{ $profil->alamat ?? '-' }}
                                </div>

                            </div>


                            <div>

                                <div class="profile-label">
                                    Email
                                </div>

                                <div class="profile-value">
                                    {{ $profil->email ?? '-' }}
                                </div>

                            </div>

                        </div>

                    @else

                        <div class="empty-data">

                            <i class="bi bi-building"></i>

                            Data profil sekolah belum tersedia.

                        </div>

                    @endif

                </div>

            </div>

        </div>



        {{-- INFORMASI SISTEM --}}

        <div class="col-lg-6">

            <div class="dashboard-card h-100">

                <div class="dashboard-card-header">

                    <h5>
                        <i class="bi bi-grid me-2"></i>
                        Sistem Informasi Sekolah
                    </h5>

                    <p>
                        SMKS Singaparna
                    </p>

                </div>

                <div class="dashboard-card-body">

                    <div class="flexy-info">

                        <div class="flexy-icon">

                            <i class="bi bi-mortarboard-fill"></i>

                        </div>

                        <div>

                            <div class="profile-value">
                                SMKS Singaparna
                            </div>

                            <div class="profile-label">
                                Sistem Informasi Administrasi Sekolah
                            </div>

                        </div>

                    </div>

                    <hr>

                    <p class="text-muted mb-0" style="font-size:13px;">

                        Kelola data guru, siswa, profil sekolah,
                        berita, galeri, dan kegiatan sekolah
                        melalui sistem administrasi ini.

                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- =====================================================
         DATA TERBARU
    ====================================================== --}}

    <div class="row g-4">


        {{-- =================================================
             GURU TERBARU
        ================================================== --}}

        <div class="col-lg-6">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <h5>

                        <i class="bi bi-person-badge me-2"></i>

                        Guru Terbaru

                    </h5>

                    <p>
                        Data guru yang baru ditambahkan
                    </p>

                </div>


                <div class="dashboard-card-body p-0">

                    <div class="table-responsive">

                        <table class="dashboard-table">

                            <thead>

                                <tr>

                                    <th width="70">
                                        No
                                    </th>

                                    <th>
                                        Nama Guru
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($guruTerbaru ?? [] as $guru)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $guru->nama_guru }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="2">

                                            <div class="empty-data">

                                                <i class="bi bi-person-x"></i>

                                                Belum ada data guru.

                                            </div>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
             SISWA TERBARU
        ================================================== --}}

        <div class="col-lg-6">

            <div class="dashboard-card">

                <div class="dashboard-card-header">

                    <h5>

                        <i class="bi bi-people me-2"></i>

                        Siswa Terbaru

                    </h5>

                    <p>
                        Data siswa yang baru ditambahkan
                    </p>

                </div>


                <div class="dashboard-card-body p-0">

                    <div class="table-responsive">

                        <table class="dashboard-table">

                            <thead>

                                <tr>

                                    <th width="70">
                                        No
                                    </th>

                                    <th>
                                        Nama Siswa
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($siswaTerbaru ?? [] as $siswa)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $siswa->nama_siswa }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="2">

                                            <div class="empty-data">

                                                <i class="bi bi-person-x"></i>

                                                Belum ada data siswa.

                                            </div>

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

</div>

@endsection