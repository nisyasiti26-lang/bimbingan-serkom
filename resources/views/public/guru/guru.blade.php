
@extends('layouts.app')

@section('title')
    Guru & Staf - {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
@endsection

@push('styles')
<style>
    /* HEADER */
    .guru-header {
        padding: 55px 0 35px;
        text-align: center;
        background: #f3f8f5;
    }

    .section-label {
        margin-bottom: 6px;
        color: #198754;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .guru-header h1 {
        margin: 0 0 8px;
        color: #14532d;
        font-size: 32px;
        font-weight: 800;
    }

    .guru-header p {
        margin: 0;
        color: #89978e;
        font-size: 14px;
    }

    /* GURU SECTION */
    .guru-section {
        min-height: 70vh;
        padding: 10px 0 35px;
        background: #f3f8f5;
    }

    .guru-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
    }

    /* CARD GURU */
    .guru-card {
        display: block;
        overflow: hidden;
        border: 1px solid #dfebe3;
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        text-decoration: none;
        transition: 0.2s ease;
    }

    .guru-card:hover {
        transform: translateY(-5px);
        border-color: #198754;
        box-shadow: 0 10px 24px rgba(25, 135, 84, 0.15);
    }

    /* FOTO GURU */
    .guru-photo {
        display: flex;
        width: 100%;
        height: 230px;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #e9f3ec;
    }

    .guru-photo img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
    }

    .guru-placeholder {
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
        background: #e9f3ec;
    }

    .guru-placeholder i {
        color: #7daa8b;
        font-size: 70px;
    }

    /* INFORMASI GURU */
    .guru-info {
        padding: 17px 18px 20px;
    }

    .guru-name {
        margin-bottom: 16px;
        color: #14532d;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.4;
        text-align: center;
        overflow-wrap: anywhere;
    }

    .guru-data {
        padding-top: 12px;
        border-top: 1px solid #edf2ee;
    }

    .guru-data-item {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        margin-bottom: 11px;
    }

    .guru-data-item:last-child {
        margin-bottom: 0;
    }

    .guru-data-icon {
        flex-shrink: 0;
        width: 17px;
        margin-top: 1px;
        color: #198754;
        text-align: center;
    }

    .guru-data-text {
        min-width: 0;
    }

    .guru-data-label {
        display: block;
        margin-bottom: 2px;
        color: #8a968f;
        font-size: 10px;
    }

    .guru-data-value {
        display: block;
        color: #3d5145;
        font-size: 12px;
        font-weight: 600;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    /* DATA KOSONG */
    .guru-empty {
        grid-column: 1 / -1;
        padding: 45px 20px;
        border: 1px solid #dfebe3;
        border-radius: 12px;
        background: #fff;
        color: #8b978f;
        text-align: center;
    }

    .guru-empty i {
        display: block;
        margin-bottom: 10px;
        color: #76a88b;
        font-size: 45px;
    }

    /* TOMBOL KEMBALI */
    .guru-back-bottom {
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
        transition: 0.2s ease;
    }

    .btn-back-dashboard:hover {
        transform: translateY(-1px);
        background: #146c43;
        color: #fff;
    }

    /* RESPONSIVE */
    @media (max-width: 991px) {
        .guru-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 575px) {
        .guru-header {
            padding: 40px 15px 25px;
        }

        .guru-header h1 {
            font-size: 27px;
        }

        .guru-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .guru-photo {
            height: 240px;
        }
    }
</style>
@endpush

@section('content')

{{-- HEADER --}}
<section class="guru-header">
    <div class="container">
        <div class="section-label">
            Data Sekolah
        </div>

        <h1>Guru &amp; Staf MTsN 10 Tasikmalaya</h1>

        <p>
            Tenaga pendidik
            {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
        </p>
    </div>
</section>

{{-- DAFTAR GURU --}}
<section class="guru-section">
    <div class="container">
        <div class="guru-grid">

            @forelse ($guru as $item)

                <a
                    href="{{ route('guru.show', ['slug' => $item->slug]) }}"
                    class="guru-card"
                >

                    {{-- FOTO --}}
                    <div class="guru-photo">
                        @if ($item->foto)
                            <img
                                src="{{ asset('storage/' . $item->foto) }}"
                                alt="Foto {{ $item->nama_guru }}"
                                loading="lazy"
                            >
                        @else
                            <div class="guru-placeholder">
                                <i class="bi bi-person-badge-fill"></i>
                            </div>
                        @endif
                    </div>

                    {{-- INFORMASI --}}
                    <div class="guru-info">

                        <div class="guru-name">
                            {{ $item->nama_guru }}
                        </div>

                        <div class="guru-data">

                            {{-- NIP --}}
                            <div class="guru-data-item">
                                <div class="guru-data-icon">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </div>

                                <div class="guru-data-text">
                                    <span class="guru-data-label">NIP</span>
                                    <span class="guru-data-value">
                                        {{ $item->nip ?: '-' }}
                                    </span>
                                </div>
                            </div>

                            {{-- MATA PELAJARAN --}}
                            <div class="guru-data-item">
                                <div class="guru-data-icon">
                                    <i class="bi bi-book-fill"></i>
                                </div>

                                <div class="guru-data-text">
                                    <span class="guru-data-label">
                                        Mata Pelajaran
                                    </span>

                                    <span class="guru-data-value">
                                        {{ $item->mapel ?: '-' }}
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>

                </a>

            @empty

                <div class="guru-empty">
                    <i class="bi bi-people"></i>
                    <p class="mb-0">Belum ada data guru.</p>
                </div>

            @endforelse

        </div>
    </div>
</section>

{{-- TOMBOL KEMBALI --}}
<div class="container">
    <div class="guru-back-bottom">
        <a href="{{ route('home') }}" class="btn-back-dashboard">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Beranda
        </a>
    </div>
</div>

@endsection