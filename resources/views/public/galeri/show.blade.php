
@extends('layouts.app')

@section('title')
    {{ $galeri->judul ?? 'Detail Galeri' }} - {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
@endsection

@section('content')

<style>
    .detail-galeri-section {
        background: #f3f8f5;
        min-height: 75vh;
        padding: 55px 0;
    }

    .detail-galeri-card {
        background: #ffffff;
        border: 1px solid #dfebe3;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
    }

    .detail-galeri-header {
        padding: 25px 30px;
        border-bottom: 1px solid #e6eee8;
    }

    .detail-galeri-header h2 {
        color: #14532d;
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .detail-galeri-meta {
        color: #71827b;
        font-size: 13px;
    }

    .detail-galeri-media {
        padding: 25px 30px 10px;
        text-align: center;
    }

    .detail-galeri-media img {
        display: block;
        width: 100%;
        max-height: 600px;
        object-fit: contain;
        background: #f5f7f5;
        border-radius: 12px;
    }

    .detail-galeri-media video {
        display: block;
        width: 100%;
        max-height: 600px;
        border-radius: 12px;
        background: #000;
    }

    .detail-galeri-media iframe {
        display: block;
        width: 100%;
        aspect-ratio: 16 / 9;
        min-height: 300px;
        border: 0;
        border-radius: 12px;
        background: #000;
    }

    .detail-galeri-description {
        padding: 20px 30px 30px;
        color: #52685f;
        font-size: 15px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    .detail-galeri-description h5 {
        color: #17365d;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .btn-kembali-galeri {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 8px;
        background: #198754;
        color: #ffffff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s ease;
    }

    .btn-kembali-galeri:hover {
        background: #146c43;
        color: #ffffff;
        transform: translateY(-2px);
    }

    .media-kosong {
        padding: 45px 15px;
        color: #71827b;
    }

    .media-kosong i {
        font-size: 55px;
        color: #198754;
    }

    @media (max-width: 575px) {
        .detail-galeri-section {
            padding: 30px 0;
        }

        .detail-galeri-header {
            padding: 20px;
        }

        .detail-galeri-header h2 {
            font-size: 22px;
        }

        .detail-galeri-media {
            padding: 18px 18px 5px;
        }

        .detail-galeri-media iframe {
            min-height: 200px;
        }

        .detail-galeri-description {
            padding: 18px 20px 25px;
        }
    }
</style>

<section class="detail-galeri-section">
    <div class="container">

        <div class="mb-4">
            <a href="{{ route('galeri.public') }}"
               class="btn-kembali-galeri">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Galeri
            </a>
        </div>

        <div class="detail-galeri-card">

            <div class="detail-galeri-header">
                <h2>
                    {{ $galeri->judul ?? 'Dokumentasi Kegiatan Sekolah' }}
                </h2>

                <div class="detail-galeri-meta">
                    <i class="bi bi-calendar3"></i>
                    {{ $galeri->tanggal ?? '-' }}

                    @if(!empty($galeri->kategori))
                        <span class="mx-2">|</span>
                        <i class="bi bi-images"></i>
                        {{ $galeri->kategori }}
                    @endif
                </div>
            </div>

            <div class="detail-galeri-media">

                @php
                    $kategori = strtolower(trim($galeri->kategori ?? 'foto'));
                    $sumberVideo = strtolower(trim($galeri->sumber_video ?? 'file'));
                    $file = $galeri->file ?? null;
                    $linkVideo = trim($galeri->link_video ?? '');
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
                    }

                    if (
                        $videoId &&
                        !preg_match('/^[A-Za-z0-9_-]{11}$/', $videoId)
                    ) {
                        $videoId = null;
                    }
                @endphp

                @if($kategori === 'video' && $sumberVideo === 'link' && $linkVideo !== '')

                    @if($videoId)
                        <iframe
                            src="https://www.youtube.com/embed/{{ $videoId }}"
                            title="{{ $galeri->judul ?? 'Video galeri sekolah' }}"
                            loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    @else
                        <div class="media-kosong">
                            <i class="bi bi-exclamation-circle"></i>
                            <p class="mt-3">
                                Link video tidak dikenali.
                            </p>
                            <a href="{{ $linkVideo }}"
                               target="_blank"
                               rel="noopener noreferrer">
                                Buka video di situs asal
                            </a>
                        </div>
                    @endif

                @elseif($file && $kategori === 'video')

                    <video controls playsinline preload="metadata">
                        <source src="{{ asset('storage/' . ltrim($file, '/')) }}">
                        Browser kamu tidak mendukung pemutaran video.
                    </video>

                @elseif($file)

                    <img
                        src="{{ asset('storage/' . ltrim($file, '/')) }}"
                        alt="{{ $galeri->judul ?? 'Dokumentasi Sekolah' }}"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">

                    <div class="media-kosong" style="display:none;">
                        <i class="bi bi-exclamation-circle"></i>
                        <p class="mt-3">File gambar tidak ditemukan.</p>
                    </div>

                @else

                    <div class="media-kosong">
                        <i class="bi bi-images"></i>
                        <p class="mt-3 mb-0">
                            Media galeri belum tersedia.
                        </p>
                    </div>

                @endif

            </div>

            <div class="detail-galeri-description">
                <h5>Keterangan Kegiatan</h5>

                <p class="mb-0">
                    {{ $galeri->keterangan ?? 'Belum ada keterangan untuk kegiatan ini.' }}
                </p>
            </div>

        </div>

    </div>
</section>

@endsection
