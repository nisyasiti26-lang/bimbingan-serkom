@extends('index') 
 
@section('title', 'Profil Sekolah -MTsN 10 Tasikmalaya') 
 
@section('content') 
 
<style> 
 
    /* ========================================= 
       PROFIL SEKOLAH 
    ========================================= */ 
 
    .profil-wrapper { 
        width: 100%; 
        padding: 0 0 30px; 
    } 
 
 
    /* ========================================= 
       ALERT SUCCESS 
    ========================================= */ 
 
    .alert-success-profil { 
        display: flex; 
        align-items: center; 
        gap: 10px; 
 
        background: #eaf8f0; 
        border: 1px solid #b7e4c7; 
        color: #000000; 
 
        padding: 13px 16px; 
        border-radius: 8px; 
 
        margin-bottom: 20px; 
 
        font-size: 14px; 
        font-weight: 500; 
    } 
 
    .alert-success-profil i { 
        font-size: 18px; 
        color: #198754; 
    } 
 
 
    /* ========================================= 
       ALERT ERROR 
    ========================================= */ 
 
    .alert-error-profil { 
        background: #f8d7da; 
        border: 1px solid #f5c2c7; 
        color: #000000; 
 
        padding: 13px 16px; 
        border-radius: 8px; 
 
        margin-bottom: 20px; 
 
        font-size: 14px; 
    } 
 
    .alert-error-profil i { 
        color: #dc3545; 
    } 
 
 
    /* ========================================= 
       HEADER PROFIL 
    ========================================= */ 
 
    .profil-header { 
        background: #ffffff; 
        border: 1px solid #b7e4c7; 
        border-radius: 10px; 
 
        padding: 20px 24px; 
 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
 
        margin-bottom: 20px; 
    } 
 
    .profil-header h3 { 
        margin: 0; 
 
        font-size: 22px; 
        font-weight: 700; 
 
        color: #000000; 
    } 
 
    .profil-header p { 
        margin: 5px 0 0; 
 
        font-size: 13px; 
 
        color: #000000; 
    } 
 
 
    /* ========================================= 
       BUTTON EDIT 
    ========================================= */ 
 
    .btn-edit-profil { 
        display: inline-flex; 
        align-items: center; 
        gap: 7px; 
 
        padding: 9px 15px; 
 
        background: #198754; 
        color: #ffffff; 
 
        border: none; 
        border-radius: 6px; 
 
        font-size: 12px; 
        font-weight: 600; 
 
        text-decoration: none; 
 
        transition: 0.2s; 
    } 
 
    .btn-edit-profil:hover { 
        background: #146c43; 
        color: #ffffff; 
    } 
 
 
    /* ========================================= 
       CARD PROFIL 
    ========================================= */ 
 
    .profil-card { 
        background: #ffffff; 
        border: 1px solid #b7e4c7; 
 
        border-radius: 10px; 
 
        overflow: hidden; 
    } 
 
 
    /* ========================================= 
       LOGO DAN FOTO 
    ========================================= */ 
 
    .profil-media { 
        display: grid; 
 
        grid-template-columns: 1fr 1.3fr; 
 
        gap: 25px; 
 
        padding: 25px; 
 
        border-bottom: 1px solid #d8f0e3; 
    } 
 
    .media-item { 
        text-align: center; 
    } 
 
    .media-title { 
        margin-bottom: 12px; 
 
        font-size: 13px; 
        font-weight: 600; 
 
        color: #000000; 
    } 
 
 
    /* ========================================= 
       LOGO 
    ========================================= */ 
 
    .logo-box { 
        height: 180px; 
 
        display: flex; 
        align-items: center; 
        justify-content: center; 
 
        padding: 10px; 
 
        background: #f5fbf7; 
 
        border: 1px solid #d8f0e3; 
 
        border-radius: 7px; 
    } 
 
    .logo-box img { 
        max-width: 160px; 
        max-height: 155px; 
 
        object-fit: contain; 
    } 
 
 
    /* ========================================= 
       FOTO SEKOLAH 
    ========================================= */ 
 
    .foto-box { 
        height: 180px; 
 
        display: flex; 
        align-items: center; 
        justify-content: center; 
 
        background: #f5fbf7; 
 
        border: 1px solid #d8f0e3; 
 
        border-radius: 7px; 
 
        overflow: hidden; 
    } 
 
    .foto-box img { 
        width: 100%; 
        height: 100%; 
 
        object-fit: cover; 
    } 
 
 
    /* ========================================= 
       DATA SEKOLAH 
    ========================================= */ 
 
    .data-sekolah { 
        padding: 25px; 
    } 
 
    .data-title { 
        margin-bottom: 15px; 
 
        font-size: 16px; 
        font-weight: 700; 
 
        color: #000000; 
    } 
 
    .data-table { 
        width: 100%; 
 
        border-collapse: collapse; 
    } 
 
    .data-table tr { 
        border-bottom: 1px solid #d8f0e3; 
    } 
 
    .data-table tr:last-child { 
        border-bottom: none; 
    } 
 
    .data-table td { 
        padding: 12px 8px; 
 
        font-size: 13px; 
 
        vertical-align: top; 
    } 
 
    .data-table td:first-child { 
        width: 170px; 
 
        font-weight: 600; 
 
        color: #000000; 
    } 
 
    .data-table td:nth-child(2) { 
        width: 25px; 
 
        text-align: center; 
 
        color: #000000; 
    } 
 
    .data-table td:last-child { 
        color: #000000; 
 
        line-height: 1.6; 
    } 
 
 
    /* ========================================= 
       DATA KOSONG 
    ========================================= */ 
 
    .empty-data { 
        min-height: 150px; 
 
        display: flex; 
 
        flex-direction: column; 
 
        align-items: center; 
 
        justify-content: center; 
 
        color: #000000; 
 
        font-size: 13px; 
    } 
 
    .empty-data i { 
        margin-bottom: 7px; 
 
        font-size: 30px; 
 
        color: #000000; 
    } 
 
 
    /* ========================================= 
       RESPONSIVE 
    ========================================= */ 
 
    @media (max-width: 900px) { 
 
        .profil-media { 
            grid-template-columns: 1fr; 
 
            gap: 25px; 
        } 
 
    } 
 
 
    @media (max-width: 600px) { 
 
        .profil-header { 
            flex-direction: column; 
 
            align-items: flex-start; 
 
            gap: 15px; 
        } 
 
        .btn-edit-profil { 
            width: 100%; 
 
            justify-content: center; 
        } 
 
        .profil-media { 
            padding: 18px; 
        } 
 
        .data-sekolah { 
            padding: 18px; 
        } 
 
        .data-table td { 
            font-size: 12px; 
        } 
 
        .data-table td:first-child { 
            width: 110px; 
        } 
 
    } 
 
</style> 
 
 
<div class="profil-wrapper"> 
 
 
    {{-- ========================================= 
         NOTIFIKASI BERHASIL 
    ========================================== --}} 
 
    @if(session('success')) 
 
        <div class="alert-success-profil"> 
 
            <i class="bi bi-check-circle-fill"></i> 
 
            <span> 
                {{ session('success') }} 
            </span> 
 
        </div> 
 
    @endif 
 
 
    {{-- ========================================= 
         NOTIFIKASI ERROR 
    ========================================== --}} 
 
    @if(session('error')) 
 
        <div class="alert-error-profil"> 
 
            <i class="bi bi-exclamation-circle-fill"></i> 
 
            {{ session('error') }} 
 
        </div> 
 
    @endif 
 
 
    {{-- ========================================= 
         HEADER PROFIL 
    ========================================== --}} 
 
    <div class="profil-header"> 
 
        <div> 
 
            <h3> 
                Profil Sekolah 
            </h3> 
 
            <p> 
                Kelola informasi profil MTsN 10 Tasikmalaya 
            </p> 
 
        </div> 
 
 
        {{-- ========================================= 
             TOMBOL TAMBAH / EDIT 
        ========================================== --}} 
 
        @auth 
 
            @if($profil) 
 
                <a 
                    href="{{ route('profile.sekolah.edit') }}" 
                    class="btn-edit-profil"> 
 
                    <i class="bi bi-pencil-square"></i> 
 
                    Edit Profil 
 
                </a> 
 
            @else 
 
                <a 
                    href="{{ route('profile.sekolah.edit') }}" 
                    class="btn-edit-profil"> 
 
                    <i class="bi bi-plus-circle"></i> 
 
                    Tambah Profil 
 
                </a> 
 
            @endif 
 
        @endauth 
 
    </div> 
 
 
    {{-- ========================================= 
         CARD PROFIL 
    ========================================== --}} 
 
    <div class="profil-card"> 
 
 
        {{-- ===================================== 
             LOGO DAN FOTO SEKOLAH 
        ====================================== --}} 
 
        <div class="profil-media"> 
 
 
            {{-- LOGO SEKOLAH --}} 
 
            <div class="media-item"> 
 
                <div class="media-title"> 
                    Logo Sekolah 
                </div> 
 
                <div class="logo-box"> 
 
                    @if($profil && $profil->logo) 
 
                        <img 
                            src="{{ asset('storage/' . $profil->logo) }}" 
                            alt="Logo Sekolah"> 
 
                    @else 
 
                        <div class="empty-data"> 
 
                            <i class="bi bi-image"></i> 
 
                            <span> 
                                Logo belum tersedia 
                            </span> 
 
                        </div> 
 
                    @endif 
 
                </div> 
 
            </div> 
 
 
            {{-- FOTO SEKOLAH --}} 
 
            <div class="media-item"> 
 
                <div class="media-title"> 
                    Foto Sekolah / Gedung 
                </div> 
 
                <div class="foto-box"> 
 
                    @if($profil && $profil->foto) 
 
                        <img 
                            src="{{ asset('storage/' . $profil->foto) }}" 
                            alt="Foto Sekolah"> 
 
                    @else 
 
                        <div class="empty-data"> 
 
                            <i class="bi bi-building"></i> 
 
                            <span> 
                                Foto sekolah belum tersedia 
                            </span> 
 
                        </div> 
 
                    @endif 
 
                </div> 
 
            </div> 
 
        </div> 
 
 
        {{-- ===================================== 
             DATA SEKOLAH 
        ====================================== --}} 
 
        <div class="data-sekolah"> 
 
            <div class="data-title"> 
                Informasi Sekolah 
            </div> 
 
 
            @if($profil) 
 
                <table class="data-table"> 
 
 
                    {{-- NAMA SEKOLAH --}} 
 
                    <tr> 
 
                        <td> 
                            Nama Sekolah 
                        </td> 
 
                        <td> 
                            : 
                        </td> 
 
                        <td> 
                            {{ $profil->nama_sekolah ?? '-' }} 
                        </td> 
 
                    </tr> 
 
 
                    {{-- KEPALA SEKOLAH --}} 
 
                    <tr> 
 
                        <td> 
                            Kepala Sekolah 
                        </td> 
 
                        <td> 
                            : 
                        </td> 
 
                        <td> 
                            {{ $profil->kepala_sekolah ?? '-' }} 
                        </td> 
 
                    </tr> 
 
 
                    {{-- NPSN --}} 
 
                    <tr> 
 
                        <td> 
                            NPSN 
                        </td> 
 
                        <td> 
                            : 
                        </td> 
 
                        <td> 
                            {{ $profil->npsn ?? '-' }} 
                        </td> 
 
                    </tr> 
 
 
                    {{-- TAHUN BERDIRI --}} 
 
                    <tr> 
 
                        <td> 
                            Tahun Berdiri 
                        </td> 
 
                        <td> 
                            : 
                        </td> 
 
                        <td> 
                            {{ $profil->tahun_berdiri ?? '-' }} 
                        </td> 
 
                    </tr> 
 
 
                    {{-- ALAMAT --}} 
 
                    <tr> 
 
                        <td> 
                            Alamat 
                        </td> 
 
                        <td> 
                            : 
                        </td> 
 
                        <td> 
                            {{ $profil->alamat ?? '-' }} 
                        </td> 
 
                    </tr> 
 
 
                    {{-- KONTAK --}} 
 
                    <tr> 
 
                        <td> 
                            Kontak 
                        </td> 
 
                        <td> 
                            : 
                        </td> 
 
                        <td> 
                            {{ $profil->kontak ?? '-' }} 
                        </td> 
 
                    </tr> 
 
 
                    {{-- VISI DAN MISI --}} 
 
                    <tr> 
 
                        <td> 
                            Visi & Misi 
                        </td> 
 
                        <td> 
                            : 
                        </td> 
 
                        <td> 
                            {{ $profil->visi_misi ?? '-' }} 
                        </td> 
 
                    </tr> 
 
 
                    {{-- DESKRIPSI --}} 
 
                    <tr> 
 
                        <td> 
                            Deskripsi 
                        </td> 
 
                        <td> 
                            : 
                        </td> 
 
                        <td> 
                            {{ $profil->deskripsi ?? '-' }} 
                        </td> 
 
                    </tr> 
 
                </table> 
 
 
            @else 
 
                <div class="empty-data"> 
 
                    <i class="bi bi-building"></i> 
 
                    <span> 
                        Data profil sekolah belum tersedia. 
                    </span> 
 
                </div> 
 
            @endif 
 
        </div> 
 
    </div> 
 
</div> 
 
@endsection