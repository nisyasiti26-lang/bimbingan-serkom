@extends('layouts.app')

@section('title', 'Profil Pembuat Website')

@push('styles')
<style>
    /* SECTION PROFIL PEMBUAT */
    .profil-pembuat {
        padding: 45px 0 60px;
        background: #f3f8f5;
        min-height: 75vh;
    }

    /* JUDUL */
    .profil-heading {
        text-align: center;
        margin-top: -10px;
        margin-bottom: 30px;
    }

    .profil-heading h1 {
        color: #14532d;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    /* KARTU PROFIL */
    .profil-card {
        max-width: 1050px;
        margin: auto;
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(20, 83, 45, .10);
        display: grid;
        grid-template-columns: 38% 62%;
    }

    /* IDENTITAS */
    .profil-identitas {
        background: linear-gradient(145deg, #198754, #14532d);
        color: white;
        padding: 40px 25px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .profil-foto {
        display: block;
        width: 250px;
        height: 250px;
        max-width: 100%;
        border-radius: 50%;
        object-fit: cover;
        object-position: center;
        border: 6px solid rgba(255, 255, 255, .9);
        margin-bottom: 20px;
        background: white;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .18);
    }

    .profil-identitas h2 {
        font-size: 23px;
        font-weight: 700;
        overflow-wrap: anywhere;
        margin-bottom: 8px;
    }

    .profil-identitas p {
        margin-bottom: 0;
        color: #e0f4e7;
        font-size: 15px;
    }

    .profil-label {
        display: inline-block;
        margin-top: 15px;
        padding: 7px 14px;
        border: 1px solid rgba(255, 255, 255, .4);
        border-radius: 25px;
        color: #fff;
        font-size: 12px;
    }

    /* DETAIL PROFIL */
    .profil-detail {
        padding: 38px;
    }

    .profil-detail h3 {
        color: #14532d;
        font-weight: 700;
        font-size: 25px;
        margin-bottom: 10px;
    }

    .profil-detail .deskripsi {
        color: #718078;
        line-height: 1.8;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 13px 0;
        border-bottom: 1px solid #edf1ee;
    }

    .detail-item:last-of-type {
        border-bottom: none;
    }

    .detail-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e8f5ec;
        color: #198754;
        border-radius: 12px;
        font-size: 19px;
    }

    .detail-item small {
        display: block;
        color: #87928b;
        font-size: 12px;
        margin-bottom: 4px;
    }

    .detail-item strong {
        display: block;
        color: #263b2e;
        font-size: 14px;
        overflow-wrap: anywhere;
    }

    /* TOMBOL KEMBALI */
    .profil-kembali {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #198754;
        color: white;
        padding: 11px 18px;
        border-radius: 9px;
        text-decoration: none;
        margin-top: 22px;
        font-size: 13px;
        font-weight: 600;
        transition: .2s ease;
    }

    .profil-kembali:hover {
        background: #14532d;
        color: white;
        transform: translateY(-2px);
    }

    /* TABLET */
    @media (max-width: 991px) {
        .profil-card {
            grid-template-columns: 35% 65%;
        }

        .profil-identitas {
            padding: 35px 20px;
        }

        .profil-foto {
            width: 210px;
            height: 210px;
        }

        .profil-detail {
            padding: 30px 25px;
        }
    }

    /* HP */
    @media (max-width: 768px) {
        .profil-pembuat {
            padding: 35px 15px 45px;
        }

        .profil-heading {
            margin-top: -5px;
            margin-bottom: 25px;
        }

        .profil-heading h1 {
            font-size: 26px;
        }

        .profil-card {
            grid-template-columns: 1fr;
        }

        .profil-identitas {
            padding: 35px 20px;
        }

        .profil-foto {
            width: 210px;
            height: 210px;
        }

        .profil-detail {
            padding: 25px 22px;
        }

        .profil-detail h3 {
            font-size: 22px;
        }
    }

    @media (max-width: 380px) {
        .profil-foto {
            width: 180px;
            height: 180px;
        }

        .profil-identitas h2 {
            font-size: 20px;
        }

        .profil-detail {
            padding: 22px 17px;
        }
    }
</style>
@endpush

@section('content')
<section class="profil-pembuat">
    <div class="container">

        {{-- JUDUL HALAMAN --}}
        <div class="profil-heading">
            <h1>Profil Pembuat Website</h1>
        </div>

        {{-- KARTU PROFIL --}}
        <div class="profil-card">

            {{-- FOTO DAN IDENTITAS --}}
            <div class="profil-identitas">
                <img
                    src="{{ asset('images/nisya.jpeg') }}"
                    alt="Foto pembuat website"
                    class="profil-foto"
                    onerror="this.onerror=null;this.src='https://placehold.co/300x300/e9f3ec/198754?text=Foto';"
                >

                <h2>Nisya Siti Nurazizah</h2>
                <p>Siswi Kelas XII RPL 2</p>

                <span class="profil-label">
                    <i class="bi bi-code-slash"></i>
                    Pembuat Website
                </span>
            </div>

            {{-- INFORMASI PROFIL --}}
            <div class="profil-detail">
                <h3>Halo, perkenalkan!</h3>

                <p class="deskripsi">
                    Halo! Nama saya Nisya Siti Nurazizah, siswi kelas
                    XII RPL 2. Saya membuat website ini sebagai media
                    informasi dan pengenalan profil sekolah. Berikut
                    informasi singkat mengenai diri saya.
                </p>

                {{-- NAMA LENGKAP --}}
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div>
                        <small>Nama Lengkap</small>
                        <strong>Nisya Siti Nurazizah</strong>
                    </div>
                </div>

                {{-- HOBI --}}
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <div>
                        <small>Hobi</small>
                        <strong>Membaca</strong>
                    </div>
                </div>

                {{-- KELAS --}}
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div>
                        <small>Kelas</small>
                        <strong>XII RPL 2</strong>
                    </div>
                </div>

                {{-- TEMPAT LAHIR --}}
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div>
                        <small>Tempat Lahir</small>
                        <strong>Tasikmalaya</strong>
                    </div>
                </div>

                {{-- TANGGAL LAHIR --}}
                <div class="detail-item">
                    <div class="detail-icon">
                        <i class="bi bi-calendar-event-fill"></i>
                    </div>
                    <div>
                        <small>Tanggal Lahir</small>
                        <strong>02 Juni 2009</strong>
                    </div>
                </div>

                {{-- TOMBOL KEMBALI --}}
                <a href="{{ route('home') }}" class="profil-kembali">
                    <i class="bi bi-house-door-fill"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
