
@extends('layouts.app')

@section('title')
    Detail {{ $ekstrakurikuler->nama_ekskul ?? $ekstrakurikuler->nama ?? 'Ekstrakurikuler' }}
    - {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
@endsection

@section('content')

<style>
    .detail-ekskul-section {
        background: #f3f8f5;
        min-height: 75vh;
        padding: 55px 0 70px;
    }

    .detail-ekskul-card {
        display: flex;
        align-items: flex-start;
        gap: 35px;
        padding: 50px 60px;
        background: #fff;
        border: 1px solid #dfebe3;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(20, 83, 45, .06);
    }

    .detail-ekskul-photo {
        width: 150px;
        height: 180px;
        flex-shrink: 0;
        overflow: hidden;
        border-radius: 12px;
        background: #e8f5ec;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .detail-ekskul-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .detail-ekskul-photo i {
        font-size: 55px;
        color: #198754;
    }

    .detail-ekskul-content {
        flex: 1;
        min-width: 0;
    }

    .detail-ekskul-content h2 {
        color: #14532d;
        font-size: 27px;
        font-weight: 800;
        margin: 0 0 22px;
        overflow-wrap: anywhere;
    }

    .detail-ekskul-info {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .detail-ekskul-info-item {
        display: flex;
        align-items: flex-start;
        gap: 13px;
    }

    .detail-ekskul-info-item > i {
        color: #198754;
        font-size: 18px;
        margin-top: 3px;
    }

    .detail-ekskul-info-item strong {
        display: block;
        color: #71827b;
        font-size: 12px;
        font-weight: 400;
        margin-bottom: 3px;
    }

    .detail-ekskul-info-item span {
        display: block;
        color: #17365d;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    .detail-ekskul-description {
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #e6eee8;
    }

    .detail-ekskul-description h5 {
        color: #14532d;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .detail-ekskul-description p {
        color: #52685f;
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
        text-align: justify;
        overflow-wrap: anywhere;
    }

    .btn-kembali-ekskul {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 8px;
        background: #198754;
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s ease;
    }

    .btn-kembali-ekskul:hover {
        background: #146c43;
        color: #fff;
        transform: translateY(-2px);
    }

    @media (max-width: 767px) {
        .detail-ekskul-section {
            padding: 30px 0 45px;
        }

        .detail-ekskul-card {
            flex-direction: column;
            align-items: center;
            gap: 25px;
            padding: 30px 22px;
        }

        .detail-ekskul-photo {
            width: 160px;
            height: 180px;
        }

        .detail-ekskul-content {
            width: 100%;
        }

        .detail-ekskul-content h2 {
            font-size: 23px;
            text-align: center;
        }
    }
</style>

<section class="detail-ekskul-section">
    <div class="container">

        {{-- KARTU DETAIL --}}
        <div class="detail-ekskul-card">

            {{-- FOTO DI SEBELAH KIRI --}}
            <div class="detail-ekskul-photo">
                @if(!empty($ekstrakurikuler->gambar))
                    <img
                        src="{{ asset('storage/' . ltrim($ekstrakurikuler->gambar, '/')) }}"
                        alt="{{ $ekstrakurikuler->nama_ekskul ?? $ekstrakurikuler->nama ?? 'Ekstrakurikuler' }}"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">

                    <i class="bi bi-stars" style="display:none;"></i>
                @else
                    <i class="bi bi-stars"></i>
                @endif
            </div>

            {{-- INFORMASI DI SEBELAH KANAN --}}
            <div class="detail-ekskul-content">

                <h2>
                    {{ $ekstrakurikuler->nama_ekskul ?? $ekstrakurikuler->nama ?? 'Ekstrakurikuler' }}
                </h2>

                <div class="detail-ekskul-info">

                    <div class="detail-ekskul-info-item">
                        <i class="bi bi-person-badge-fill"></i>
                        <div>
                            <strong>Pembina</strong>
                            <span>
                                {{ $ekstrakurikuler->pembina ?? 'Belum tersedia' }}
                            </span>
                        </div>
                    </div>

                    <div class="detail-ekskul-info-item">
                        <i class="bi bi-calendar-week-fill"></i>
                        <div>
                            <strong>Jadwal Latihan</strong>
                            <span>
                                {{ $ekstrakurikuler->jadwal_latihan ?? 'Belum tersedia' }}
                            </span>
                        </div>
                    </div>

                   

                </div>

                {{-- DESKRIPSI --}}
                <div class="detail-ekskul-description">
                    <h5>
                        <i class="bi bi-info-circle-fill"></i>
                        Deskripsi Kegiatan
                    </h5>

                    <p>
                        {{ $ekstrakurikuler->deskripsi
                            ?? $ekstrakurikuler->keterangan
                            ?? 'Deskripsi kegiatan ekstrakurikuler belum tersedia.' }}
                    </p>
                </div>

            </div>
        </div>

        {{-- TOMBOL KEMBALI DI BAWAH KARTU --}}
        <div class="mt-4 text-end">
    <a href="{{ route('ekstrakurikuler.public') }}"
       class="btn-kembali-ekskul">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Ekstrakurikuler
    </a>
</div>

    </div>
</section>

@endsection
