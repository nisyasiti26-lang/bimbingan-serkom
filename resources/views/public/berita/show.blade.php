@extends('layouts.app')

@section('title')
    {{ $berita->judul }} - {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
@endsection


@push('styles')

<style>

/* =====================================================
   DETAIL BERITA
===================================================== */

.berita-detail-section {
    background: #f3f8f5;
    padding: 70px 0;
    min-height: 70vh;
}

.berita-detail-header {
    margin-bottom: 35px;
}

.berita-detail-label {
    color: #198754;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.berita-detail-title {
    color: #14532d;
    font-size: 34px;
    font-weight: 800;
    line-height: 1.3;
    margin-bottom: 12px;
}

.berita-detail-date {
    color: #71827b;
    font-size: 13px;
}

.berita-detail-date i {
    color: #198754;
    margin-right: 5px;
}


/* =====================================================
   CONTENT CARD
===================================================== */

.berita-detail-card {
    background: #ffffff;
    border: 1px solid #dfebe3;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,.05);
}

.berita-detail-image {
    width: 100%;
    max-width: 850px;
    max-height: 420px;
    object-fit: contain;
    display: block;
    margin: 0 auto;
    border-radius: 10px;
    background: #f3f8f5;
}

.berita-detail-placeholder {
    width: 100%;
    height: 350px;
    background: #e9f5ee;

    display: flex;
    align-items: center;
    justify-content: center;
}

.berita-detail-placeholder i {
    font-size: 80px;
    color: #198754;
}


/* =====================================================
   ISI BERITA
===================================================== */

.berita-detail-content {
    padding: 35px;
}

.berita-detail-content p {
    color: #52685f;
    font-size: 15px;
    line-height: 1.9;
    margin-bottom: 18px;
}

.berita-detail-content img {
    max-width: 100%;
    height: auto;
}


/* =====================================================
   BUTTON KEMBALI
===================================================== */

.btn-kembali-berita {
    display: inline-flex;
    align-items: center;
    gap: 7px;

    background: #198754;
    color: #ffffff;

    padding: 10px 18px;
    border-radius: 9px;

    text-decoration: none;

    font-size: 12px;
    font-weight: 600;

    margin-top: 30px;

    transition: .2s ease;
}

.btn-kembali-berita:hover {
    background: #146c43;
    color: #ffffff;
    transform: translateY(-2px);
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 768px) {

    .berita-detail-section {
        padding: 50px 0;
    }

    .berita-detail-title {
        font-size: 27px;
    }

    .berita-detail-content {
        padding: 25px;
    }

    .berita-detail-placeholder {
        height: 250px;
    }

}

</style>

@endpush


@section('content')

<section class="berita-detail-section">

    <div class="container">

        {{-- HEADER --}}
        <div class="berita-detail-header">

            

            <h1 class="berita-detail-title">
                {{ $berita->judul }}
            </h1>

            <div class="berita-detail-date">

                <i class="bi bi-calendar3"></i>

                {{ $berita->tanggal ?? '-' }}

            </div>

        </div>


        {{-- CARD BERITA --}}
        <div class="berita-detail-card">

            {{-- GAMBAR --}}
            @if($berita->gambar)

                <img
                    src="{{ asset('storage/' . $berita->gambar) }}"
                    class="berita-detail-image"
                    alt="{{ $berita->judul }}"
                >

            @else

                <div class="berita-detail-placeholder">

                    <i class="bi bi-newspaper"></i>

                </div>

            @endif


            {{-- ISI --}}
            <div class="berita-detail-content">

                {!! nl2br(e(
                    $berita->isi
                    ?? $berita->deskripsi
                    ?? $berita->konten
                    ?? 'Isi berita belum tersedia.'
                )) !!}


                <div>

                    <a
                        href="{{ route('home') }}#berita"
                        class="btn-kembali-berita"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Kembali ke Berita

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection