@extends('index')
@section('title', 'Data Berita - MTsN 10 Tasikmalaya')
@section('content')

<style>
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

    /* =========================
       ALERT
    ========================= */
    .alert-success-custom {
        margin: 16px 24px 0;
        padding: 12px 15px;
        background: #eaf8f0;
        border: 1px solid #b7e4c7;
        border-radius: 9px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-success-icon {
        color: #198754;
        font-size: 18px;
        display: flex;
        align-items: center;
    }

    .alert-success-text {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 1px;
    }

    .alert-success-text strong {
        color: #000000;
        font-size: 13px;
        font-weight: 700;
    }

    .alert-success-text span {
        color: #000000;
        font-size: 12px;
    }

    .alert-success-close {
        width: 28px;
        height: 28px;
        border: none;
        background: transparent;
        color: #198754;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .alert-success-close:hover {
        background: #d8f0e3;
    }

    /* =========================
       HEADER
    ========================= */
    .data-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e8eef5;
        background: #ffffff;
    }

    .data-title {
        margin: 0 0 4px 0;
        color: #000000;
        font-size: 22px;
        font-weight: 700;
        line-height: 1.3;
    }

    .data-subtitle {
        margin: 0;
        color: #000000;
        font-size: 13px;
        line-height: 1.5;
    }

    /* =========================
       BUTTON TAMBAH
    ========================= */
    .btn-tambah {
        height: 42px;
        padding: 0 17px;
        border: none;
        border-radius: 8px;
        background: #198754;
        color: #ffffff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: all 0.2s ease;
    }

    .btn-tambah:hover {
        background: #146c43;
        color: #ffffff;
        transform: translateY(-1px);
    }

    /* =========================
       TABLE
    ========================= */
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
        padding: 0 7px;
        background: #eaf8f0;
        color: #000000;
        font-size: 13px;
        font-weight: 700;
        border-bottom: 1px solid #b7e4c7;
        vertical-align: middle;
        white-space: nowrap;
    }

    .data-table tbody td {
        min-height: 85px;
        padding: 15px 7px;
        color: #000000;
        font-size: 13px;
        border-bottom: 1px solid #edf1f5;
        vertical-align: middle;
        line-height: 1.6;
    }

    .data-table tbody tr:last-child td {
        border-bottom: none;
    }

    .data-table tbody tr {
        transition: background 0.2s ease;
    }

    .data-table tbody tr:hover {
        background: #f5fbf7;
    }

    /* =========================
       LEBAR KOLOM
    ========================= */
    .col-no {
        width: 5%;
    }

    .col-gambar {
        width: 11%;
    }

    .col-judul {
        width: 17%;
    }

    .col-isi {
        width: 22%;
    }

    .col-tanggal {
        width: 11%;
    }

    .col-user {
        width: 10%;
    }

    .col-status {
        width: 11%;
    }

    .col-aksi {
        width: 13%;
    }

    /* =========================
       NOMOR
    ========================= */
    .nomor-berita {
        color: #000000;
        font-size: 13px;
        font-weight: 500;
        text-align: center;
    }

    /* =========================
       GAMBAR
    ========================= */
    .gambar-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .gambar-berita {
        width: 72px;
        height: 55px;
        object-fit: cover;
        object-position: center;
        border-radius: 8px;
        border: 1px solid #dfe7f0;
        display: block;
    }

    .gambar-kosong {
        width: 72px;
        height: 55px;
        border-radius: 8px;
        border: 1px solid #dfe7f0;
        background: #f3f6f9;
        color: #000000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* =========================
       JUDUL
    ========================= */
    .judul-wrapper {
        padding: 0;
    }

    .judul-berita {
        color: #000000;
        font-size: 13px;
        font-weight: 600;
        line-height: 1.6;
        text-align: left;
        overflow-wrap: break-word;
        word-break: normal;
    }

    /* =========================
       ISI BERITA
    ========================= */
    .isi-wrapper {
        padding: 0;
    }

    .isi-berita {
        color: #000000;
        font-size: 12px;
        font-weight: 400;
        line-height: 1.7;
        text-align: left;
        overflow-wrap: break-word;
        word-break: normal;
    }

    /* =========================
       TANGGAL
    ========================= */
    .tanggal-wrapper {
        padding: 0;
    }

    .tanggal-berita {
        color: #000000;
        font-size: 12px;
        font-weight: 500;
        line-height: 1.5;
        white-space: nowrap;
    }

    /* =========================
       ID USER
    ========================= */
    .user-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .id-user {
        min-width: 34px;
        height: 29px;
        padding: 0 8px;
        background: #eaf8f0;
        color: #000000;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    /* =========================
       STATUS
    ========================= */
    .status-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .status-badge {
        min-width: 72px;
        padding: 6px 8px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 600;
        text-align: center;
        display: inline-block;
    }

    .status-publikasi {
        background: #eaf8f0;
        color: #000000;
    }

    .status-draft {
        background: #fff4df;
        color: #000000;
    }

    /* =========================
       AKSI
    ========================= */
    .aksi-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    /* LIHAT */
    .btn-lihat {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 8px;
        background: #eef4ff;
        color: #0d6efd;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-lihat:hover {
        background: #dce8ff;
        color: #0a58ca;
        transform: translateY(-1px);
    }

    /* EDIT */
    .btn-edit {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 8px;
        background: #eaf8f0;
        color: #198754;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-edit:hover {
        background: #d8f0e3;
        color: #146c43;
        transform: translateY(-1px);
    }

    /* HAPUS */
    .btn-hapus {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 8px;
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
        transform: translateY(-1px);
    }

    /* =========================
       DATA KOSONG
    ========================= */
    .empty-data {
        height: 190px;
        text-align: center;
        color: #000000;
    }

    .empty-data i {
        font-size: 38px;
        color: #000000;
        margin-bottom: 8px;
    }

    .empty-data span {
        font-size: 13px;
        color: #000000;
    }

    /* =========================
       RESPONSIVE
    ========================= */
    @media (max-width: 1100px) {
        .data-table {
            min-width: 1050px;
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
            font-size: 13px;
        }

        .btn-tambah {
            height: 40px;
            padding: 0 14px;
            font-size: 12px;
        }

        .alert-success-custom {
            margin: 14px 18px 0;
        }
    }
</style>


<div class="berita-wrapper">

    <div class="data-card">

        {{-- =========================
             ALERT BERHASIL
        ========================= --}}
        @if(session('success'))

            <div class="alert-success-custom">

                <div class="alert-success-icon">
                    <i class="bi bi-check-circle-fill"></i>
                </div>

                <div class="alert-success-text">
                    <strong>Berhasil!</strong>

                    <span>
                        {{ session('success') }}
                    </span>
                </div>

                <button
                    type="button"
                    class="alert-success-close"
                    onclick="this.parentElement.remove()"
                >
                    <i class="bi bi-x-lg"></i>
                </button>

            </div>

        @endif


        {{-- =========================
             HEADER
        ========================= --}}
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


        {{-- =========================
             TABLE
        ========================= --}}
        <div class="table-wrapper">

            <table class="data-table">

                <colgroup>

                    <col class="col-no">
                    <col class="col-gambar">
                    <col class="col-judul">
                    <col class="col-isi">
                    <col class="col-tanggal">
                    <col class="col-user">
                    <col class="col-status">
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
                            Status
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($berita as $item)

                        <tr>

                            {{-- =========================
                                 NO
                            ========================= --}}
                            <td>

                                <div class="nomor-berita">
                                    {{ $loop->iteration }}
                                </div>

                            </td>


                            {{-- =========================
                                 GAMBAR
                            ========================= --}}
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


                            {{-- =========================
                                 JUDUL
                            ========================= --}}
                            <td>

                                <div class="judul-wrapper">

                                    <div class="judul-berita">
                                        {{ $item->judul }}
                                    </div>

                                </div>

                            </td>


                            {{-- =========================
                                 ISI BERITA
                            ========================= --}}
                            <td>

                                <div class="isi-wrapper">

                                    <div class="isi-berita">
                                        {{ Str::limit(strip_tags($item->isi), 85) }}
                                    </div>

                                </div>

                            </td>


                            {{-- =========================
                                 TANGGAL
                            ========================= --}}
                            <td>

                                <div class="tanggal-wrapper">

                                    <span class="tanggal-berita">

                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                                    </span>

                                </div>

                            </td>


                            {{-- =========================
                                 ID USER
                            ========================= --}}
                            <td>

                                <div class="user-wrapper">

                                    <span class="id-user">
                                        {{ $item->id_user }}
                                    </span>

                                </div>

                            </td>


                            {{-- =========================
                                 STATUS
                            ========================= --}}
                            <td>

                                <div class="status-wrapper">

                                    @if(strtolower(trim($item->status ?? 'draft')) === 'publikasi')

                                        <span class="status-badge status-publikasi">
                                            Publik
                                        </span>

                                    @else

                                        <span class="status-badge status-draft">
                                            Draft
                                        </span>

                                    @endif

                                </div>

                            </td>


                            {{-- =========================
                                 AKSI
                            ========================= --}}
                            <td>

                                <div class="aksi-wrapper">

                                    {{-- LIHAT --}}
                                    <a
                                        href="{{ route('admin.berita.show', $item->id) }}"
                                        class="btn-lihat"
                                        title="Lihat Berita"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </a>


                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('admin.berita.edit', $item->id) }}"
                                        class="btn-edit"
                                        title="Edit Berita"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('admin.berita.delete', $item->id) }}"
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
                                colspan="8"
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