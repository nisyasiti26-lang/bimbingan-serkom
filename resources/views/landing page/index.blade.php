
@extends('layouts.app')

@section('title')
    {{ $profil->nama_sekolah ?? 'SMK Singaparna' }}
@endsection

@push('styles')
<style>
    :root {
        --hijau-utama: #198754;
        --hijau-tua: #14532d;
        --hijau-gelap: #146c43;
        --hijau-muda: #eaf6ef;
        --latar-hijau: #f3f8f5;
        --border-hijau: #dcebe1;
        --putih: #ffffff;
    }

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
        scroll-padding-top: 90px;
    }

    .section {
        padding: 70px 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-title h2 {
        color: var(--hijau-tua);
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .section-title p {
        color: #71827b;
        font-size: 13px;
        margin: 0;
    }

    /* HERO */
    .hero-section {
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        background:
            linear-gradient(
                rgba(20, 83, 45, .78),
                rgba(25, 135, 84, .72)
            ),
            url('{{ asset('images/latar.jpg') }}') center/cover no-repeat;
    }

    .hero-content {
        width: 100%;
        color: var(--putih);
        padding: 90px 0;
        text-align: center;
    }

    .hero-content h1 {
        font-size: 42px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 18px;
        overflow-wrap: anywhere;
    }

    .hero-content p {
        max-width: 720px;
        margin: 0 auto 28px;
        font-size: 16px;
        line-height: 1.8;
        color: #edf8f1;
    }

    .hero-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: var(--putih);
        color: var(--hijau-gelap);
        text-decoration: none;
        padding: 13px 22px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 700;
        transition: .25s ease;
    }

    .hero-button:hover {
        background: var(--hijau-muda);
        color: var(--hijau-tua);
        transform: translateY(-3px);
    }

    /* PROFIL SEKOLAH */
    .profile-section {
        padding: 35px 0 30px;
        background: var(--latar-hijau);
    }

    .welcome-image-wrapper {
        width: 100%;
        height: 600px;
        overflow: hidden;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(20, 83, 45, .14);
        background: var(--hijau-muda);
    }

    .welcome-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform .4s ease;
    }

    .welcome-image-wrapper:hover .welcome-image {
        transform: scale(1.04);
    }

    .welcome-content {
        padding: 10px 0;
    }

    .welcome-content h3 {
        color: var(--hijau-tua);
        font-size: 25px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .welcome-content p {
        color: #555f6d;
        font-size: 14px;
        line-height: 1.9;
        text-align: justify;
        margin-bottom: 15px;
    }

    .welcome-content .welcome-closing {
        color: var(--hijau-tua);
        font-weight: 600;
        margin-top: 20px;
    }

    .welcome-principal {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 25px;
    }

    .principal-line {
        width: 5px;
        height: 50px;
        flex-shrink: 0;
        background: var(--hijau-utama);
        border-radius: 5px;
    }

    .welcome-principal strong {
        display: block;
        color: var(--hijau-tua);
        font-size: 16px;
    }

    .welcome-principal span {
        display: block;
        color: #6c757d;
        font-size: 13px;
        margin-top: 5px;
    }

    /* SECTION */
    .guru-section,
    .berita-section,
    .galeri-section,
    .ekstrakurikuler-section,
    .siswa-section {
        background: #ffffff !important;
        padding: 50px 0;
    }

    /* KARTU GURU, BERITA, EKSTRAKURIKULER */
    .guru-card,
    .berita-card,
    .ekskul-card {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        background: var(--putih);
        border: 1px solid var(--border-hijau);
        border-radius: 14px;
        overflow: hidden;
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .guru-card:hover,
    .berita-card:hover,
    .ekskul-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(20, 83, 45, .12);
    }

    /* GURU */
    .guru-card {
        text-decoration: none;
        color: inherit;
    }

    .guru-photo {
        width: 100%;
        height: 260px;
        flex-shrink: 0;
        background: var(--hijau-muda);
        overflow: hidden;
    }

    .guru-photo img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .guru-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--hijau-muda);
    }

    .guru-placeholder i {
        color: var(--hijau-utama);
        font-size: 65px;
    }

    .guru-info {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 17px;
    }

    .guru-name {
        color: var(--hijau-tua);
        font-size: 15px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 15px;
        overflow-wrap: anywhere;
    }

    .guru-detail-wrap {
        display: flex;
        justify-content: flex-end;
        margin-top: auto;
    }

    .guru-detail-button {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        border-radius: 7px;
        background: var(--hijau-utama);
        color: var(--putih);
        font-size: 11px;
        font-weight: 600;
        transition: .2s ease;
    }

    /* TOMBOL SECTION */
    .btn-section,
    .btn-berita-more,
    .btn-galeri-more {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        background: var(--hijau-utama);
        color: var(--putih);
        padding: 10px 18px;
        border: none;
        border-radius: 9px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: .2s ease;
    }

    .btn-section:hover,
    .btn-berita-more:hover,
    .btn-galeri-more:hover,
    .guru-detail-button:hover,
    .berita-detail-button:hover,
    .ekskul-detail-button:hover {
        background: var(--hijau-gelap);
        color: var(--putih);
        transform: translateY(-2px);
    }

    .berita-more-wrap,
    .galeri-more-wrap,
    .ekskul-more-wrap {
        text-align: right;
        margin-top: 35px;
    }

    /* SISWA */
    .siswa-section {
        padding: 50px 0 70px;
    }

    .siswa-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
    }

    .siswa-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        padding: 22px;
        background: #ffffff;
        border: 1px solid var(--border-hijau);
        border-radius: 15px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, .05);
        transition: .25s ease;
    }

    .siswa-card:hover {
        transform: translateY(-5px);
        border-color: var(--hijau-utama);
        box-shadow: 0 10px 25px rgba(25, 135, 84, .15);
    }

    .siswa-icon {
        width: 55px;
        height: 55px;
        margin-bottom: 15px;
        border-radius: 12px;
        background: var(--hijau-muda);
        color: var(--hijau-utama);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .siswa-icon i {
        font-size: 27px;
    }

    .siswa-name {
        min-height: 45px;
        margin-bottom: 15px;
        color: var(--hijau-tua);
        font-size: 16px;
        font-weight: 700;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .siswa-data {
        padding-top: 13px;
        border-top: 1px solid var(--border-hijau);
    }

    .siswa-data-item {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 9px;
    }

    .siswa-data-item:last-child {
        margin-bottom: 0;
    }

    .siswa-data-item i {
        width: 18px;
        color: var(--hijau-utama);
        text-align: center;
    }

    .siswa-data-item span {
        color: #71827b;
        font-size: 12px;
        overflow-wrap: anywhere;
    }

    .siswa-detail-wrap {
        display: flex;
        justify-content: flex-end;
        margin-top: auto;
        padding-top: 18px;
    }

    .siswa-detail-button,
    .siswa-all-button {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        border-radius: 7px;
        background: var(--hijau-utama);
        color: #ffffff;
        font-size: 11px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s ease;
    }

    .siswa-detail-button:hover,
    .siswa-all-button:hover {
        background: var(--hijau-gelap);
        color: #ffffff;
    }

    .siswa-all-wrap {
        margin-top: 30px;
        text-align: right;
    }

    .siswa-all-button {
        padding: 11px 18px;
        border-radius: 8px;
        font-size: 13px;
    }

    /* BERITA */
    .berita-image,
    .berita-placeholder {
        width: 100%;
        height: 190px;
        flex-shrink: 0;
    }

    .berita-image {
        display: block;
        object-fit: cover;
        object-position: center;
    }

    .berita-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--hijau-muda);
    }

    .berita-placeholder i {
        color: var(--hijau-utama);
        font-size: 50px;
    }

    .berita-content {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 17px;
    }

    .berita-date {
        color: var(--hijau-utama);
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .berita-title {
        color: var(--hijau-tua);
        font-size: 15px;
        font-weight: 700;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .berita-detail-wrap {
        margin-top: auto;
        padding-top: 15px;
        display: flex;
        justify-content: flex-end;
    }

    .berita-detail-button {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--hijau-utama);
        color: var(--putih);
        padding: 8px 12px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 11px;
        font-weight: 600;
    }

    /* GALERI */
    .galeri-card {
        display: block;
        position: relative;
        width: 100%;
        height: 280px;
        border-radius: 16px;
        overflow: hidden;
        background: #dfeee5;
        text-decoration: none;
        border: 1px solid var(--border-hijau);
        box-shadow: 0 5px 16px rgba(20, 83, 45, .08);
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .galeri-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 28px rgba(20, 83, 45, .18);
    }

    .galeri-media {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: #eaf6ef;
    }

    .galeri-media img,
    .galeri-media video,
    .galeri-media iframe {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        border: none;
    }

    .galeri-placeholder {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
        width: 100%;
        height: 100%;
        color: var(--hijau-utama);
        background: var(--hijau-muda);
    }

    .galeri-placeholder i {
        font-size: 52px;
    }

    .galeri-overlay {
        position: absolute;
        inset: 0;
        z-index: 3;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
        padding: 22px 18px;
        color: var(--putih);
        background: linear-gradient(
            to top,
            rgba(8, 35, 20, .94) 0%,
            rgba(8, 35, 20, .55) 45%,
            rgba(8, 35, 20, .03) 100%
        );
        pointer-events: none;
    }

    .galeri-category {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 11px;
        margin-bottom: 10px;
        border-radius: 20px;
        background: var(--hijau-utama);
        color: var(--putih);
        font-size: 11px;
        font-weight: 700;
    }

    .galeri-overlay strong {
        display: block;
        font-size: 17px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 13px;
        overflow-wrap: anywhere;
    }

    .galeri-detail {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 9px 14px;
        border-radius: 9px;
        background: var(--hijau-utama);
        color: var(--putih);
        font-size: 12px;
        font-weight: 700;
    }

    .galeri-empty {
        width: 100%;
        padding: 45px 20px;
        background: var(--putih);
        border: 1px solid var(--border-hijau);
        border-radius: 14px;
        text-align: center;
        color: #71827b;
    }

    .galeri-empty i {
        display: block;
        color: var(--hijau-utama);
        font-size: 50px;
        margin-bottom: 10px;
    }

    /* EKSTRAKURIKULER */
    .ekskul-photo,
    .ekskul-photo-placeholder {
        width: 100%;
        height: 200px;
        flex-shrink: 0;
        background: var(--hijau-muda);
        overflow: hidden;
    }

    .ekskul-photo img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .ekskul-photo-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ekskul-photo-placeholder i {
        font-size: 55px;
        color: var(--hijau-utama);
    }

    .ekskul-content {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 18px;
    }

    .ekskul-card h5 {
        color: var(--hijau-tua);
        font-size: 15px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .ekskul-detail-wrap {
        display: flex;
        justify-content: flex-end;
        margin-top: auto;
    }

    .ekskul-detail-button {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 13px;
        border-radius: 8px;
        background: var(--hijau-utama);
        color: #ffffff;
        font-size: 12px;
        font-weight: 600;
        transition: .2s ease;
    }

    .ekskul-card-link {
        display: block;
        width: 100%;
        height: 100%;
        color: inherit;
        text-decoration: none;
    }

    .ekskul-card-link:hover {
        color: inherit;
    }

    .ekskul-card-link:hover .ekskul-detail-button {
        background: var(--hijau-gelap);
    }

    /* RESPONSIVE */
    @media (max-width: 991px) {
        .hero-content h1 {
            font-size: 34px;
        }

        .welcome-image-wrapper {
            height: 350px;
        }

        .guru-photo {
            height: 240px;
        }

        .siswa-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 575px) {
        .hero-section {
            min-height: 400px;
        }

        .hero-content {
            padding: 70px 15px;
        }

        .hero-content h1 {
            font-size: 29px;
        }

        .hero-content p {
            font-size: 13px;
        }

        .section {
            padding: 55px 0;
        }

        .section-title h2 {
            font-size: 24px;
        }

        .welcome-image-wrapper {
            height: 260px;
        }

        .guru-photo {
            height: 230px;
        }

        .siswa-grid {
            grid-template-columns: 1fr;
        }

        .galeri-card {
            height: 240px;
        }

        .berita-more-wrap,
        .galeri-more-wrap,
        .ekskul-more-wrap,
        .siswa-all-wrap {
            text-align: center;
        }
    }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section id="beranda" class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>{{ $profil->nama_sekolah ?? 'SMK Singaparna' }}</h1>

            <p>
                Selamat datang di Sistem Informasi Sekolah.
                Temukan informasi terbaru mengenai profil, guru,
                siswa, berita, galeri, dan kegiatan sekolah.
            </p>

            <a href="#profil" class="hero-button">
                <i class="bi bi-arrow-down-circle"></i>
                Jelajahi Sekolah
            </a>
        </div>
    </div>
</section>

{{-- PROFIL SEKOLAH --}}
<section id="profil" class="section profile-section">
    <div class="container">
        <div class="section-title">
            <h2>Sambutan Kepala Sekolah</h2>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="welcome-image-wrapper">
                    <img
                        src="{{ asset('images/kepala sekolah.jpeg') }}"
                        class="welcome-image"
                        alt="Kepala Sekolah"
                        loading="lazy"
                    >
                </div>
            </div>

            <div class="col-lg-7">
                <div class="welcome-content">
                    <h3>Assalamu'alaikum Warahmatullahi Wabarakatuh</h3>

                    <p>
                        Puji syukur kita panjatkan ke hadirat Allah SWT atas
                        segala rahmat dan karunia-Nya sehingga website resmi
                        {{ $profil->nama_sekolah ?? 'SMK Singaparna' }}
                        dapat menjadi sarana informasi dan komunikasi bagi
                        seluruh warga sekolah serta masyarakat.
                    </p>

                    <p>
                        Selamat datang di website
                        {{ $profil->nama_sekolah ?? 'SMK Singaparna' }}.
                        Website ini diharapkan dapat memberikan informasi
                        mengenai profil sekolah, kegiatan peserta didik,
                        prestasi, tenaga pendidik, serta berbagai program
                        sekolah kepada masyarakat secara mudah dan transparan.
                    </p>

                    <p>
                        Kami berkomitmen untuk terus meningkatkan mutu pendidikan,
                        membentuk peserta didik yang berakhlak mulia, berprestasi,
                        disiplin, dan memiliki kepedulian terhadap lingkungan sekitar.
                    </p>

                    <p>
                        Semoga website ini dapat memberikan manfaat bagi semua
                        pihak dan mempererat hubungan antara sekolah, orang tua,
                        peserta didik, serta masyarakat.
                    </p>

                    <p class="welcome-closing">
                        Wassalamu'alaikum Warahmatullahi Wabarakatuh.
                    </p>

                    <div class="welcome-principal">
                        <div class="principal-line"></div>
                        <div>
                            <strong>
                                {{ $profil->kepala_sekolah ?? 'Kepala Sekolah' }}
                            </strong>
                            <span>Kepala Sekolah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- GURU & STAF --}}
<section id="guru" class="section guru-section">
    <div class="container">
        <div class="section-title">
            <h2>Staf &amp; Guru</h2>
            <p>
                Tenaga pendidik dan staf
                {{ $profil->nama_sekolah ?? 'SMK Singaparna' }}
            </p>
        </div>

        <div class="row g-4">
            @forelse(($guru ?? collect())->take(4) as $item)
                @php
                    $idGuru = $item->id_guru ?? null;
                    $namaGuru = $item->nama_guru ?? 'Nama Guru';
                    $fotoGuru = $item->foto ?? null;
                @endphp

                <div class="col-lg-3 col-md-6">
                    <a
                        href="{{ $idGuru !== null ? route('guru.show', ['id_guru' => $idGuru]) : route('guru.public') }}"
                        class="guru-card"
                    >
                        <div class="guru-photo">
                            @if(!empty($fotoGuru))
                                <img
                                    src="{{ asset('storage/' . $fotoGuru) }}"
                                    alt="Foto {{ $namaGuru }}"
                                    loading="lazy"
                                >
                            @else
                                <div class="guru-placeholder">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                            @endif
                        </div>

                        <div class="guru-info">
                            <div class="guru-name">{{ $namaGuru }}</div>

                            <div class="guru-detail-wrap">
                                <span class="guru-detail-button">
                                    Lihat Detail
                                    <i class="bi bi-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted text-center">
                        Data guru dan staf belum tersedia.
                    </p>
                </div>
            @endforelse
        </div>

        <div class="text-end mt-4">
            <a href="{{ route('guru.public') }}" class="btn-section">
                Lihat Semua Guru
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- SISWA --}}
<section id="siswa" class="section siswa-section">
    <div class="container">
        <div class="section-title">
            <h2>Siswa</h2>
            <p>
                Daftar siswa
                {{ $profil->nama_sekolah ?? 'SMK Singaparna' }}
            </p>
        </div>

        <div class="siswa-grid">
            @forelse(($siswa ?? collect())->take(4) as $item)
                @php
                    $idSiswa = $item->id ?? null;
                    $namaSiswa = $item->nama_siswa ?? 'Nama Siswa';
                @endphp

                <div class="siswa-card">
                    <div class="siswa-icon">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div class="siswa-name">
                        {{ $namaSiswa }}
                    </div>

                    <div class="siswa-detail-wrap">
                        @if($idSiswa !== null)
                            <a
                                href="{{ route('siswa.show', ['id_siswa' => $idSiswa]) }}"
                                class="siswa-detail-button"
                            >
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @else
                            <a
                                href="{{ route('siswa.public') }}"
                                class="siswa-detail-button"
                            >
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; padding: 45px 20px; text-align: center; background: #fff; border: 1px solid var(--border-hijau); border-radius: 12px; color: #71827b;">
                    <i class="bi bi-people" style="display:block;color:var(--hijau-utama);font-size:45px;margin-bottom:10px;"></i>
                    Belum ada data siswa.
                </div>
            @endforelse
        </div>

        <div class="siswa-all-wrap">
            <a href="{{ route('siswa.public') }}" class="siswa-all-button">
                Lihat Semua Siswa
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- BERITA --}}
<section id="berita" class="section berita-section">
    <div class="container">
        <div class="section-title">
            <h2>Berita Terbaru</h2>
            <p>Informasi dan berita terbaru sekolah</p>
        </div>

        <div class="row g-4">
            @forelse(($berita ?? collect())->take(3) as $item)
                @php
                    $slugBerita = $item->slug ?? null;
                    $judulBerita = $item->judul ?? 'Berita Sekolah';
                @endphp

                <div class="col-lg-4 col-md-6">
                    <div class="berita-card">
                        @if(!empty($item->gambar))
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                class="berita-image"
                                alt="{{ $judulBerita }}"
                                loading="lazy"
                            >
                        @else
                            <div class="berita-placeholder">
                                <i class="bi bi-newspaper"></i>
                            </div>
                        @endif

                        <div class="berita-content">
                            <div class="berita-date">
                                <i class="bi bi-calendar3"></i>
                                {{ $item->tanggal ?? '-' }}
                            </div>

                            <div class="berita-title">
                                {{ $judulBerita }}
                            </div>

                            <div class="berita-detail-wrap">
                                @if(!empty($slugBerita))
                                    <a
                                        href="{{ route('berita.show', ['slug' => $slugBerita]) }}"
                                        class="berita-detail-button"
                                    >
                                        Baca Selengkapnya
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                @else
                                    <a
                                        href="{{ route('berita.public') }}"
                                        class="berita-detail-button"
                                    >
                                        Lihat Berita
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted text-center">Belum ada berita.</p>
                </div>
            @endforelse
        </div>

        <div class="berita-more-wrap">
            <a href="{{ route('berita.public') }}" class="btn-berita-more">
                Lihat Semua Berita
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- GALERI --}}
<section id="galeri" class="section galeri-section">
    <div class="container">
        <div class="section-title">
            <h2>Galeri</h2>
            <p>
                Dokumentasi foto dan video kegiatan
                {{ $profil->nama_sekolah ?? 'SMK Singaparna' }}
            </p>
        </div>

        <div class="row g-4">
            @forelse(($galeri ?? collect())->take(6) as $item)
                @php
                    $idGaleri = $item->id ?? null;
                    $judulGaleri = $item->judul ?? 'Dokumentasi Sekolah';
                    $kategoriGaleri = $item->kategori ?? 'Foto';
                    $fileGaleri = $item->file ?? null;
                @endphp

                <div class="col-lg-4 col-md-6">
                    <a
                        href="{{ $idGaleri !== null ? route('galeri.show', ['id' => $idGaleri]) : route('galeri.public') }}"
                        class="galeri-card"
                    >
                        <div class="galeri-media">
                            @if($kategoriGaleri === 'Video')
                                @if(!empty($fileGaleri))
                                    <video
                                        src="{{ asset('storage/' . $fileGaleri) }}"
                                        controls
                                        playsinline
                                        preload="metadata"
                                    >
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                @elseif(!empty($item->link_video))
                                    @php
                                        $videoUrl = trim($item->link_video);

                                        if (str_contains($videoUrl, 'youtube.com/watch')) {
                                            parse_str(
                                                parse_url($videoUrl, PHP_URL_QUERY) ?? '',
                                                $videoQuery
                                            );

                                            if (!empty($videoQuery['v'])) {
                                                $videoUrl = 'https://www.youtube.com/embed/' . $videoQuery['v'];
                                            }
                                        } elseif (str_contains($videoUrl, 'youtu.be/')) {
                                            $videoId = trim(
                                                parse_url($videoUrl, PHP_URL_PATH) ?? '',
                                                '/'
                                            );

                                            if ($videoId !== '') {
                                                $videoUrl = 'https://www.youtube.com/embed/' . $videoId;
                                            }
                                        }
                                    @endphp

                                    <iframe
                                        src="{{ $videoUrl }}"
                                        title="{{ $judulGaleri }}"
                                        loading="lazy"
                                        allowfullscreen
                                    ></iframe>
                                @else
                                    <div class="galeri-placeholder">
                                        <i class="bi bi-play-circle"></i>
                                        <span>Video belum tersedia</span>
                                    </div>
                                @endif
                            @elseif(!empty($fileGaleri))
                                <img
                                    src="{{ asset('storage/' . $fileGaleri) }}"
                                    alt="{{ $judulGaleri }}"
                                    loading="lazy"
                                >
                            @else
                                <div class="galeri-placeholder">
                                    <i class="bi bi-images"></i>
                                    <span>Dokumentasi sekolah</span>
                                </div>
                            @endif
                        </div>

                        <div class="galeri-overlay">
                            <span class="galeri-category">
                                @if($kategoriGaleri === 'Video')
                                    <i class="bi bi-play-circle-fill"></i> Video
                                @else
                                    <i class="bi bi-image-fill"></i> Foto
                                @endif
                            </span>

                            <strong>{{ $judulGaleri }}</strong>

                            <span class="galeri-detail">
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </span>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="galeri-empty">
                        <i class="bi bi-images"></i>
                        <h5>Galeri Belum Tersedia</h5>
                        <p>Dokumentasi kegiatan sekolah akan ditampilkan di sini.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="galeri-more-wrap">
            <a href="{{ route('galeri.public') }}" class="btn-galeri-more">
                Lihat Semua Galeri
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- EKSTRAKURIKULER --}}
<section id="ekstrakurikuler" class="section ekstrakurikuler-section">
    <div class="container">
        <div class="section-title">
            <h2>Ekstrakurikuler</h2>
            <p>
                Kegiatan untuk mengembangkan minat, bakat,
                kedisiplinan, dan kreativitas siswa.
            </p>
        </div>

        <div class="row g-4">
            @forelse(($ekstrakurikuler ?? collect())->take(3) as $item)
                @php
                    $idEkskul = $item->id ?? null;
                    $namaEkskul = $item->nama_ekskul
                        ?? $item->nama
                        ?? 'Ekstrakurikuler';
                    $gambarEkskul = $item->gambar ?? null;
                @endphp

                <div class="col-lg-4 col-md-6">
                    <a
                        href="{{ $idEkskul !== null ? route('ekstrakurikuler.show', ['id' => $idEkskul]) : route('ekstrakurikuler.public') }}"
                        class="ekskul-card-link"
                    >
                        <div class="ekskul-card">
                            @if(!empty($gambarEkskul))
                                <div class="ekskul-photo">
                                    <img
                                        src="{{ asset('storage/' . $gambarEkskul) }}"
                                        alt="{{ $namaEkskul }}"
                                        loading="lazy"
                                    >
                                </div>
                            @else
                                <div class="ekskul-photo-placeholder">
                                    <i class="bi bi-stars"></i>
                                </div>
                            @endif

                            <div class="ekskul-content">
                                <h5>{{ $namaEkskul }}</h5>

                                <div class="ekskul-detail-wrap">
                                    <span class="ekskul-detail-button">
                                        Lihat Detail
                                        <i class="bi bi-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted text-center">
                        Data ekstrakurikuler belum tersedia.
                    </p>
                </div>
            @endforelse
        </div>

        <div class="ekskul-more-wrap">
            <a href="{{ route('ekstrakurikuler.public') }}" class="btn-section">
                Lihat Semua Ekstrakurikuler
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

@endsection
