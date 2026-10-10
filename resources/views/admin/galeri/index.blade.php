@extends('index')

@section('title', 'Data Galeri - MTsN 10 Tasikmalaya')

@section('content')

    <style>
        .galeri-wrapper {
            width: 100%;
            margin-top: 10px;
        }

        .data-card {
            background: #fff;
            border: 1px solid #e2eaf3;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(31, 70, 110, .07);
        }

        .data-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e8eef5;
            background: #fff;
        }

        .data-title {
            margin: 0 0 5px;
            color: #000;
            font-size: 22px;
            font-weight: 700;
            line-height: 1.3;
        }

        .data-subtitle {
            margin: 0;
            color: #000;
            font-size: 13px;
            line-height: 1.5;
        }

        .btn-tambah {
            height: 42px;
            padding: 0 17px;
            border: none;
            border-radius: 8px;
            background: #198754;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all .2s ease;
            white-space: nowrap;
        }

        .btn-tambah:hover {
            background: #146c43;
            color: #fff;
            transform: translateY(-1px);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
        }

        .data-table thead th {
            height: 55px;
            padding: 0 9px;
            background: #f8fafc;
            color: #000;
            font-size: 13px;
            font-weight: 700;
            border-bottom: 1px solid #e4ebf3;
            vertical-align: middle;
            white-space: nowrap;
        }

        .data-table tbody td {
            padding: 15px 9px;
            color: #000;
            font-size: 13px;
            border-bottom: 1px solid #edf1f5;
            vertical-align: middle;
            line-height: 1.6;
            overflow-wrap: break-word;
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .data-table tbody tr {
            transition: background .2s ease;
        }

        .data-table tbody tr:hover {
            background: #fbfdff;
        }

        .col-no {
            width: 7%;
        }

        .col-judul {
            width: 18%;
        }

        .col-keterangan {
            width: 27%;
        }

        .col-file {
            width: 15%;
        }

        .col-kategori {
            width: 13%;
        }

        .col-tanggal {
            width: 11%;
        }

        .col-aksi {
            width: 9%;
        }

        .nomor-galeri {
            color: #000;
            font-size: 13px;
            font-weight: 500;
            text-align: center;
        }

        .judul-galeri {
            color: #000;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.6;
            overflow-wrap: break-word;
        }

        .keterangan-galeri {
            color: #000;
            font-size: 12px;
            font-weight: 400;
            line-height: 1.7;
            overflow-wrap: break-word;
        }

        .file-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-width: 0;
            min-height: 60px;
            overflow: hidden;
        }

        .galeri-image,
        .galeri-video {
            width: 80px;
            height: 60px;
            object-fit: cover;
            object-position: center;
            border-radius: 8px;
            border: 1px solid #dfe7f0;
            background: #f3f6f9;
            display: block;
        }

        .galeri-video {
            object-fit: contain;
        }

        .galeri-youtube {
            width: 90px;
            height: 60px;
            max-width: 100%;
            border: 1px solid #dfe7f0;
            border-radius: 8px;
            display: block;
            background: #000;
        }

        .file-kosong {
            width: 80px;
            height: 60px;
            border-radius: 8px;
            border: 1px solid #dfe7f0;
            background: #f3f6f9;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-lihat-video {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 8px 10px;
            border-radius: 7px;
            background: #fff1f2;
            color: #c82333;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-lihat-video:hover {
            background: #ffe0e3;
            color: #b02a37;
        }

        .kategori-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .kategori-badge {
            min-width: 65px;
            min-height: 29px;
            padding: 5px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .kategori-foto {
            background: #eef5ff;
            color: #155a98;
        }

        .kategori-video {
            background: #fff1f2;
            color: #c82333;
        }

        .tanggal-galeri {
            color: #000;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.5;
            white-space: nowrap;
        }

        .aksi-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .aksi-wrapper form {
            margin: 0;
        }

        .btn-edit,
        .btn-hapus {
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all .2s ease;
            cursor: pointer;
        }

        .btn-edit {
            background: #eaf8f0;
            color: #198754;
        }

        .btn-edit:hover {
            background: #d8f0e3;
            color: #146c43;
        }

        .btn-hapus {
            background: #fff0f1;
            color: #dc3545;
        }

        .btn-hapus:hover {
            background: #ffe0e3;
            color: #b02a37;
        }

        .alert-success-wrapper {
            padding: 14px 20px 0;
        }

        .empty-data {
            height: 190px;
            text-align: center;
            color: #6c757d !important;
        }

        .empty-data i {
            font-size: 38px;
            margin-bottom: 8px;
        }

        .empty-data span {
            font-size: 13px;
        }

        @media (max-width: 1100px) {
            .data-table {
                min-width: 1000px;
            }
        }

        @media (max-width: 768px) {
            .data-header {
                padding: 18px;
            }

            .data-title {
                font-size: 20px;
            }

            .data-subtitle {
                font-size: 12px;
            }

            .btn-tambah {
                height: 40px;
                padding: 0 14px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .data-header .d-flex {
                align-items: flex-start !important;
                gap: 12px;
                flex-direction: column;
            }
        }
    </style>

    <div class="galeri-wrapper">
        <div class="data-card">

            {{-- HEADER --}}
            <div class="data-header">
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <div>
                        <h3 class="data-title">Daftar Galeri</h3>
                        <p class="data-subtitle">
                            Data foto dan video kegiatan MTsN 10 Tasikmalaya.
                        </p>
                    </div>

                    <a href="{{ route('admin.galeri.create') }}" class="btn-tambah">
                        <i class="bi bi-plus-lg"></i>
                        Tambah Galeri
                    </a>
                </div>
            </div>

            {{-- ALERT SUCCESS --}}
            @if(session('success'))
                <div class="alert-success-wrapper">
                    <div class="alert alert-success mb-0">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            {{-- ALERT ERROR --}}
            @if(session('error'))
                <div class="alert-success-wrapper">
                    <div class="alert alert-danger mb-0">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            {{-- TABLE --}}
            <div class="table-wrapper">
                <table class="data-table">
                    <colgroup>
                        <col class="col-no">
                        <col class="col-judul">
                        <col class="col-keterangan">
                        <col class="col-file">
                        <col class="col-kategori">
                        <col class="col-tanggal">
                        <col class="col-aksi">
                    </colgroup>

                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th class="text-center">File</th>
                            <th class="text-center">Kategori</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($galeri as $item)
                            <tr>
                                {{-- NOMOR --}}
                                <td>
                                    <div class="nomor-galeri">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>

                                {{-- JUDUL --}}
                                <td>
                                    <div class="judul-galeri">
                                        {{ $item->judul }}
                                    </div>
                                </td>

                                {{-- KETERANGAN --}}
                                <td>
                                    <div class="keterangan-galeri">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->keterangan), 90) }}
                                    </div>
                                </td>

                                {{-- FILE FOTO / VIDEO --}}
                                <td>
                                    <div class="file-wrapper">

                                        {{-- FOTO --}}
                                        @if($item->kategori === 'Foto' && $item->file)
                                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                                rel="noopener noreferrer" title="Lihat foto">
                                                <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}"
                                                    class="galeri-image" loading="lazy">
                                            </a>

                                            {{-- VIDEO LOKAL --}}
                                        @elseif($item->kategori === 'Video' && $item->file)
                                            @php
                                                $ekstensi = strtolower(
                                                    pathinfo($item->file, PATHINFO_EXTENSION)
                                                );

                                                $mimeVideo = match ($ekstensi) {
                                                    'mov' => 'video/quicktime',
                                                    'avi' => 'video/x-msvideo',
                                                    'mkv' => 'video/x-matroska',
                                                    'webm' => 'video/webm',
                                                    default => 'video/mp4',
                                                };
                                            @endphp

                                            <video class="galeri-video" controls preload="metadata" title="{{ $item->judul }}">
                                                <source src="{{ asset('storage/' . $item->file) }}" type="{{ $mimeVideo }}">
                                                Browser tidak mendukung pemutaran video.
                                            </video>

                                            {{-- VIDEO YOUTUBE DARI LINK --}}
                                        @elseif($item->kategori === 'Video' && $item->link_video)
                                            @php
                                                $urlVideo = trim($item->link_video);
                                                $videoId = '';

                                                if (
                                                    preg_match(
                                                        '~youtu\.be/([^?&/]+)~',
                                                        $urlVideo,
                                                        $matches
                                                    )
                                                ) {
                                                    $videoId = $matches[1];
                                                } elseif (
                                                    preg_match(
                                                        '~youtube\.com/(?:watch\?.*v=|embed/|shorts/)([^?&/]+)~',
                                                        $urlVideo,
                                                        $matches
                                                    )
                                                ) {
                                                    $videoId = $matches[1];
                                                }
                                            @endphp

                                            @if($videoId)
                                                <iframe class="galeri-youtube" src="https://www.youtube.com/embed/{{ $videoId }}"
                                                    title="{{ $item->judul }}" loading="lazy"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                                </iframe>
                                            @else
                                                <a href="{{ $urlVideo }}" target="_blank" rel="noopener noreferrer"
                                                    class="btn-lihat-video">
                                                    <i class="bi bi-play-circle"></i>
                                                    Lihat Video
                                                </a>
                                            @endif

                                            {{-- FILE KOSONG --}}
                                        @else
                                            <div class="file-kosong" title="File tidak tersedia">
                                                <i class="bi bi-image fs-4"></i>
                                            </div>
                                        @endif

                                    </div>
                                </td>

                                {{-- KATEGORI --}}
                                <td>
                                    <div class="kategori-wrapper">
                                        @if($item->kategori === 'Foto')
                                            <span class="kategori-badge kategori-foto">
                                                <i class="bi bi-image"></i>
                                                Foto
                                            </span>
                                        @else
                                            <span class="kategori-badge kategori-video">
                                                <i class="bi bi-camera-video"></i>
                                                Video
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                {{-- TANGGAL --}}
                                <td>
                                    <span class="tanggal-galeri">
                                        @if($item->tanggal)
                                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>

                                {{-- AKSI --}}
                                <td>
                                    <div class="aksi-wrapper">

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.galeri.edit', \Illuminate\Support\Facades\Crypt::encryptString((string) $item->id)) }}"
                                            class="btn-edit" title="Edit Galeri">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.galeri.delete', \Illuminate\Support\Facades\Crypt::encryptString((string) $item->id)) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus data galeri ini?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-hapus" title="Hapus Galeri">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="empty-data">
                                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                        <i class="bi bi-images"></i>
                                        <span>Belum ada data galeri.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection