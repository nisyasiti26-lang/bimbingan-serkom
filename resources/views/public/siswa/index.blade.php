@extends('layouts.app')

@section('title')
    Siswa - {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
@endsection

@push('styles')
<style>
    /* ================================
       HEADER SISWA
    ================================ */

    .siswa-header {
        padding: 35px 0 20px;
        text-align: center;
        background: #f3f8f5;
    }

    .siswa-header .section-label {
        margin-bottom: 3px;
        color: #198754;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .siswa-header h1 {
        margin: 0 0 4px;
        color: #14532d;
        font-size: 30px;
        font-weight: 800;
        line-height: 1.3;
    }

    .siswa-header p {
        margin: 0;
        color: #89978e;
        font-size: 14px;
        line-height: 1.4;
    }

    /* ================================
       SECTION SISWA
    ================================ */

    .siswa-section {
        min-height: 70vh;
        padding: 20px 0 35px;
        background: #f3f8f5;
    }

    /* ================================
       GRID SISWA
    ================================ */

    .siswa-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
    }

    /* ================================
       CARD SISWA
    ================================ */

    .siswa-card {
        display: flex;
        flex-direction: column;
        min-height: 270px;
        padding: 22px;
        border: 1px solid #dfebe3;
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
        transition: all .2s ease;
    }

    .siswa-card:hover {
        transform: translateY(-5px);
        border-color: #198754;
        box-shadow: 0 10px 24px rgba(25, 135, 84, .15);
    }

    /* ================================
       ICON SISWA
    ================================ */

    .siswa-icon {
        display: flex;
        width: 58px;
        height: 58px;
        align-items: center;
        justify-content: center;
        margin-bottom: 17px;
        border-radius: 13px;
        background: #e9f3ec;
        color: #198754;
    }

    .siswa-icon i {
        font-size: 29px;
    }

    /* ================================
       NAMA SISWA
    ================================ */

    .siswa-name {
        min-height: 45px;
        margin-bottom: 16px;
        color: #14532d;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    /* ================================
       DATA SISWA
    ================================ */

    .siswa-data {
        padding-top: 13px;
        border-top: 1px solid #edf2ee;
    }

    .siswa-data-item {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        margin-bottom: 11px;
    }

    .siswa-data-item:last-child {
        margin-bottom: 0;
    }

    .siswa-data-icon {
        flex-shrink: 0;
        width: 18px;
        margin-top: 1px;
        color: #198754;
        text-align: center;
    }

    .siswa-data-text {
        min-width: 0;
    }

    .siswa-data-label {
        display: block;
        margin-bottom: 2px;
        color: #8a968f;
        font-size: 10px;
    }

    .siswa-data-value {
        display: block;
        color: #3d5145;
        font-size: 12px;
        font-weight: 600;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    /* ================================
       DATA KOSONG
    ================================ */

    .siswa-empty {
        grid-column: 1 / -1;
        padding: 45px 20px;
        border: 1px solid #dfebe3;
        border-radius: 12px;
        background: #fff;
        color: #8b978f;
        text-align: center;
    }

    .siswa-empty i {
        display: block;
        margin-bottom: 10px;
        color: #76a88b;
        font-size: 45px;
    }

    /* ================================
       TOMBOL KEMBALI
    ================================ */

    .siswa-back-bottom {
        padding: 0 0 45px;
        text-align: right;
    }

    .btn-back-dashboard {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 9px;
        background: #198754;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all .2s ease;
    }

    .btn-back-dashboard:hover {
        transform: translateY(-1px);
        background: #146c43;
        color: #fff;
    }

    /* ================================
       TABLET
    ================================ */

    @media (max-width: 991px) {
        .siswa-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    /* ================================
       HP
    ================================ */

    @media (max-width: 575px) {
        .siswa-header {
            padding: 30px 15px 18px;
        }

        .siswa-header h1 {
            font-size: 27px;
        }

        .siswa-section {
            padding: 18px 15px 30px;
        }

        .siswa-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .siswa-card {
            min-height: 0;
        }

        .siswa-back-bottom {
            padding: 0 15px 35px;
        }
    }
</style>
@endpush

@section('content')

{{-- ================================
     HEADER DATA SISWA
================================ --}}

<section class="siswa-header">
    <div class="container">
        <div class="section-label">
            Data Sekolah
        </div>

        <h1>Data Siswa</h1>

        <p>
            {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
        </p>
    </div>
</section>

{{-- ================================
     DAFTAR SISWA
================================ --}}

<section class="siswa-section">
    <div class="container">
        <div class="siswa-grid">

            @forelse ($siswa as $item)

                <div class="siswa-card">

                    {{-- ICON SISWA --}}
                    <div class="siswa-icon">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    {{-- NAMA SISWA --}}
                    <div class="siswa-name">
                        {{ $item->nama_siswa }}
                    </div>

                    {{-- DATA SISWA --}}
                    <div class="siswa-data">

                        {{-- NISN --}}
                        <div class="siswa-data-item">
                            <div class="siswa-data-icon">
                                <i class="bi bi-person-vcard-fill"></i>
                            </div>

                            <div class="siswa-data-text">
                                <span class="siswa-data-label">
                                    NISN
                                </span>

                                <span class="siswa-data-value">
                                    {{ $item->nisn ?? '-' }}
                                </span>
                            </div>
                        </div>

                        {{-- JENIS KELAMIN --}}
                        <div class="siswa-data-item">
                            <div class="siswa-data-icon">
                                <i class="bi bi-gender-ambiguous"></i>
                            </div>

                            <div class="siswa-data-text">
                                <span class="siswa-data-label">
                                    Jenis Kelamin
                                </span>

                                <span class="siswa-data-value">
                                    {{ $item->jenis_kelamin ?? '-' }}
                                </span>
                            </div>
                        </div>

                        {{-- TAHUN MASUK --}}
                        <div class="siswa-data-item">
                            <div class="siswa-data-icon">
                                <i class="bi bi-calendar3"></i>
                            </div>

                            <div class="siswa-data-text">
                                <span class="siswa-data-label">
                                    Tahun Masuk
                                </span>

                                <span class="siswa-data-value">
                                    {{ $item->tahun_masuk ?? '-' }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

            @empty

                <div class="siswa-empty">
                    <i class="bi bi-people"></i>
                    <p class="mb-0">
                        Belum ada data siswa.
                    </p>
                </div>

            @endforelse

        </div>
    </div>
</section>

{{-- ================================
     KEMBALI KE BERANDA
================================ --}}

<div class="container">
    <div class="siswa-back-bottom">
        <a href="{{ route('home') }}" class="btn-back-dashboard">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Beranda
        </a>
    </div>
</div>

@endsection
