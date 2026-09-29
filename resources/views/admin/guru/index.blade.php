@extends('index')

@section('title', 'Data Guru - SMKS Singaparna')

@section('content')

<style>
    .guru-wrapper {
        width: 100%;
        padding: 0 0 30px;
    }

    /* HEADER */
    .guru-header {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 20px 24px;

        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 20px;
    }

    .guru-header h3 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #12365d;
    }

    .guru-header p {
        margin: 5px 0 0;
        font-size: 13px;
        color: #6b7f95;
    }

    /* TOMBOL TAMBAH */
    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 9px 15px;

        background: #1769aa;
        color: #ffffff;

        border: none;
        border-radius: 6px;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;
        transition: 0.2s;
    }

    .btn-tambah:hover {
        background: #12568d;
        color: #ffffff;
    }

    /* CARD */
    .guru-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .guru-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e8edf3;
    }

    .guru-card-title {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: #12365d;
    }

    .guru-card-subtitle {
        margin: 5px 0 0;
        font-size: 12px;
        color: #8b99aa;
    }

    /* TABLE */
    .guru-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .guru-table {
        width: 100%;
        border-collapse: collapse;
    }

    .guru-table thead {
        background: #f8fafc;
    }

    .guru-table th {
        padding: 14px 16px;

        font-size: 12px;
        font-weight: 700;
        color: #334155;

        text-align: left;

        border-bottom: 1px solid #e2e8f0;
    }

    .guru-table td {
        padding: 14px 16px;

        font-size: 13px;
        color: #53657a;

        border-bottom: 1px solid #edf1f5;

        vertical-align: middle;
    }

    .guru-table tbody tr:hover {
        background: #fafcff;
    }

    .guru-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* NOMOR */
    .nomor {
        width: 60px;
        text-align: center !important;
        color: #64748b !important;
        font-weight: 600;
    }

    /* FOTO */
    .guru-foto {
        width: 45px;
        height: 45px;

        border-radius: 50%;

        object-fit: cover;

        border: 2px solid #e2e8f0;
    }

    .foto-kosong {
        width: 45px;
        height: 45px;

        border-radius: 50%;

        background: #f1f5f9;

        border: 1px solid #e2e8f0;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #94a3b8;
        font-size: 18px;
    }

    /* NAMA */
    .nama-guru {
        font-weight: 600;
        color: #243b53 !important;
    }

    /* MAPEL */
    .badge-mapel {
        display: inline-block;

        padding: 5px 9px;

        border-radius: 5px;

        background: #ecf2ff;
        color: #1769aa;

        font-size: 11px;
        font-weight: 600;
    }

    /* AKSI */
    .aksi {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-aksi {
        width: 32px;
        height: 32px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 5px;

        text-decoration: none;
        border: none;

        font-size: 14px;

        transition: 0.2s;
    }

    .btn-edit {
        background: #e8f1ff;
        color: #1769aa;
    }

    .btn-edit:hover {
        background: #d7e7ff;
        color: #12568d;
    }

    .btn-hapus {
        background: #feecec;
        color: #dc3545;

        cursor: pointer;
    }

    .btn-hapus:hover {
        background: #fddddd;
        color: #b02a37;
    }

    /* DATA KOSONG */
    .empty-guru {
        padding: 60px 20px;

        text-align: center;

        color: #8b99aa;
    }

    .empty-guru i {
        display: block;

        margin-bottom: 10px;

        font-size: 42px;

        color: #b2bfcd;
    }

    .empty-guru h5 {
        margin: 0 0 5px;

        font-size: 15px;

        color: #64748b;

        font-weight: 600;
    }

    .empty-guru p {
        margin: 0;

        font-size: 12px;
    }

    /* RESPONSIVE */
    @media (max-width: 700px) {

        .guru-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .btn-tambah {
            width: 100%;
            justify-content: center;
        }

        .guru-table {
            min-width: 700px;
        }
    }
</style>


<div class="guru-wrapper">

    {{-- HEADER --}}

    <div class="guru-header">

        <div>

            <h3>
                Data Guru
            </h3>

            <p>
                Kelola data guru SMKS Singaparna
            </p>

        </div>


        {{-- TOMBOL TAMBAH --}}

        <a href="{{ route('admin.guru.create') }}"
           class="btn-tambah">

            <i class="bi bi-plus-lg"></i>

            Tambah Guru

        </a>

    </div>


    {{-- CARD DATA GURU --}}

    <div class="guru-card">

        <div class="guru-card-header">

            <div class="guru-card-title">
                Daftar Guru
            </div>

            <div class="guru-card-subtitle">
                Data guru yang terdaftar dalam sistem
            </div>

        </div>


        {{-- CEK DATA GURU --}}

        @if(isset($gurus) && $gurus->count() > 0)

            <div class="guru-table-wrapper">

                <table class="guru-table">

                    <thead>

                        <tr>

                            <th class="nomor">
                                No
                            </th>

                            <th>
                                Foto
                            </th>

                            <th>
                                Nama Guru
                            </th>

                            <th>
                                NIP
                            </th>

                            <th>
                                Mata Pelajaran
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($gurus as $guru)

                            <tr>

                                {{-- NOMOR --}}

                                <td class="nomor">
                                    {{ $loop->iteration }}
                                </td>


                                {{-- FOTO --}}

                                <td>

                                    @if($guru->foto)

                                        <img
                                            src="{{ asset('storage/' . $guru->foto) }}"
                                            alt="{{ $guru->nama_guru }}"
                                            class="guru-foto">

                                    @else

                                        <div class="foto-kosong">

                                            <i class="bi bi-person"></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- NAMA --}}

                                <td class="nama-guru">

                                    {{ $guru->nama_guru }}

                                </td>


                                {{-- NIP --}}

                                <td>

                                    {{ $guru->nip ?? '-' }}

                                </td>


                                {{-- MAPEL --}}

                                <td>

                                    @if($guru->mapel)

                                        <span class="badge-mapel">
                                            {{ $guru->mapel }}
                                        </span>

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- AKSI --}}

                                <td>

                                    <div class="aksi">

                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('admin.guru.edit', $guru->id_guru) }}"
                                            class="btn-aksi btn-edit"
                                            title="Edit">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>


                                        {{-- HAPUS --}}

                                        <form
                                            action="{{ route('admin.guru.delete', $guru->id_guru) }}"
                                            method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus data guru ini?');">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-aksi btn-hapus"
                                                title="Hapus">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


        @else

            {{-- JIKA DATA KOSONG --}}

            <div class="empty-guru">

                <i class="bi bi-person-workspace"></i>

                <h5>
                    Belum Ada Data Guru
                </h5>

                <p>
                    Silakan tambahkan data guru terlebih dahulu.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection