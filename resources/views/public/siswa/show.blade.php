@extends('layouts.app')

@section('title')
    Detail Siswa - {{ $siswa->nama_guru }}
@endsection

@push('styles')
    <style>
        /* =====================================================
       DETAIL SISWA
    ===================================================== */

        .siswa-detail-section {
            background: #f3f8f5;
            min-height: 70vh;
            padding: 55px 0;
        }

        .siswa-detail-card {
            background: #ffffff;
            border: 1px solid #dfebe3;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
            overflow: hidden;
        }


        /* =====================================================
       FOTO
    ===================================================== */

        .siswa-detail-photo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .siswa-detail-photo img {
            width: 120px;
            height: 150px;
            object-fit: contain;
            border-radius: 10px;
            background: #e9f3ec;
        }

        .siswa-detail-placeholder {
            width: 120px;
            height: 150px;
            border-radius: 10px;
            background: #e9f3ec;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .siswa-detail-placeholder i {
            font-size: 50px;
            color: #7daa8b;
        }


        /* =====================================================
       DATA SISWA
    ===================================================== */

        .siswa-detail-name {
            color: #14532d;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 22px;
        }

        .siswa-detail-data {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 15px;
        }

        .siswa-detail-icon {
            width: 22px;
            flex-shrink: 0;

            color: #198754;
            text-align: center;

            margin-top: 2px;
        }

        .siswa-detail-label {
            display: block;

            color: #8a968f;
            font-size: 11px;

            margin-bottom: 2px;
        }

        .siswa-detail-value {
            display: block;

            color: #3d5145;
            font-size: 14px;
            font-weight: 600;

            line-height: 1.5;
        }


        /* =====================================================
       HEADER
    ===================================================== */

        .detail-label {
            color: #198754;
            font-size: 11px;
            font-weight: 700;

            letter-spacing: 1px;
            text-transform: uppercase;

            margin-bottom: 5px;
        }

        .detail-title {
            color: #14532d;
            font-size: 30px;
            font-weight: 800;

            margin-bottom: 5px;
        }

        .detail-subtitle {
            color: #89978e;
            font-size: 14px;

            margin-bottom: 30px;
        }


        /* =====================================================
       BUTTON
    ===================================================== */

        .btn-kembali {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #198754;
            color: #ffffff;

            border: none;
            border-radius: 9px;

            padding: 10px 18px;

            font-size: 13px;
            font-weight: 600;

            text-decoration: none;

            transition: .2s ease;
        }

        .btn-kembali:hover {
            background: #146c43;
            color: #ffffff;

            transform: translateY(-1px);
        }


        /* =====================================================
       RESPONSIVE
    ===================================================== */

        @media (max-width: 767px) {

            .siswa-detail-section {
                padding: 40px 15px;
            }

            .siswa-detail-photo {
                margin-bottom: 30px;
            }

            .siswa-detail-name {
                text-align: center;
                font-size: 22px;
            }

        }
    </style>
@endpush


@section('content')

    <section class="siswa-detail-section">

        <div class="container">

            {{-- =====================================================
            CARD DETAIL SISWA
            ===================================================== --}}

            <div class="siswa-detail-card">

                <div class="card-body p-4 p-md-5">

                    <div class="row align-items-center">

                        {{-- =================================================
                        FOTO SISWA
                        ================================================= --}}

                        <div class="col-md-3">

                            <div class="siswa-detail-photo">

                                @if($siswa->foto)

                                    <img src="{{ asset('storage/' . $siswa->foto) }}" alt="{{ $siswa->nama_guru }}">

                                @else

                                    <div class="siswa-detail-placeholder">

                                        <i class="bi bi-person-badge-fill"></i>

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- =================================================
                        DATA SISWA
                        ================================================= --}}

                        <div class="col-md-9">

                            <h2 class="siswa-detail-name">
                                {{ $siswa->nama_siswa }}
                            </h2>


                            {{-- JENIS KELAMIN --}}

                            <div class="siswa-detail-data">

                                <div class="siswa-detail-icon">

                                    <i class="bi bi-person-vcard-fill"></i>

                                </div>

                                <div>

                                    <span class="siswa-detail-label">
                                        Jenis Kelamin
                                    </span>

                                    <span class="siswa-detail-value">
                                        {{ $siswa->jenis_kelamin ?: '-' }}
                                    </span>

                                </div>

                            </div>


                            {{-- TAHUN MASUK --}}

                            <div class="siswa-detail-data">

                                <div class="siswa-detail-icon">

                                    <i class="bi bi-book-fill"></i>

                                </div>

                                <div>

                                    <span class="siswa-detail-label">
                                        Tahun Masuk
                                    </span>

                                    <span class="siswa-detail-value">
                                        {{ $siswa->tahun_masuk ?: '-' }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
            TOMBOL KEMBALI
            ===================================================== --}}


            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('siswa.public') }}" class="btn-kembali">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Siswa
                </a>
            </div>

        </div>

    </section>

@endsection