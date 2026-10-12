
@extends('layouts.app')

@section('title')
    Galeri - {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
@endsection

@push('styles')
<style>
    .galeri-header {
        padding: 35px 0 25px;
        text-align: center;
        background: #f3f8f5;
    }

    .galeri-header .section-label {
        margin-bottom: 5px;
        color: #198754;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .galeri-header h1 {
        margin: 0 0 7px;
        color: #14532d;
        font-size: 28px;
        font-weight: 800;
    }

    .galeri-header p {
        margin: 0;
        color: #89978e;
        font-size: 13px;
    }

    .galeri-section {
        min-height: 70vh;
        padding: 15px 0 45px;
        background: #f3f8f5;
    }

    .galeri-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        align-items: stretch;
        gap: 22px;
    }

    .galeri-card {
        min-width: 0;
        overflow: hidden;
        border: 1px solid #dfebe3;
        border-radius: 13px;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .05);
        transition: transform .2s ease, box-shadow .2s ease,
                    border-color .2s ease;
    }

    .galeri-card:hover {
        transform: translateY(-3px);
        border-color: #198754;
        box-shadow: 0 8px 20px rgba(25, 135, 84, .12);
    }

    .galeri-card-link {
        display: block;
        color: inherit;
        text-decoration: none;
    }

    .galeri-card-link:hover {
        color: inherit;
    }

    .galeri-photo {
        position: relative;
        display: flex;
        width: 100%;
        height: 250px;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #e9f3ec;
    }

    .galeri-photo img,
    .galeri-photo video {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .3s ease;
    }

    .galeri-card:hover .galeri-photo img,
    .galeri-card:hover .galeri-photo video {
        transform: scale(1.03);
    }

    .galeri-placeholder,
    .galeri-video-placeholder {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: #e9f3ec;
        color: #198754;
    }

    .galeri-placeholder i,
    .galeri-video-placeholder i {
        color: #7daa8b;
        font-size: 55px;
    }

    .galeri-video-placeholder span {
        font-size: 12px;
    }

    .galeri-play-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, .12);
        pointer-events: none;
    }

    .galeri-play-overlay i {
        color: #fff;
        font-size: 55px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, .5);
    }

    .galeri-info {
        padding: 16px 18px 18px;
    }

    .galeri-title {
        margin: 0 0 12px;
        color: #14532d;
        font-size: 17px;
        font-weight: 800;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .galeri-data {
        border-top: 1px solid #e5eee8;
    }

    .galeri-data-row {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
        padding: 9px 0;
        border-bottom: 1px solid #edf3ef;
    }

    .galeri-data-row:last-child {
        border-bottom: none;
    }

    .galeri-data-label {
        width: 100%;
        margin: 0;
        color: #718078;
        font-size: 12px;
        font-weight: 600;
        line-height: 1.4;
    }

    .galeri-data-value {
        width: 100%;
        margin: 0;
        color: #33483e;
        font-size: 12px;
        line-height: 1.5;
        text-align: left;
        overflow-wrap: anywhere;
    }

    .galeri-kategori {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 5px 10px;
        min-height: 28px;
        border-radius: 8px;
        background: #e8f5ed;
        color: #198754;
        font-size: 11px;
        font-weight: 600;
        line-height: 1.2;
    }

    .galeri-empty {
        grid-column: 1 / -1;
        padding: 45px 20px;
        border: 1px solid #dfebe3;
        border-radius: 12px;
        background: #fff;
        color: #8b978f;
        text-align: center;
    }

    .galeri-empty i {
        display: block;
        margin-bottom: 10px;
        color: #76a88b;
        font-size: 45px;
    }

    .galeri-empty p {
        margin: 0;
        font-size: 13px;
    }

    .galeri-back-bottom {
        padding: 0 0 45px;
        text-align:right;
    }

    .btn-back-dashboard {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 8px;
        background: #198754;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s ease;
    }

    .btn-back-dashboard:hover {
        transform: translateY(-2px);
        background: #146c43;
        color: #fff;
    }

    @media (max-width: 991px) {
        .galeri-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .galeri-photo {
            height: 220px;
        }
    }

    @media (max-width: 575px) {
        .galeri-header {
            padding: 30px 15px 20px;
        }

        .galeri-header h1 {
            font-size: 24px;
        }

        .galeri-section {
            padding-top: 12px;
        }

        .galeri-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .galeri-photo {
            height: 230px;
        }

        .galeri-info {
            padding: 14px;
        }

        .galeri-title {
            font-size: 16px;
        }
    }
</style>
@endpush

@section('content')

{{-- HEADER --}}
<section class="galeri-header">
    <div class="container">
        <div class="section-label">Dokumentasi Sekolah</div>

        <h1>Semua Galeri</h1>

        <p>
            Dokumentasi kegiatan
            {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
        </p>
    </div>
</section>

{{-- DAFTAR GALERI --}}
<section class="galeri-section">
    <div class="container">
        <div class="galeri-grid">

            @forelse(($galeri ?? collect()) as $item)

                @php
                    $kategori = strtolower(trim($item->kategori ?? 'foto'));
                    $sumberVideo = strtolower(trim($item->sumber_video ?? 'file'));
                    $file = $item->file ?? null;
                    $linkVideo = trim($item->link_video ?? '');

                    $videoId = null;

                    if ($linkVideo !== '') {
                        $parsedUrl = parse_url($linkVideo);
                        $host = strtolower($parsedUrl['host'] ?? '');
                        $path = $parsedUrl['path'] ?? '';

                        if (in_array($host, ['youtu.be', 'www.youtu.be'])) {
                            $videoId = trim($path, '/');
                        } elseif (in_array($host, [
                            'youtube.com',
                            'www.youtube.com',
                            'm.youtube.com'
                        ])) {
                            parse_str($parsedUrl['query'] ?? '', $query);

                            if (!empty($query['v'])) {
                                $videoId = $query['v'];
                            } elseif (preg_match(
                                '~^/(?:embed|shorts)/([^/]+)~',
                                $path,
                                $match
                            )) {
                                $videoId = $match[1];
                            }
                        }

                        if (
                            $videoId &&
                            !preg_match('/^[A-Za-z0-9_-]{11}$/', $videoId)
                        ) {
                            $videoId = null;
                        }
                    }
                @endphp

                <article class="galeri-card">

                    {{-- MEDIA --}}
                    <a
                        href="{{ route('galeri.show', ['id' => $item->id]) }}"
                        class="galeri-card-link"
                        aria-label="Lihat {{ $item->judul ?? 'detail galeri' }}"
                    >
                        <div class="galeri-photo">

                            {{-- VIDEO YOUTUBE --}}
                            @if($kategori === 'video' && $sumberVideo === 'link' && $linkVideo !== '')

                                @if($videoId)
                                    <img
                                        src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg"
                                        alt="{{ $item->judul ?? 'Thumbnail video sekolah' }}"
                                        loading="lazy"
                                        onerror="this.onerror=null;this.src='https://img.youtube.com/vi/{{ $videoId }}/mqdefault.jpg';"
                                    >

                                    <div class="galeri-play-overlay">
                                        <i class="bi bi-play-circle-fill"></i>
                                    </div>
                                @else
                                    <div class="galeri-video-placeholder">
                                        <i class="bi bi-play-circle-fill"></i>
                                        <span>Link YouTube tidak valid</span>
                                    </div>
                                @endif

                            {{-- VIDEO UPLOAD --}}
                            @elseif($kategori === 'video' && $file)

                                <video muted playsinline preload="metadata">
                                    <source src="{{ asset('storage/' . ltrim($file, '/')) }}">
                                </video>

                                <div class="galeri-play-overlay">
                                    <i class="bi bi-play-circle-fill"></i>
                                </div>

                            {{-- FOTO --}}
                            @elseif($file)

                                <img
                                    src="{{ asset('storage/' . ltrim($file, '/')) }}"
                                    alt="{{ $item->judul ?? 'Galeri Sekolah' }}"
                                    loading="lazy"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                                >

                                <div class="galeri-placeholder" style="display:none;">
                                    <i class="bi bi-image"></i>
                                    <span>Foto tidak ditemukan</span>
                                </div>

                            {{-- MEDIA KOSONG --}}
                            @else

                                <div class="galeri-video-placeholder">
                                    <i class="bi bi-images"></i>
                                    <span>Media belum tersedia</span>
                                </div>

                            @endif

                        </div>
                    </a>

                    {{-- INFORMASI GALERI --}}
                    <div class="galeri-info">

                        <h2 class="galeri-title">
                            {{ $item->judul ?? '-' }}
                        </h2>

                        <div class="galeri-data">

                            <div class="galeri-data-row">
                                <div class="galeri-data-label">Keterangan</div>
                                <div class="galeri-data-value">
                                    {{ $item->keterangan ?: '-' }}
                                </div>
                            </div>

                            <div class="galeri-data-row">
                                <div class="galeri-data-label">Kategori</div>
                                <div class="galeri-data-value">
                                    @if($item->kategori)
                                        <span class="galeri-kategori">
                                            {{ $item->kategori }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>

                            <div class="galeri-data-row">
                                <div class="galeri-data-label">Tanggal</div>
                                <div class="galeri-data-value">
                                    @if($item->tanggal)
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                </article>

            @empty

                <div class="galeri-empty">
                    <i class="bi bi-images"></i>
                    <p>Belum ada galeri.</p>
                </div>

            @endforelse

        </div>
    </div>
</section>

{{-- TOMBOL KEMBALI --}}

<div class="container">
<div class="galeri-back-bottom">
    <a href="{{ route('home') }}" class="btn-back-dashboard">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Beranda
    </a>
</div>
</div>  

@endsection
