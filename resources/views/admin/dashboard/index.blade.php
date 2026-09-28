@extends('index')

@section('title', 'Dashboard - SMK Singaparna')

@section('content')

<style>
    .dashboard-content {
        width: 100%;
        padding: 0 30px 30px;
        margin-top: -250px;
    }

    .dashboard-content .welcome-title {
        color: #0b315f;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .dashboard-content .welcome-text {
        color: #7890a8;
        font-size: 14px;
        margin-bottom: 25px;
    }

    .dashboard-content .card {
        border: 1px solid #e8edf3;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .dashboard-content .card-body {
        padding: 24px;
    }

    .stat-card {
        min-height: 132px;
    }

    .stat-title {
        color: #7890a8;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .stat-number {
        color: #0b315f;
        font-size: 25px;
        font-weight: 700;
        margin: 0;
    }

    .stat-icon {
        color: #2459c5;
        font-size: 22px;
    }

    .section-card {
        min-height: 205px;
    }

    .section-title {
        color: #0b315f;
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .section-title i {
        color: #2459c5;
    }

    .empty-data {
        color: #7890a8;
        font-size: 14px;
    }

    .gallery-icon {
        color: #2459c5;
        font-size: 55px;
    }

    .gallery-number {
        color: #0b315f;
        font-size: 27px;
        font-weight: 700;
        margin-bottom: 2px;
    }

    .gallery-text {
        color: #7890a8;
        font-size: 13px;
    }

    .table th {
        color: #526273;
        font-size: 13px;
        font-weight: 600;
        border-bottom: 1px solid #e5eaf0;
    }

    .table td {
        font-size: 14px;
        color: #334155;
    }

    .latest-card {
        min-height: 200px;
    }

    @media (max-width: 768px) {
        .dashboard-content {
            padding: 0 15px 20px;
        }

        .dashboard-content .welcome-title {
            font-size: 21px;
        }
    }
</style>


<div class="dashboard-content">

    {{-- =========================
        WELCOME
    ========================== --}}
    <div class="mb-4">

        <h3 class="welcome-title">
            Selamat Datang, {{ session('username', 'Admin') }}
        </h3>

        <p class="welcome-text">
            Selamat datang di Sistem Informasi SMK Singaparna.
        </p>

    </div>


    {{-- =========================
        STATISTIK
    ========================== --}}
    <div class="row g-4">

        {{-- TOTAL GURU --}}
        <div class="col-xl-3 col-md-6">

            <div class="card stat-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="stat-title">
                                Total Guru
                            </p>

                            <h3 class="stat-number">
                                {{ $jumlahGuru ?? 0 }}
                            </h3>
                        </div>

                        <i class="bi bi-person-badge stat-icon"></i>

                    </div>

                </div>

            </div>

        </div>


        {{-- TOTAL SISWA --}}
        <div class="col-xl-3 col-md-6">

            <div class="card stat-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="stat-title">
                                Total Siswa
                            </p>

                            <h3 class="stat-number">
                                {{ $jumlahSiswa ?? 0 }}
                            </h3>
                        </div>

                        <i class="bi bi-people stat-icon"></i>

                    </div>

                </div>

            </div>

        </div>


        {{-- TOTAL BERITA --}}
        <div class="col-xl-3 col-md-6">

            <div class="card stat-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="stat-title">
                                Total Berita
                            </p>

                            <h3 class="stat-number">
                                {{ $jumlahBerita ?? 0 }}
                            </h3>
                        </div>

                        <i class="bi bi-newspaper stat-icon"></i>

                    </div>

                </div>

            </div>

        </div>


        {{-- EKSTRAKURIKULER --}}
        <div class="col-xl-3 col-md-6">

            <div class="card stat-card h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="stat-title">
                                Ekstrakurikuler
                            </p>

                            <h3 class="stat-number">
                                {{ $jumlahEkskul ?? 0 }}
                            </h3>
                        </div>

                        <i class="bi bi-trophy stat-icon"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
        PROFIL & GALERI
    ========================== --}}
    <div class="row g-4 mt-1">

        {{-- PROFIL SEKOLAH --}}
        <div class="col-lg-6">

            <div class="card section-card h-100">

                <div class="card-body">

                    <h5 class="section-title">
                        <i class="bi bi-building me-2"></i>
                        Profil Sekolah
                    </h5>

                    @if(isset($profil))

                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Nama Sekolah
                            </small>

                            <strong>
                                {{ $profil->nama_sekolah ?? '-' }}
                            </strong>

                        </div>

                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Alamat
                            </small>

                            <strong>
                                {{ $profil->alamat ?? '-' }}
                            </strong>

                        </div>

                        <div>

                            <small class="text-muted d-block">
                                Email
                            </small>

                            <strong>
                                {{ $profil->email ?? '-' }}
                            </strong>

                        </div>

                    @else

                        <div class="text-center py-4">

                            <i class="bi bi-building fs-1 text-muted"></i>

                            <p class="empty-data mt-2 mb-0">
                                Data profil sekolah belum tersedia.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- GALERI SEKOLAH --}}
        <div class="col-lg-6">

            <div class="card section-card h-100">

                <div class="card-body">

                    <h5 class="section-title">
                        <i class="bi bi-images me-2"></i>
                        Galeri Sekolah
                    </h5>

                    <div class="d-flex align-items-center">

                        <div class="me-4">

                            <i class="bi bi-images gallery-icon"></i>

                        </div>

                        <div>

                            <h2 class="gallery-number">
                                {{ $jumlahGaleri ?? 0 }}
                            </h2>

                            <p class="gallery-text mb-0">
                                Total foto galeri sekolah
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
        DATA TERBARU
    ========================== --}}
    <div class="row g-4 mt-1">

        {{-- GURU TERBARU --}}
        <div class="col-lg-6">

            <div class="card latest-card">

                <div class="card-body">

                    <h5 class="section-title">
                        <i class="bi bi-person-badge me-2"></i>
                        Guru Terbaru
                    </h5>

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <thead>

                                <tr>
                                    <th width="70">No</th>
                                    <th>Nama</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($guruTerbaru ?? [] as $guru)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $guru->nama ?? $guru->name ?? '-' }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="2"
                                            class="text-center text-muted py-4">

                                            <i class="bi bi-person-x fs-3 d-block mb-2"></i>

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


        {{-- SISWA TERBARU --}}
        <div class="col-lg-6">

            <div class="card latest-card">

                <div class="card-body">

                    <h5 class="section-title">
                        <i class="bi bi-people me-2"></i>
                        Siswa Terbaru
                    </h5>

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <thead>

                                <tr>
                                    <th width="70">No</th>
                                    <th>Nama</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($siswaTerbaru ?? [] as $siswa)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $siswa->nama ?? $siswa->name ?? '-' }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="2"
                                            class="text-center text-muted py-4">

                                            <i class="bi bi-person-x fs-3 d-block mb-2"></i>

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

</div>

@endsection