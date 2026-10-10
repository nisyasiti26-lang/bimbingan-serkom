
@extends('layouts.app')

@section('title')
    Semua Berita - {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
@endsection

@push('styles')
<style>
/* HEADER */
.berita-header {
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

.berita-header h1 {
    color: #14532d;
    font-size: 32px;
    font-weight: 800;
    margin: 0 0 8px;
}

.berita-header p {
    color: #89978e;
    font-size: 14px;
    margin: 0;
}

/* SECTION */
.berita-section {
    padding: 35px 0 55px;
    background: #f3f8f5;
    min-height: 70vh;
}

/* GRID */
.berita-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 25px;
}

/* CARD */
.berita-card {
    background: #ffffff;
    border: 1px solid #dfebe3;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
    height: 100%;
    transition: .2s ease;
    display: flex;
    flex-direction: column;
}

.berita-card:hover {
    transform: translateY(-5px);
    border-color: #198754;
    box-shadow: 0 10px 24px rgba(25, 135, 84, .15);
}

/* GAMBAR */
.berita-photo {
    width: 100%;
    height: 230px;
    background: #e9f3ec;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.berita-photo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
    display: block;
}

.berita-placeholder {
    width: 100%;
    height: 230px;
    background: #e9f3ec;
    display: flex;
    align-items: center;
    justify-content: center;
}

.berita-placeholder i {
    font-size: 65px;
    color: #7daa8b;
}

/* CONTENT */
.berita-info {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

/* TANGGAL */
.berita-date {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #198754;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 10px;
}

.berita-date i {
    font-size: 12px;
}

/* JUDUL */
.berita-title {
    color: #14532d;
    font-size: 18px;
    font-weight: 800;
    line-height: 1.45;
    margin-bottom: 15px;
}

/* ISI BERITA */
.berita-isi {
    color: #61756d;
    font-size: 13px;
    line-height: 1.8;
    white-space: pre-line;
    margin: 0 0 18px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 7;
    overflow: hidden;
}

/* BUTTON DETAIL */
.btn-baca-berita {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    align-self: flex-start;
    margin-top: auto;
    padding: 9px 15px;
    background: #198754;
    color: #ffffff;
    border-radius: 8px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    transition: .2s ease;
}

.btn-baca-berita:hover {
    background: #146c43;
    color: #ffffff;
}

/* EMPTY */
.berita-empty {
    grid-column: 1 / -1;
    background: #ffffff;
    border: 1px solid #dfebe3;
    border-radius: 12px;
    padding: 50px 20px;
    text-align: center;
    color: #8b978f;
}

.berita-empty i {
    display: block;
    font-size: 50px;
    color: #76a88b;
    margin-bottom: 12px;
}

/* BUTTON KEMBALI */
.berita-back-bottom {
    padding: 0 0 45px;
    background: #f3f8f5;
    text-align: center;
}

.btn-back-dashboard {
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

.btn-back-dashboard:hover {
    background: #146c43;
    color: #ffffff;
    transform: translateY(-1px);
}

/* RESPONSIVE */
@media (max-width: 991px) {
    .berita-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 575px) {
    .berita-grid {
        grid-template-columns: 1fr;
    }

    .berita-header {
        padding: 40px 15px 25px;
    }

    .berita-header h1 {
        font-size: 27px;
    }

    .berita-photo,
    .berita-placeholder {
        height: 240px;
    }
}
</style>
@endpush

@section('content')

{{-- HEADER --}}
<section class="berita-header">
    <div class="container">
        <div class="section-label">
            Informasi Sekolah
        </div>

        <h1>Semua Berita</h1>

        <p>
            Seluruh berita dan informasi
            {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
        </p>
    </div>
</section>

{{-- SEMUA BERITA --}}
<section class="berita-section">
    <div class="container">
        <div class="berita-grid">

            @forelse($berita as $item)

                <article class="berita-card">

                    {{-- GAMBAR --}}
                    <div class="berita-photo">
                        @if($item->gambar)
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul }}"
                            >
                        @else
                            <div class="berita-placeholder">
                                <i class="bi bi-newspaper"></i>
                            </div>
                        @endif
                    </div>

                    {{-- INFORMASI BERITA --}}
                    <div class="berita-info">

                        <div class="berita-date">
                            <i class="bi bi-calendar3"></i>
                            {{ $item->tanggal ?? '-' }}
                        </div>

                        <div class="berita-title">
                            {{ $item->judul }}
                        </div>

                        <p class="berita-isi">
                            {{ $item->isi ?? 'Isi berita belum tersedia.' }}
                        </p>

                        {{-- DETAIL BERITA MENGGUNAKAN SLUG --}}
                        <a
                            href="{{ route('berita.show', ['slug' => $item->slug]) }}"
                            class="btn-baca-berita"
                        >
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>

            @empty

                <div class="berita-empty">
                    <i class="bi bi-newspaper"></i>
                    Belum ada berita.
                </div>

            @endforelse

        </div>
    </div>
</section>

{{-- KEMBALI KE BERANDA --}}
<div class="berita-back-bottom">
    <a
        href="{{ route('home') }}"
        class="btn-back-dashboard"
    >
        <i class="bi bi-arrow-left"></i>
        Kembali ke Beranda
    </a>
</div>

@endsection