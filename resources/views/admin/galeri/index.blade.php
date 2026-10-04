@extends('index')

@section('title', 'Data Galeri - SMKS Singaparna')

@section('content')

<style>

    /* =========================================
       WRAPPER
    ========================================= */

    .galeri-wrapper {
        width: 100%;
        margin-top: 10px;
    }

    .data-card {
        background: #ffffff;
        border: 1px solid #e2eaf3;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(31, 70, 110, 0.07);
    }


    /* =========================================
       HEADER
    ========================================= */

    .data-header {
        padding: 28px 30px;
        border-bottom: 1px solid #e8eef5;
        background: #ffffff;
    }

    .data-title {
        margin: 0 0 6px 0;
        color: #17365d;
        font-size: 28px;
        font-weight: 700;
        line-height: 1.3;
    }

    .data-subtitle {
        margin: 0;
        color: #8291a5;
        font-size: 15px;
        line-height: 1.6;
    }


    /* =========================================
       BUTTON TAMBAH
    ========================================= */

    .btn-tambah {
        height: 52px;
        padding: 0 22px;
        border: none;
        border-radius: 9px;
        background: #1769aa;
        color: #ffffff;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        transition: all 0.2s ease;
    }

    .btn-tambah:hover {
        background: #12598f;
        color: #ffffff;
        transform: translateY(-1px);
    }


    /* =========================================
       TABLE WRAPPER
    ========================================= */

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }


    /* =========================================
       TABLE
    ========================================= */

    .data-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
        table-layout: fixed;
    }


    /* =========================================
       HEADER TABLE
    ========================================= */

    .data-table thead th {
        height: 74px;
        padding: 0 10px;

        background: #f8fafc;
        color: #17365d;

        font-size: 14px;
        font-weight: 700;

        border-bottom: 1px solid #e4ebf3;

        vertical-align: middle;
        white-space: nowrap;
    }


    /* =========================================
       BODY TABLE
    ========================================= */

    .data-table tbody td {
        min-height: 110px;
        padding: 22px 10px;

        color: #526581;
        font-size: 14px;

        border-bottom: 1px solid #edf1f5;

        vertical-align: middle;
        line-height: 1.7;
    }

    .data-table tbody tr:last-child td {
        border-bottom: none;
    }

    .data-table tbody tr {
        transition: background 0.2s ease;
    }

    .data-table tbody tr:hover {
        background: #fbfdff;
    }


    /* =========================================
       LEBAR KOLOM
       Sesuai dengan data tabel galeri
    ========================================= */

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


    /* =========================================
       NOMOR
    ========================================= */

    .nomor-galeri {
        color: #526581;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
    }


    /* =========================================
       JUDUL
    ========================================= */

    .judul-wrapper {
        padding: 0;
    }

    .judul-galeri {
        color: #17365d;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.7;

        overflow-wrap: break-word;
        word-break: normal;
    }


    /* =========================================
       KETERANGAN
    ========================================= */

    .keterangan-wrapper {
        padding: 0;
    }

    .keterangan-galeri {
        color: #7890a8;
        font-size: 13px;
        font-weight: 400;
        line-height: 1.8;

        overflow-wrap: break-word;
        word-break: normal;
    }


    /* =========================================
       FILE / MEDIA
    ========================================= */

    .file-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .galeri-image {
        width: 90px;
        height: 68px;

        object-fit: cover;
        object-position: center;

        border-radius: 9px;
        border: 1px solid #dfe7f0;

        display: block;
    }

    .file-video {
        width: 90px;
        height: 68px;

        border-radius: 9px;
        border: 1px solid #dfe7f0;

        background: #f3f6f9;
        color: #1769aa;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 27px;
    }

    .file-kosong {
        width: 90px;
        height: 68px;

        border-radius: 9px;
        border: 1px solid #dfe7f0;

        background: #f3f6f9;
        color: #9aa8b8;

        display: flex;
        align-items: center;
        justify-content: center;
    }


    /* =========================================
       KATEGORI
    ========================================= */

    .kategori-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .kategori-badge {
        min-width: 70px;
        height: 32px;

        padding: 0 12px;

        border-radius: 8px;

        font-size: 12px;
        font-weight: 600;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .kategori-foto {
        background: #eef5ff;
        color: #1769aa;
    }

    .kategori-video {
        background: #fff1f2;
        color: #dc3545;
    }


    /* =========================================
       TANGGAL
    ========================================= */

    .tanggal-wrapper {
        padding: 0;
    }

    .tanggal-galeri {
        color: #526581;
        font-size: 13px;
        font-weight: 500;
        line-height: 1.6;
        white-space: nowrap;
    }


    /* =========================================
       AKSI
    ========================================= */

    .aksi-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
    }


    /* =========================================
       BUTTON EDIT
    ========================================= */

    .btn-edit {
        width: 40px;
        height: 40px;

        border: none;
        border-radius: 9px;

        background: #eaf3ff;
        color: #1769aa;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        text-decoration: none;

        transition: all 0.2s ease;
    }

    .btn-edit:hover {
        background: #d9eaff;
        color: #12598f;
    }


    /* =========================================
       BUTTON HAPUS
    ========================================= */

    .btn-hapus {
        width: 40px;
        height: 40px;

        border: none;
        border-radius: 9px;

        background: #fff0f1;
        color: #dc3545;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        cursor: pointer;

        transition: all 0.2s ease;
    }

    .btn-hapus:hover {
        background: #ffe0e3;
        color: #b02a37;
    }


    /* =========================================
       ALERT SUCCESS
    ========================================= */

    .alert-success-wrapper {
        padding: 18px 25px 0 25px;
    }


    /* =========================================
       DATA KOSONG
    ========================================= */

    .empty-data {
        height: 230px;
        text-align: center;
        color: #8291a5;
    }

    .empty-data i {
        font-size: 45px;
        color: #a1adba;
        margin-bottom: 10px;
    }

    .empty-data span {
        font-size: 14px;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 1100px) {

        .data-table {
            min-width: 1050px;
        }

    }


    @media (max-width: 768px) {

        .data-header {
            padding: 22px 20px;
        }

        .data-title {
            font-size: 24px;
        }

        .data-subtitle {
            font-size: 14px;
        }

        .btn-tambah {
            height: 46px;
            padding: 0 16px;
            font-size: 13px;
        }

    }

</style>


<div class="galeri-wrapper">

    <div class="data-card">


        {{-- =========================================
             HEADER
        ========================================= --}}

        <div class="data-header">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="data-title">
                        Daftar Galeri
                    </h3>

                    <p class="data-subtitle">
                        Data galeri yang terdaftar dalam sistem
                    </p>

                </div>


                <a
                    href="{{ route('admin.galeri.create') }}"
                    class="btn-tambah"
                >

                    <i class="bi bi-plus-lg"></i>

                    Tambah Galeri

                </a>

            </div>

        </div>


        {{-- =========================================
             ALERT SUCCESS
        ========================================= --}}

        @if(session('success'))

            <div class="alert-success-wrapper">

                <div class="alert alert-success mb-0">

                    <i class="bi bi-check-circle me-2"></i>

                    {{ session('success') }}

                </div>

            </div>

        @endif


        {{-- =========================================
             TABLE
        ========================================= --}}

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

                        <th class="text-center">
                            No
                        </th>

                        <th>
                            Judul
                        </th>

                        <th>
                            Keterangan
                        </th>

                        <th class="text-center">
                            File
                        </th>

                        <th class="text-center">
                            Kategori
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($galeri as $item)

                        <tr>


                            {{-- NO --}}

                            <td>

                                <div class="nomor-galeri">
                                    {{ $loop->iteration }}
                                </div>

                            </td>


                            {{-- JUDUL --}}

                            <td>

                                <div class="judul-wrapper">

                                    <div class="judul-galeri">

                                        {{ $item->judul }}

                                    </div>

                                </div>

                            </td>


                            {{-- KETERANGAN --}}

                            <td>

                                <div class="keterangan-wrapper">

                                    <div class="keterangan-galeri">

                                        {{ Str::limit(strip_tags($item->keterangan), 90) }}

                                    </div>

                                </div>

                            </td>


                            {{-- FILE --}}

                            <td>

                                <div class="file-wrapper">

                                    @if($item->file)

                                        @if($item->kategori === 'Foto')

                                            <img
                                                src="{{ asset('storage/' . $item->file) }}"
                                                alt="{{ $item->judul }}"
                                                class="galeri-image"
                                            >

                                        @elseif($item->kategori === 'Video')

                                            <div class="file-video">

                                                <i class="bi bi-play-circle"></i>

                                            </div>

                                        @endif

                                    @else

                                        <div class="file-kosong">

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

                                <div class="tanggal-wrapper">

                                    <span class="tanggal-galeri">

                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                                    </span>

                                </div>

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <div class="aksi-wrapper">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('admin.galeri.edit', $item->id_galeri) }}"
                                        class="btn-edit"
                                        title="Edit Galeri"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ route('admin.galeri.delete', $item->id_galeri) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data galeri ini?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-hapus"
                                            title="Hapus Galeri"
                                        >

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>


                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="empty-data"
                            >

                                <div class="d-flex flex-column align-items-center justify-content-center h-100">

                                    <i class="bi bi-images"></i>

                                    <span>
                                        Belum ada data galeri.
                                    </span>

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