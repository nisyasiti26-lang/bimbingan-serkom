@extends('index') 
 
@section('title', 'Dashboard - MTsN 10 Tasikmalaya') 
 
@section('content') 
 
<style> 
 
    /* ========================= 
       DASHBOARD WRAPPER 
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
        color: #000000; 
        font-size: 24px; 
        font-weight: 700; 
        margin-bottom: 5px; 
    } 
 
    .welcome-section p { 
        color: #000000; 
        font-size: 14px; 
        margin: 0; 
    } 
 
 
    /* ========================= 
       STAT CARD 
    ========================= */ 
 
    .stat-card { 
        background: #ffffff; 
        border: 1px solid #b7e4c7; 
        border-radius: 12px; 
        box-shadow: 0 2px 8px rgba(25, 135, 84, 0.08); 
        min-height: 125px; 
        transition: 0.2s; 
    } 
 
    .stat-card:hover { 
        transform: translateY(-2px); 
        box-shadow: 0 5px 15px rgba(25, 135, 84, 0.12); 
    } 
 
    .stat-card-body { 
        padding: 20px; 
    } 
 
    .stat-title { 
        color: #000000; 
        font-size: 13px; 
        margin-bottom: 7px; 
    } 
 
    .stat-number { 
        color: #000000; 
        font-size: 26px; 
        font-weight: 700; 
        margin: 0; 
    } 
 
    .stat-icon { 
        width: 46px; 
        height: 46px; 
        border-radius: 10px; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        background: #eaf8f0; 
        color: #198754; 
        font-size: 21px; 
    } 
 
 
    /* ========================= 
       DASHBOARD CARD 
    ========================= */ 
 
    .dashboard-card { 
        background: #ffffff; 
        border: 1px solid #b7e4c7; 
        border-radius: 12px; 
        box-shadow: 0 2px 8px rgba(25, 135, 84, 0.08); 
        overflow: hidden; 
        height: 100%; 
    } 
 
    .dashboard-card-header { 
        padding: 18px 22px; 
        border-bottom: 1px solid #d8f0e3; 
    } 
 
    .dashboard-card-header h5 { 
        color: #000000; 
        font-size: 16px; 
        font-weight: 700; 
        margin: 0 0 4px; 
    } 
 
    .dashboard-card-header p { 
        color: #000000; 
        font-size: 13px; 
        margin: 0; 
    } 
 
    .dashboard-card-body { 
        padding: 20px; 
    } 
 
 
    /* ========================= 
       PROFILE 
    ========================= */ 
 
    .profile-box { 
        background: #f5fbf7; 
        border: 1px solid #d8f0e3; 
        border-radius: 10px; 
        padding: 17px; 
    } 
 
    .profile-item { 
        padding-bottom: 12px; 
        margin-bottom: 12px; 
        border-bottom: 1px solid #d8f0e3; 
    } 
 
    .profile-item:last-child { 
        padding-bottom: 0; 
        margin-bottom: 0; 
        border-bottom: none; 
    } 
 
    .profile-label { 
        color: #000000; 
        font-size: 12px; 
        margin-bottom: 4px; 
    } 
 
    .profile-value { 
        color: #000000; 
        font-size: 14px; 
        font-weight: 600; 
        line-height: 1.5; 
    } 
 
 
    /* ========================= 
       TABLE 
    ========================= */ 
 
    .dashboard-table { 
        width: 100%; 
        border-collapse: collapse; 
    } 
 
    .dashboard-table th { 
        color: #000000; 
        background: #eaf8f0; 
        font-size: 12px; 
        font-weight: 600; 
        padding: 12px 14px; 
        text-align: left; 
        border-bottom: 1px solid #b7e4c7; 
    } 
 
    .dashboard-table td { 
        color: #000000; 
        font-size: 13px; 
        padding: 13px 14px; 
        border-bottom: 1px solid #d8f0e3; 
    } 
 
    .dashboard-table tbody tr:last-child td { 
        border-bottom: none; 
    } 
 
    .dashboard-table tbody tr:hover { 
        background: #f5fbf7; 
    } 
 
 
    /* ========================= 
       EMPTY DATA 
    ========================= */ 
 
    .empty-data { 
        text-align: center; 
        padding: 25px 10px; 
        color: #000000; 
        font-size: 13px; 
    } 
 
    .empty-data i { 
        font-size: 30px; 
        display: block; 
        margin-bottom: 8px; 
        color: #000000; 
    } 
 
 
    /* ========================= 
       JARAK ANTAR BAGIAN 
    ========================= */ 
 
    .profile-section { 
        margin-bottom: 18px; 
    } 
 
    .latest-section { 
        margin-top: 0; 
    } 
 
 
    /* ========================= 
       RESPONSIVE 
    ========================= */ 
 
    @media (max-width: 768px) { 
 
        .dashboard-wrapper { 
            padding: 5px 0 20px; 
        } 
 
        .welcome-section { 
            margin-bottom: 20px; 
        } 
 
        .welcome-section h3 { 
            font-size: 21px; 
        } 
 
        .stat-card-body { 
            padding: 18px; 
        } 
 
        .dashboard-card-header { 
            padding: 17px; 
        } 
 
        .dashboard-card-body { 
            padding: 17px; 
        } 
 
        .profile-section { 
            margin-bottom: 15px; 
        } 
 
    } 
 
</style> 
 
 
<div class="dashboard-wrapper"> 
 
 
    {{-- ========================= 
         WELCOME 
    ========================= --}} 
 
    <div class="welcome-section"> 
 
        <h3> 
            Selamat Datang, {{ session('username', 'Admin') }} 
        </h3> 
 
        <p> 
            Selamat datang di Sistem Informasi MTsN 10 Tasikmalaya. 
        </p> 
 
    </div> 
 
 
 
    {{-- ========================= 
         STATISTIK 
    ========================= --}} 
 
    <div class="row g-4 mb-4"> 
 
 
        {{-- TOTAL GURU --}} 
        <div class="col-xl-3 col-md-6"> 
 
            <div class="stat-card h-100"> 
 
                <div class="stat-card-body"> 
 
                    <div class="d-flex justify-content-between align-items-center"> 
 
                        <div> 
 
                            <div class="stat-title"> 
                                Total Guru 
                            </div> 
 
                            <h3 class="stat-number"> 
                                {{ $jumlahGuru }} 
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
                                {{ $jumlahSiswa }} 
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
                                {{ $jumlahBerita }} 
                            </h3> 
 
                        </div> 
 
                        <div class="stat-icon"> 
                            <i class="bi bi-newspaper"></i> 
 
                        </div> 
 
                    </div> 
 
                </div> 
 
            </div> 
 
        </div> 
 
 
        {{-- TOTAL EKSTRAKURIKULER --}} 
        <div class="col-xl-3 col-md-6"> 
 
            <div class="stat-card h-100"> 
 
                <div class="stat-card-body"> 
 
                    <div class="d-flex justify-content-between align-items-center"> 
 
                        <div> 
 
                            <div class="stat-title"> 
                                Ekstrakurikuler 
                            </div> 
 
                            <h3 class="stat-number"> 
                                {{ $jumlahEkskul }} 
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
 
 
 
    {{-- ========================= 
         PROFIL SEKOLAH 
    ========================= --}} 
 
    <div class="profile-section"> 
 
        <div class="row"> 
 
            <div class="col-12"> 
 
                <div class="dashboard-card"> 
 
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
 
                        @if($profil) 
 
                            <div class="profile-box"> 
 
 
                                {{-- NAMA SEKOLAH --}} 
                                <div class="profile-item"> 
 
                                    <div class="profile-label"> 
                                        Nama Sekolah 
                                    </div> 
 
                                    <div class="profile-value"> 
                                        {{ $profil->nama_sekolah ?? '-' }} 
                                    </div> 
 
                                </div> 
 
 
                                {{-- KEPALA SEKOLAH --}} 
                                <div class="profile-item"> 
 
                                    <div class="profile-label"> 
                                        Kepala Sekolah 
                                    </div> 
 
                                    <div class="profile-value"> 
                                        {{ $profil->kepala_sekolah ?? '-' }} 
                                    </div> 
 
                                </div> 
 
 
                                {{-- NPSN --}} 
                                <div class="profile-item"> 
 
                                    <div class="profile-label"> 
                                        NPSN 
                                    </div> 
 
                                    <div class="profile-value"> 
                                        {{ $profil->npsn ?? '-' }} 
                                    </div> 
 
                                </div> 
 
 
                                {{-- ALAMAT --}} 
                                <div class="profile-item"> 
 
                                    <div class="profile-label"> 
                                        Alamat 
                                    </div> 
 
                                    <div class="profile-value"> 
                                        {{ $profil->alamat ?? '-' }} 
                                    </div> 
 
                                </div> 
 
 
                                {{-- KONTAK --}} 
                                <div class="profile-item"> 
 
                                    <div class="profile-label"> 
                                        Kontak 
                                    </div> 
 
                                    <div class="profile-value"> 
                                        {{ $profil->kontak ?? '-' }} 
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
 
        </div> 
 
    </div> 
 
 
 
    {{-- ========================= 
         DATA TERBARU 
    ========================= --}} 
 
    <div class="latest-section"> 
 
        <div class="row g-4"> 
 
 
            {{-- ========================= 
                 GURU TERBARU 
            ========================= --}} 
 
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
 
                                    @forelse($guruTerbaru as $guru) 
 
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
 
 
 
            {{-- ========================= 
                 SISWA TERBARU 
            ========================= --}} 
 
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
 
                                    @forelse($siswaTerbaru as $siswa) 
 
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
 
 
</div> 
 
@endsection