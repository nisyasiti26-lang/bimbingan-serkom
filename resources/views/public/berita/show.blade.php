@extends('layouts.app')

@section('title')
    {{ $berita->judul ?? 'Detail Berita' }} -
    {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
@endsection

@push('styles')
    <style>
        .berita-detail-section {
            background: #f3f8f5;
            padding: 55px 0;
            min-height: 75vh;
        }

        .berita-detail-card {
            background: #ffffff;
            border: 1px solid #dfebe3;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
        }

        .berita-detail-top {
            display: flex;
            align-items: flex-start;
            gap: 30px;
        }

        .berita-detail-media {
            width: 100%;
            max-width: 420px;
            flex-shrink: 0;
        }

        .berita-detail-image {
            display: block;
            width: 100%;
            max-height: 320px;
            object-fit: contain;
            background: #f3f8f5;
            border-radius: 12px;
        }

        .berita-detail-placeholder {
            width: 100%;
            min-height: 230px;
            background: #e9f5ee;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .berita-detail-placeholder i {
            font-size: 65px;
            color: #198754;
        }

        .berita-detail-info {
            flex: 1;
            min-width: 0;
        }

        .berita-detail-title {
            color: #14532d;
            font-size: 27px;
            font-weight: 800;
            line-height: 1.4;
            margin-bottom: 22px;
            overflow-wrap: anywhere;
        }

        .berita-detail-meta {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
        }

        .berita-detail-meta i {
            color: #198754;
            font-size: 19px;
            margin-top: 2px;
        }

        .berita-detail-meta small {
            display: block;
            color: #71827b;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .berita-detail-meta strong {
            display: block;
            color: #17365d;
            font-size: 14px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .berita-detail-content {
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid #e6eee8;
        }

        .berita-detail-content h5 {
            color: #17365d;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .berita-detail-content p {
            color: #52685f;
            font-size: 14px;
            line-height: 1.9;
            margin-bottom: 18px;
            overflow-wrap: anywhere;
        }

        .berita-detail-content img {
            max-width: 100%;
            height: auto;
        }

        .btn-kembali-berita {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #198754;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-kembali-berita:hover {
            background: #146c43;
            color: #ffffff;
            transform: translateY(-2px);
        }

        @media (max-width: 767px) {
            .berita-detail-section {
                padding: 30px 0;
            }

            .berita-detail-card {
                padding: 20px;
            }

            .berita-detail-top {
                flex-direction: column;
                gap: 25px;
            }

            .berita-detail-media {
                max-width: 100%;
            }

            .berita-detail-image {
                max-height: 350px;
            }

            .berita-detail-title {
                font-size: 23px;
            }
        }
    </style>
@endpush

@section('content')

    <section class="berita-detail-section">
        <div class="container">

            {{-- KARTU DETAIL BERITA --}}
            <div class="berita-detail-card">

                <div class="berita-detail-top">

                    {{-- GAMBAR BERITA --}}
                    <div class="berita-detail-media">

                        @if(!empty($berita->gambar))

                            <img src="{{ asset('storage/' . ltrim($berita->gambar, '/')) }}" class="berita-detail-image"
                                alt="{{ $berita->judul ?? 'Foto berita' }}"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                            <div class="berita-detail-placeholder" style="display:none;">
                                <i class="bi bi-newspaper"></i>
                            </div>

                        @else

                            <div class="berita-detail-placeholder">
                                <i class="bi bi-newspaper"></i>
                            </div>

                        @endif

                    </div>


                    {{-- INFORMASI BERITA --}}
                    <div class="berita-detail-info">

                        <h1 class="berita-detail-title">
                            {{ $berita->judul ?? 'Berita Sekolah' }}
                        </h1>

                        {{-- TANGGAL PUBLIKASI --}}
                        <div class="berita-detail-meta">
                            <i class="bi bi-calendar3"></i>
                            <div>
                                <small>Tanggal Publikasi</small>
                                <strong>
                                    {{ $berita->tanggal ?? 'Belum tersedia' }}
                                </strong>
                            </div>
                        </div>

                        {{-- ISI BERITA DI BAWAH TANGGAL --}}
                        <div class="berita-detail-content">
                            <h5>
                                <i class="bi bi-info-circle"></i>
                                Isi Berita
                            </h5>

                            <p>
                                {!! nl2br(e(
                                $berita->isi
                                ?? $berita->deskripsi
                                ?? $berita->konten
                                ?? 'Isi berita belum tersedia.'
                            )) !!}
                            </p>
                        </div>

                        {{-- TOMBOL KEMBALI --}}
                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('berita.public') }}" class="btn btn-success">
                                <i class="bi bi-arrow-left"></i>
                                Kembali ke Berita
                            </a>
                        </div>


                    </div>
    </section>

@endsection