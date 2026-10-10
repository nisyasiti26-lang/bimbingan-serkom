
@extends('layouts.app')

@section('title')
    Semua Ekstrakurikuler - {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
@endsection

@push('styles')
<style>

/* =====================================================
   HEADER
===================================================== */

.ekskul-header {
    padding: 55px 0 35px;
    text-align: center;
    background: #f3f8f5;
}

.section-label {
    color: #198754;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 6px;
}

.ekskul-header h1 {
    color: #14532d;
    font-size: 32px;
    font-weight: 800;
    margin: 0 0 8px;
}

.ekskul-header p {
    color: #89978e;
    font-size: 14px;
    margin: 0;
}

/* =====================================================
   SECTION
===================================================== */

.ekskul-section {
    padding: 35px 0 55px;
    background: #f3f8f5;
    min-height: 70vh;
}

/* =====================================================
   GRID
===================================================== */

.ekskul-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 25px;
}

/* =====================================================
   CARD
===================================================== */

.ekskul-card {
    display: flex;
    flex-direction: column;
    height: 100%;
    background: #ffffff;
    border: 1px solid #dfebe3;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
    transition: .2s ease;
}

.ekskul-card:hover {
    transform: translateY(-5px);
    border-color: #198754;
    box-shadow: 0 10px 24px rgba(25, 135, 84, .13);
}

/* =====================================================
   GAMBAR
===================================================== */

.ekskul-photo {
    width: 100%;
    height: 220px;
    background: #e9f3ec;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.ekskul-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: .3s ease;
}

.ekskul-card:hover .ekskul-photo img {
    transform: scale(1.04);
}

.ekskul-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e9f3ec;
}

.ekskul-placeholder i {
    font-size: 65px;
    color: #7daa8b;
}

/* =====================================================
   CONTENT
===================================================== */

.ekskul-info {
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 20px;
}

.ekskul-icon {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e8f5ec;
    color: #198754;
    border-radius: 10px;
    margin-bottom: 14px;
}

.ekskul-icon i {
    font-size: 21px;
}

.ekskul-title {
    color: #14532d;
    font-size: 18px;
    font-weight: 800;
    line-height: 1.45;
    margin-bottom: 12px;
}

.ekskul-meta {
    color: #198754;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 8px;
}

.ekskul-meta i {
    margin-right: 5px;
}

.ekskul-description {
    color: #61756d;
    font-size: 13px;
    line-height: 1.8;
    white-space: pre-line;
    margin: 0;
    overflow-wrap: anywhere;
}

/* =====================================================
   EMPTY
===================================================== */

.ekskul-empty {
    grid-column: 1 / -1;
    background: #ffffff;
    border: 1px solid #dfebe3;
    border-radius: 12px;
    padding: 50px 20px;
    text-align: center;
    color: #8b978f;
}

.ekskul-empty i {
    display: block;
    font-size: 50px;
    color: #76a88b;
    margin-bottom: 12px;
}

/* =====================================================
   BUTTON KEMBALI
===================================================== */

.ekskul-back-bottom {
    padding: 0 0 45px;
    background: #f3f8f5;
    text-align: center;
}

.btn-back-home {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 20px;
    background: #198754;
    color: #ffffff;
    border-radius: 9px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: .2s ease;
}

.btn-back-home:hover {
    background: #146c43;
    color: #ffffff;
    transform: translateY(-1px);
}

/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 991px) {
    .ekskul-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 575px) {
    .ekskul-grid {
        grid-template-columns: 1fr;
    }

    .ekskul-header {
        padding: 40px 15px 25px;
    }

    .ekskul-header h1 {
        font-size: 27px;
    }

    .ekskul-photo {
        height: 240px;
    }
}

</style>
@endpush

@section('content')

{{-- =====================================================
     HEADER
===================================================== --}}

<section class="ekskul-header">
    <div class="container">

        <div class="section-label">
            Pengembangan Minat dan Bakat
        </div>

        <h1>Semua Ekstrakurikuler</h1>

        <p>
            Berbagai kegiatan ekstrakurikuler
            {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
        </p>

    </div>
</section>

{{-- =====================================================
     DAFTAR EKSTRAKURIKULER
===================================================== --}}

<section class="ekskul-section">
    <div class="container">

        <div class="ekskul-grid">

            @forelse($ekstrakurikuler as $item)

                <article class="ekskul-card">

                    {{-- GAMBAR --}}

                    <div class="ekskul-photo">

                        @if(!empty($item->gambar))

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->nama_ekskul ?? $item->nama ?? 'Ekstrakurikuler' }}"
                            >

                        @else

                            <div class="ekskul-placeholder">
                                <i class="bi bi-stars"></i>
                            </div>

                        @endif

                    </div>

                    {{-- INFORMASI --}}

                    <div class="ekskul-info">

                        <div class="ekskul-icon">
                            <i class="bi bi-stars"></i>
                        </div>

                        <h2 class="ekskul-title">
                            {{ $item->nama_ekskul ?? $item->nama ?? 'Ekstrakurikuler' }}
                        </h2>

                        @if(!empty($item->pembina))
                            <div class="ekskul-meta">
                                <i class="bi bi-person-badge"></i>
                                Pembina: {{ $item->pembina }}
                            </div>
                        @endif

                        @if(!empty($item->jadwal_latihan))
                            <div class="ekskul-meta">
                                <i class="bi bi-calendar-week"></i>
                                {{ $item->jadwal_latihan }}
                            </div>
                        @endif

                        <p class="ekskul-description">
                            {{ $item->deskripsi ?? $item->keterangan ?? 'Deskripsi kegiatan belum tersedia.' }}
                        </p>

                    </div>

                </article>

            @empty

                <div class="ekskul-empty">
                    <i class="bi bi-stars"></i>
                    <strong>Belum ada data ekstrakurikuler.</strong>
                    <p class="mb-0 mt-2">
                        Data ekstrakurikuler yang ditambahkan akan ditampilkan di sini.
                    </p>
                </div>

            @endforelse

        </div>

    </div>
</section>

{{-- =====================================================
     KEMBALI KE BERANDA
===================================================== --}}

<div class="ekskul-back-bottom">
    <a href="{{ route('home') }}" class="btn-back-home">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Beranda
    </a>
</div>

@endsection