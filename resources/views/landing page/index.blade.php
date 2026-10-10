@extends('layouts.app')

@section('title')
    {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
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
        --teks: #43534a;
        --putih: #fff;
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

    .welcome-label {
        display: inline-block;
        color: var(--hijau-gelap);
        background: #dff2e6;
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
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

    /* JARAK ANTARBAGIAN */
    .guru-section {
        padding: 50px 0;
    }

    .berita-section,
    .galeri-section,
    .ekstrakurikuler-section {
        padding: 30px 0 50px;
    }

    .guru-section,
    .galeri-section {
        background: var(--latar-hijau);
    }

    .berita-section,
    .ekstrakurikuler-section {
        background: var(--putih);
    }

    .guru-section .row,
    .berita-section .row,
    .galeri-section .row,
    .ekstrakurikuler-section .row {
        align-items: stretch;
    }

    .guru-section .row > [class*="col-"],
    .berita-section .row > [class*="col-"],
    .galeri-section .row > [class*="col-"],
    .ekstrakurikuler-section .row > [class*="col-"] {
        display: flex;
    }

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

    .guru-card {
        text-decoration: none;
        color: inherit;
    }

    .guru-card:hover,
    .berita-card:hover,
    .ekskul-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(20, 83, 45, .12);
    }

    /* GURU */
    .guru-photo {
        width: 100%;
        height: 260px;
        flex-shrink: 0;
        background: var(--hijau-muda);
        overflow: hidden;
    }

    .guru-photo img,
    .ekskul-photo img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .guru-placeholder,
    .berita-placeholder,
    .ekskul-photo-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--hijau-muda);
    }

    .guru-placeholder {
        width: 100%;
        height: 100%;
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

    /* TOMBOL */
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

    .btn-section {
        margin-top: 35px;
    }

    .btn-section:hover,
    .btn-berita-more:hover,
    .btn-galeri-more:hover,
    .guru-detail-button:hover,
    .berita-detail-button:hover {
        background: var(--hijau-gelap);
        color: var(--putih);
        transform: translateY(-2px);
    }

    .berita-more-wrap,
    .galeri-more-wrap,
    .ekskul-more-wrap {
        text-align: center;
        margin-top: 35px;
    }

    /* BERITA */
    .berita-image,
    .berita-placeholder {
        display: block;
        width: 100%;
        height: 190px;
        flex-shrink: 0;
    }

    .berita-image {
        object-fit: cover;
        object-position: center;
    }

    .berita-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
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
        transition: .2s ease;
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

    
/* MEDIA GALERI */
.galeri-media {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: #eaf6ef;
}

.galeri-media img,
.galeri-media video {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform .4s ease;
}

.galeri-card:hover .galeri-media img,
.galeri-card:hover .galeri-media video {
    transform: scale(1.06);
}

.galeri-placeholder {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
    width: 100%;
    height: 100%;
    color: #198754;
    background: #eaf6ef;
}

.galeri-placeholder i {
    font-size: 52px;
}

.galeri-placeholder span {
    font-size: 13px;
}

.galeri-play {
    position: absolute;
    inset: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    background: rgba(0, 0, 0, .12);
    pointer-events: none;
}

.galeri-play i {
    font-size: 56px;
    text-shadow: 0 2px 8px rgba(0, 0, 0, .5);
}

.galeri-empty h5 {
    color: #14532d;
    font-weight: 700;
}

.galeri-empty p {
    margin-bottom: 0;
    font-size: 13px;
}


    .galeri-card img,
    .galeri-card video {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .4s ease;
    }

    .galeri-card:hover img,
    .galeri-card:hover video {
        transform: scale(1.06);
    }

    .galeri-overlay {
        position: absolute;
        inset: 0;
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
        transition: background .3s ease;
    }

    .galeri-card:hover .galeri-overlay {
        background: linear-gradient(
            to top,
            rgba(8, 35, 20, .97) 0%,
            rgba(8, 35, 20, .62) 48%,
            rgba(8, 35, 20, .12) 100%
        );
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
        justify-content: center;
        gap: 9px;
        padding: 9px 14px;
        border: 1px solid rgba(255, 255, 255, .7);
        border-radius: 9px;
        background: var(--hijau-utama);
        color: var(--putih);
        font-size: 12px;
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .15);
        transition: background .25s ease, transform .25s ease;
    }

    .galeri-card:hover .galeri-detail {
        background: var(--hijau-gelap);
        transform: translateX(3px);
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

    .ekskul-photo-placeholder i {
        font-size: 55px;
        color: var(--hijau-utama);
    }

    .ekskul-content {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 22px;
    }

    .ekskul-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 10px;
        background: var(--hijau-muda);
        color: var(--hijau-utama);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 13px;
    }

    .ekskul-icon i {
        font-size: 20px;
    }

    .ekskul-card h5 {
        color: var(--hijau-tua);
        font-size: 15px;
        font-weight: 700;
        line-height: 1.5;
        margin-bottom: 10px;
        overflow-wrap: anywhere;
    }

    .ekskul-meta {
        color: var(--hijau-utama);
        font-size: 12px;
        line-height: 1.6;
        margin-bottom: 7px;
    }

    .ekskul-content p {
        color: #71827b;
        font-size: 12px;
        line-height: 1.8;
        margin: 10px 0 0;
    }

    /* RESPONSIVE */
    @media (max-width: 991px) {
        .hero-content h1 {
            font-size: 34px;
        }

        .guru-photo {
            height: 240px;
        }

        .welcome-image-wrapper {
            height: 350px;
        }

        .welcome-content h3 {
            font-size: 22px;
        }
    }

    @media (max-width: 767px) {
        .hero-content h1 {
            font-size: 30px;
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

        .welcome-content p {
            font-size: 14px;
        }

        .guru-photo {
            height: 230px;
        }

        .galeri-card {
            height: 240px;
        }

        .galeri-overlay {
            padding: 17px 14px;
        }

        .galeri-overlay strong {
            font-size: 15px;
        }
    }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section id="beranda" class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>{{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}</h1>
            <p>
                Selamat datang di Sistem Informasi Sekolah.
                Temukan informasi terbaru mengenai profil, guru,
                berita, galeri, dan kegiatan sekolah.
            </p>
            <a href="#profil" class="hero-button">
                <i class="bi bi-arrow-down-circle"></i>
                Jelajahi Sekolah
            </a>
        </div>
    </div>
</section>

{{-- SAMBUTAN KEPALA SEKOLAH --}}
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
                        alt="Kepala Sekolah MTsN 10 Tasikmalaya"
                        loading="lazy">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="welcome-content">
                    <span class="welcome-label">
                        <i class="bi bi-mortarboard-fill"></i>
                        MTsN 10 Tasikmalaya
                    </span>

                    <h3>Assalamu'alaikum Warahmatullahi Wabarakatuh</h3>

                    <p>
                        Puji syukur kita panjatkan ke hadirat Allah SWT atas
                        segala rahmat dan karunia-Nya sehingga website resmi
                        MTsN 10 Tasikmalaya dapat menjadi sarana informasi dan
                        komunikasi bagi seluruh warga sekolah serta masyarakat.
                    </p>

                    <p>
                        Selamat datang di website MTsN 10 Tasikmalaya. Website
                        ini diharapkan dapat memberikan informasi mengenai profil
                        sekolah, kegiatan peserta didik, prestasi, tenaga pendidik,
                        serta berbagai program sekolah kepada masyarakat secara
                        mudah dan transparan.
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
                                {{ $profil->kepala_sekolah ?? 'Kepala MTsN 10 Tasikmalaya' }}
                            </strong>
                            <span>Kepala Sekolah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- GURU --}}
<section id="guru" class="section guru-section">
    <div class="container">
        <div class="section-title">
            <h2>Staf &amp; Guru</h2>
            <p>Tenaga pendidik {{ $profil->nama_sekolah ?? 'sekolah' }}</p>
        </div>

        <div class="row g-4">
            @forelse(($guru ?? collect()) as $item)
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('guru.show', [
                        'encryptedId' => \Illuminate\Support\Facades\Crypt::encrypt($item->id_guru)
                    ]) }}" class="guru-card">
                        <div class="guru-photo">
                            @if($item->foto)
                                <img
                                    src="{{ asset('storage/' . $item->foto) }}"
                                    alt="{{ $item->nama_guru }}"
                                    loading="lazy">
                            @else
                                <div class="guru-placeholder">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                            @endif
                        </div>

                        <div class="guru-info">
                            <div class="guru-name">{{ $item->nama_guru }}</div>
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
                    <p class="text-muted text-center">Data guru belum tersedia.</p>
                </div>
            @endforelse
        </div>

        <div class="text-end">
            <a href="{{ route('guru.public') }}" class="btn-section">
                Lihat Semua Guru
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
            @forelse(($berita ?? collect()) as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="berita-card">
                        @if($item->gambar)
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                class="berita-image"
                                alt="{{ $item->judul }}"
                                loading="lazy">
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

                            <div class="berita-title">{{ $item->judul }}</div>

                            <div class="berita-detail-wrap">
                                <a
                                    href="{{ route('berita.show', ['slug' => $item->slug]) }}"
                                    class="berita-detail-button">
                                    Baca Selengkapnya
                                    <i class="bi bi-arrow-right"></i>
                                </a>
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

        <div class="berita-more-wrap text-end">
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
            <p>Dokumentasi foto dan video kegiatan MTsN 10 Tasikmalaya</p>
        </div>

        <div class="row g-4">
            @forelse(($galeri ?? collect()) as $item)
                <div class="col-lg-4 col-md-6">

                    <a href="{{ route('galeri.show', ['id' => $item->id]) }}"
                       class="galeri-card">

                        <div class="galeri-media">

                            @if(($item->kategori ?? 'Foto') === 'Video'
                                && !empty($item->link_video))

                                <div class="galeri-placeholder">
                                    <i class="bi bi-play-circle-fill"></i>
                                    <span>Video kegiatan sekolah</span>
                                </div>

                            @elseif(($item->kategori ?? 'Foto') === 'Video'
                                && !empty($item->file))

                                <video
                                    src="{{ asset('storage/' . $item->file) }}"
                                    muted
                                    playsinline
                                    preload="metadata">
                                </video>

                                <div class="galeri-play">
                                    <i class="bi bi-play-circle-fill"></i>
                                </div>

                            @elseif(!empty($item->file))

                                <img
                                    src="{{ asset('storage/' . $item->file) }}"
                                    alt="{{ $item->judul ?? 'Dokumentasi sekolah' }}"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                                <div class="galeri-placeholder"
                                     style="display:none;">
                                    <i class="bi bi-image"></i>
                                    <span>Foto tidak ditemukan</span>
                                </div>

                            @else

                                <div class="galeri-placeholder">
                                    <i class="bi bi-images"></i>
                                    <span>Dokumentasi sekolah</span>
                                </div>

                            @endif

                        </div>

                        <div class="galeri-overlay">

                            <span class="galeri-category">
                                @if(($item->kategori ?? 'Foto') === 'Video')
                                    <i class="bi bi-play-circle-fill"></i> Video
                                @else
                                    <i class="bi bi-image-fill"></i> Foto
                                @endif
                            </span>

                            <strong>
                                {{ $item->judul ?? 'Dokumentasi Sekolah' }}
                            </strong>

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

        <div class="galeri-more-wrap text-end">
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
            @forelse(($ekstrakurikuler ?? collect()) as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="ekskul-card">
                        @if(!empty($item->gambar))
                            <div class="ekskul-photo">
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->nama_ekskul ?? $item->nama ?? 'Ekstrakurikuler' }}"
                                    loading="lazy">
                            </div>
                        @else
                            <div class="ekskul-photo-placeholder">
                                <i class="bi bi-stars"></i>
                            </div>
                        @endif

                        <div class="ekskul-content">
                            <div class="ekskul-icon">
                                <i class="bi bi-stars"></i>
                            </div>

                            <h5>{{ $item->nama_ekskul ?? $item->nama ?? '-' }}</h5>

                            @if(!empty($item->pembina))
                                <div class="ekskul-meta">
                                    <i class="bi bi-person-badge"></i>
                                    Pembina: {{ $item->pembina }}
                                </div>
                            @endif

                            @if(!empty($item->jadwal_latihan))
                                <div class="ekskul-meta">
                                    <i class="bi bi-calendar-week"></i>
                                    Jadwal: {{ $item->jadwal_latihan }}
                                </div>
                            @endif

                            <p>
                                {{ $item->deskripsi ?? $item->keterangan ?? 'Deskripsi kegiatan belum tersedia.' }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted text-center">
                        Data ekstrakurikuler belum tersedia.
                    </p>
                </div>
            @endforelse
        </div>

        <div class="ekskul-more-wrap text-end">
            <a href="{{ route('ekstrakurikuler.public') }}" class="btn-section">
                Lihat Semua Ekstrakurikuler
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

@endsection