
@extends('layouts.app')

@section('title', 'Detail Siswa - SMK Singaparna')

@push('styles')
<style>
    .siswa-detail-section {
        padding: 40px 0 60px;
        min-height: 75vh;
        background: #f3f8f5;
    }

    .siswa-detail-heading {
        text-align: center;
        margin-bottom: 30px;
    }

    .siswa-detail-heading h2 {
        color: #1b4332;
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .siswa-detail-heading p {
        color: #6c757d;
        font-size: 14px;
        margin-bottom: 0;
    }

    .siswa-detail-line {
        width: 60px;
        height: 4px;
        background: #40916c;
        border-radius: 10px;
        margin: 14px auto 0;
    }

    .siswa-detail-card {
        max-width: 700px;
        margin: 0 auto;
        padding: 25px 30px;
        background: #ffffff;
        border: 1px solid #e0ebe4;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(27, 67, 50, 0.06);
    }

    .siswa-detail-name {
        color: #1b4332;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e5eee8;
    }

    .siswa-detail-item {
        display: flex;
        padding: 12px 0;
        border-bottom: 1px solid #edf2ee;
        font-size: 15px;
    }

    .siswa-detail-item:last-child {
        border-bottom: none;
    }

    .siswa-detail-label {
        width: 190px;
        flex-shrink: 0;
        color: #6c757d;
    }

    .siswa-detail-value {
        color: #1b4332;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .siswa-detail-back {
        display: inline-block;
        padding: 10px 18px;
        background: #2d6a4f;
        color: #ffffff;
        text-decoration: none;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        transition: 0.2s;
    }

    .siswa-detail-back:hover {
        background: #1b4332;
        color: #ffffff;
    }

    .siswa-detail-footer {
        max-width: 700px;
        margin: 15px auto 0;
        display: flex;
        justify-content: flex-end;
    }

    @media (max-width: 576px) {
        .siswa-detail-section {
            padding: 35px 0 45px;
        }

        .siswa-detail-heading h2 {
            font-size: 26px;
        }

        .siswa-detail-card {
            padding: 20px;
        }

        .siswa-detail-item {
            flex-direction: column;
            gap: 5px;
        }

        .siswa-detail-label {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
<section class="siswa-detail-section">
    <div class="container">

        {{-- Judul halaman --}}
        <div class="siswa-detail-heading">
            <h2>Detail Siswa</h2>
            <p>Informasi data siswa SMK Singaparna</p>
            <div class="siswa-detail-line"></div>
        </div>

        {{-- Kartu informasi siswa --}}
        <div class="siswa-detail-card">

            <h4 class="siswa-detail-name">
                {{ $siswa->nama_siswa }}
            </h4>

            <div class="siswa-detail-item">
                <span class="siswa-detail-label">NISN</span>
                <span class="siswa-detail-value">
                    {{ $siswa->nisn ?: '-' }}
                </span>
            </div>

            <div class="siswa-detail-item">
                <span class="siswa-detail-label">Nama Siswa</span>
                <span class="siswa-detail-value">
                    {{ $siswa->nama_siswa }}
                </span>
            </div>

            <div class="siswa-detail-item">
                <span class="siswa-detail-label">Jenis Kelamin</span>
                <span class="siswa-detail-value">
                    {{ $siswa->jenis_kelamin ?: '-' }}
                </span>
            </div>

            <div class="siswa-detail-item">
                <span class="siswa-detail-label">Tahun Masuk</span>
                <span class="siswa-detail-value">
                    {{ $siswa->tahun_masuk ?: '-' }}
                </span>
            </div>

        </div>

        {{-- Tombol kembali di kanan bawah kartu --}}
        <div class="siswa-detail-footer">
            <a href="{{ route('siswa.public') }}"
               class="siswa-detail-back">
                <i class="bi bi-arrow-left"></i>
                Kembali Ke Daftar Siswa
            </a>
        </div>

    </div>
</section>
@endsection
