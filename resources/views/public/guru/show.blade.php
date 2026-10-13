
@extends('layouts.app')

@section('title')
    Detail Guru - {{ $guru->nama_guru ?? 'Guru' }}
@endsection

@push('styles')
<style>
    .guru-detail-section {
        background: #f3f8f5;
        min-height: 70vh;
        padding: 55px 0;
    }

    .guru-detail-card {
        max-width: 900px;
        margin: auto;
        padding: 35px;
        background: #ffffff;
        border: 1px solid #dcebe1;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(20, 83, 45, .08);
    }

    .guru-detail-title {
        color: #14532d;
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .guru-detail-photo {
        width: 100%;
        max-width: 300px;
        height: 320px;
        object-fit: cover;
        object-position: center;
        border-radius: 14px;
        background: #eaf6ef;
    }

    .guru-detail-placeholder {
        width: 100%;
        max-width: 300px;
        height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: #eaf6ef;
        color: #198754;
        font-size: 75px;
    }

    .guru-detail-label {
        color: #71827b;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .guru-detail-value {
        color: #14532d;
        font-size: 15px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .guru-detail-item {
        padding: 14px 0;
        border-bottom: 1px solid #dcebe1;
    }

    .guru-back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 25px;
        padding: 11px 18px;
        background: #198754;
        color: #ffffff;
        text-decoration: none;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
    }

    .guru-back-button:hover {
        background: #146c43;
        color: #ffffff;
    }

    @media (max-width: 575px) {
        .guru-detail-card {
            padding: 22px;
        }

        .guru-detail-title {
            font-size: 23px;
        }

        .guru-detail-photo,
        .guru-detail-placeholder {
            max-width: 100%;
            height: 280px;
        }
    }
</style>
@endpush

@section('content')
<section class="guru-detail-section">
    <div class="container">
        <div class="guru-detail-card">

            <h1 class="guru-detail-title">Detail Guru</h1>

            <div class="row g-4 align-items-start">
                <div class="col-md-5 text-center">
                    @if(!empty($guru->foto))
                        <img
                            src="{{ asset('storage/' . $guru->foto) }}"
                            alt="Foto {{ $guru->nama_guru }}"
                            class="guru-detail-photo"
                        >
                    @else
                        <div class="guru-detail-placeholder mx-auto">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                    @endif
                </div>

                <div class="col-md-7">
                    <div class="guru-detail-item">
                        <div class="guru-detail-label">Nama Guru</div>
                        <div class="guru-detail-value">
                            {{ $guru->nama_guru ?? '-' }}
                        </div>
                    </div>

                    <div class="guru-detail-item">
                        <div class="guru-detail-label">NIP</div>
                        <div class="guru-detail-value">
                            {{ $guru->nip ?? '-' }}
                        </div>
                    </div>

                    <div class="guru-detail-item">
                        <div class="guru-detail-label">Mata Pelajaran</div>
                        <div class="guru-detail-value">
                            {{ $guru->mapel ?? '-' }}
                        </div>
                    </div>

                    @if(isset($guru->kategori))
                        <div class="guru-detail-item">
                            <div class="guru-detail-label">Kategori</div>
                            <div class="guru-detail-value">
                                {{ $guru->kategori }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <a href="{{ route('guru.public') }}" class="guru-back-button">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Daftar Guru
            </a>

        </div>
    </div>
</section>
@endsection
