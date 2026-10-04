@extends('index')

@section('title', 'Data Berita - SMKS Singaparna')

@section('content')

<style>

    /* =========================================
       WRAPPER
    ========================================= */

    .berita-wrapper {
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
        padding: 0 8px;

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
        padding: 22px 8px;

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
    ========================================= */

    .col-no {
        width: 7%;
    }

    .col-gambar {
        width: 12%;
    }

    .col-judul {
        width: 17%;
    }

    .col-isi {
        width: 23%;
    }

    .col-tanggal {
        width: 15%;
    }

    .col-user {
        width: 14%;
    }

    .col-aksi {
        width: 12%;
    }


    /* =========================================
       NOMOR
    ========================================= */

    .nomor-berita {
        color: #526581;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
    }


    /* =========================================
       GAMBAR
    ========================================= */

    .gambar-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .gambar-berita {
        width: 88px;
        height: 68px;

        object-fit: cover;
        object-position: center;

        border-radius: 9px;
        border: 1px solid #dfe7f0;

        display: block;
    }

    .gambar-kosong {
        width: 88px;
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
       JUDUL
    ========================================= */

    .judul-wrapper {
        padding: 0;
    }

    .judul-berita {
        color: #17365d;

        font-size: 14px;
        font-weight: 600;

        line-height: 1.7;

        text-align: left;

        overflow-wrap: break-word;
        word-break: normal;
    }


    /* =========================================
       ISI BERITA
    ========================================= */

    .isi-wrapper {
        padding: 0;
    }

    .isi-berita {
        color: #7890a8;

        font-size: 13px;
        font-weight: 400;

        line-height: 1.8;

        text-align: left;

        overflow-wrap: break-word;
        word-break: normal;
    }


    /* =========================================
       TANGGAL
    ========================================= */

    .tanggal-wrapper {
        padding: 0;
    }

    .tanggal-berita {
        color: #526581;

        font-size: 13px;
        font-weight: 500;

        line-height: 1.6;

        white-space: nowrap;
    }


    /* =========================================
       ID USER
    ========================================= */

    .user-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .id-user {
        min-width: 38px;
        height: 32px;

        padding: 0 10px;

        background: #eef5ff;
        color: #1769aa;

        border-radius: 8px;

        font-size: 13px;
        font-weight: 600;

        display: inline-flex;
        align-items: center;
        justify-content: center;
    }


    /* =========================================
       AKSI
    ========================================= */

    .aksi-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }


    /* =========================================
       BUTTON EDIT
    ========================================= */

    .btn-edit {
        width: 42px;
        height: 42px;

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
        width: 42px;
        height: 42px;

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


<div class="berita-wrapper">

    <div class="data-card">


        {{-- =========================================
             HEADER
        ========================================= --}}

        <div class="data-header">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="data-title">
                        Daftar Berita
                    </h3>

                    <p class="data-subtitle">
                        Data berita yang terdaftar dalam sistem
                    </p>

                </div>


                <a
                    href="{{ route('admin.berita.create') }}"
                    class="btn-tambah"
                >

                    <i class="bi bi-plus-lg"></i>

                    Tambah Berita

                </a>

            </div>

        </div>


        {{-- =========================================
             TABLE
        ========================================= --}}

        <div class="table-wrapper">

            <table class="data-table">

                <colgroup>

                    <col class="col-no">
                    <col class="col-gambar">
                    <col class="col-judul">
                    <col class="col-isi">
                    <col class="col-tanggal">
                    <col class="col-user">
                    <col class="col-aksi">

                </colgroup>


                <thead>

                    <tr>

                        <th class="text-center">
                            No
                        </th>

                        <th class="text-center">
                            Gambar
                        </th>

                        <th>
                            Judul
                        </th>

                        <th>
                            Isi Berita
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th class="text-center">
                            ID User
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($berita as $item)

                        <tr>

                            {{-- NO --}}

                            <td>

                                <div class="nomor-berita">
                                    {{ $loop->iteration }}
                                </div>

                            </td>


                            {{-- GAMBAR --}}

                            <td>

                                <div class="gambar-wrapper">

                                    @if($item->gambar)

                                        <img
                                            src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="{{ $item->judul }}"
                                            class="gambar-berita"
                                        >

                                    @else

                                        <div class="gambar-kosong">

                                            <i class="bi bi-image fs-4"></i>

                                        </div>

                                    @endif

                                </div>

                            </td>


                            {{-- JUDUL --}}

                            <td>

                                <div class="judul-wrapper">

                                    <div class="judul-berita">

                                        {{ $item->judul }}

                                    </div>

                                </div>

                            </td>


                            {{-- ISI BERITA --}}

                            <td>

                                <div class="isi-wrapper">

                                    <div class="isi-berita">

                                        {{ Str::limit(strip_tags($item->isi), 85) }}

                                    </div>

                                </div>

                            </td>


                            {{-- TANGGAL --}}

                            <td>

                                <div class="tanggal-wrapper">

                                    <span class="tanggal-berita">

                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                                    </span>

                                </div>

                            </td>


                            {{-- ID USER --}}

                            <td>

                                <div class="user-wrapper">

                                    <span class="id-user">

                                        {{ $item->id_user }}

                                    </span>

                                </div>

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <div class="aksi-wrapper">

                                    <a
                                        href="{{ route('admin.berita.edit', $item->id_berita) }}"
                                        class="btn-edit"
                                        title="Edit Berita"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    <form
                                        action="{{ route('admin.berita.delete', $item->id_berita) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-hapus"
                                            title="Hapus Berita"
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

                                    <i class="bi bi-newspaper"></i>

                                    <span>
                                        Belum ada data berita.
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