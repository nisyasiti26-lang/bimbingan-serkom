@extends('layouts.app')

@section('title')
    {{ $galeri->judul ?? 'Detail Galeri' }} -
    {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
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
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
    }

    .detail-galeri-content {
        display: flex;
        align-items: flex-start;
        gap: 30px;
    }

    .detail-galeri-media {
        width: 100%;
        max-width: 420px;
        flex-shrink: 0;
        text-align: center;
    }

    .detail-galeri-media img {
        width: 100%;
        max-height: 320px;
        object-fit: contain;
        background: #f3f8f5;
        border-radius: 12px;
    }

    .detail-galeri-media video {
        width: 100%;
        max-height: 320px;
        border-radius: 12px;
        background: #000;
    }

    .detail-galeri-media iframe {
        width: 100%;
        aspect-ratio: 16 / 9;
        border: 0;
        border-radius: 12px;
    }

    .detail-galeri-info {
        flex: 1;
        min-width: 0;
    }

    .detail-galeri-info h2 {
        color: #14532d;
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 22px;
        overflow-wrap: anywhere;
    }

    .detail-galeri-meta {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 20px;
    }

    .detail-galeri-meta > i {
        color: #198754;
        font-size: 19px;
        margin-top: 2px;
    }

    .detail-galeri-meta small {
        display: block;
        color: #71827b;
        font-size: 12px;
        margin-bottom: 4px;
    }

    .detail-galeri-meta strong {
        display: block;
        color: #17365d;
        font-size: 14px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .detail-galeri-description {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e6eee8;
        color: #52685f;
        font-size: 14px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    .detail-galeri-description h5 {
        color: #17365d;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .media-kosong {
        min-height: 220px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 20px;
        background: #e8f5ec;
        border-radius: 12px;
        color: #71827b;
    }

    .media-kosong i {
        font-size: 45px;
        color: #198754;
    }

    /* TOMBOL KEMBALI DI KANAN BAWAH */
    .galeri-footer {
        display: flex;
        justify-content: flex-end;
        width: 100%;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e6eee8;
    }

    .btn-kembali-galeri {
        display: inline-flex;
        align-items: center;
        justify-content: center;
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

    @media (max-width: 767px) {
        .detail-galeri-section {
            padding: 30px 0;
        }

        .detail-galeri-card {
            padding: 20px;
        }

        .detail-galeri-content {
            flex-direction: column;
            gap: 25px;
        }

        .detail-galeri-media {
            max-width: 100%;
        }

        .detail-galeri-media img,
        .detail-galeri-media video {
            max-height: 350px;
        }

        .detail-galeri-info h2 {
            font-size: 23px;
        }
    }
</style>

<section class="detail-galeri-section">
    <div class="container">

        {{-- KARTU DETAIL GALERI --}}
        <div class="detail-galeri-card">

            <div class="detail-galeri-content">

                {{-- FOTO ATAU VIDEO --}}
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
                                } elseif (
                                    preg_match(
                                        '~^/(?:embed|shorts)/([^/]+)~',
                                        $path,
                                        $match
                                    )
                                ) {
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
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        @else
                            <div class="media-kosong">
                                <i class="bi bi-exclamation-circle"></i>
                                <span>Link video tidak dikenali.</span>
                                <a href="{{ $linkVideo }}" target="_blank" rel="noopener noreferrer">
                                    Buka video
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
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                        <div class="media-kosong" style="display:none;">
                            <i class="bi bi-exclamation-circle"></i>
                            <span>File gambar tidak ditemukan.</span>
                        </div>

                    @else

                        <div class="media-kosong">
                            <i class="bi bi-images"></i>
                            <span>Media galeri belum tersedia.</span>
                        </div>

                    @endif

                </div>

                {{-- INFORMASI GALERI --}}
                <div class="detail-galeri-info">

                    <h2>
                        {{ $galeri->judul ?? 'Dokumentasi Kegiatan Sekolah' }}
                    </h2>

                    <div class="detail-galeri-meta">
                        <i class="bi bi-calendar3"></i>
                        <div>
                            <small>Tanggal Kegiatan</small>
                            <strong>
                                {{ $galeri->tanggal ?? 'Belum tersedia' }}
                            </strong>
                        </div>
                    </div>

                    <div class="detail-galeri-meta">
                        <i class="bi bi-images"></i>
                        <div>
                            <small>Kategori</small>
                            <strong>
                                {{ $galeri->kategori ?? 'Foto' }}
                            </strong>
                        </div>
                    </div>

                    {{-- KETERANGAN --}}
                    <div class="detail-galeri-description">
                        <h5>
                            <i class="bi bi-info-circle"></i>
                            Keterangan Kegiatan
                        </h5>

                        <p class="mb-0">
                            {{ $galeri->keterangan ?? 'Belum ada keterangan untuk kegiatan ini.' }}
                        </p>
                    </div>

                </div>

            </div>

            {{-- TOMBOL KEMBALI DI KANAN BAWAH KARTU --}}
            <div class="galeri-footer">
                <a href="{{ route('galeri.public') }}"
                   class="btn-kembali-galeri">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Galeri
                </a>
            </div>

        </div>

    </div>
</section>

@endsection
