@extends('layouts.app')

@section('title', 'Profil Madrasah - MTsN 10 Tasikmalaya')

@section('content')

<style>
    /* ==============================
       HALAMAN PROFIL MADRASAH
    ============================== */

    .profil-page {
        min-height: 100vh;
        padding: 35px 0 55px;
        background: #f3f6fb;
    }

    .profil-container {
        width: min(1320px, 94%);
        margin: 0 auto;
    }

    .profil-heading {
        margin-bottom: 27px;
    }

    .profil-heading h1 {
        margin: 0 0 8px;
        color: #14532d;
        font-size: 30px;
        font-weight: 750;
    }

    .profil-heading p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .profil-card {
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #cfe9d9;
        border-radius: 13px;
        box-shadow: 0 5px 20px rgba(20, 83, 45, 0.04);
    }

    /* ==============================
       FOTO DAN LOGO
    ============================== */

    .profil-foto-container {
        display: grid;
        grid-template-columns: 0.8fr 1.2fr;
        gap: 24px;
        padding: 25px;
        border-bottom: 1px solid #d5eadc;
    }

    .profil-foto-item {
        min-width: 0;
        text-align: center;
    }

    .profil-foto-item h3 {
        margin: 0 0 17px;
        color: #111827;
        font-size: 16px;
        font-weight: 700;
    }

    .profil-foto-box {
        width: 100%;
        height: 190px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #f2f9f4;
        border: 1px solid #d5eee0;
        border-radius: 8px;
    }

    .profil-foto-box img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .profil-foto-item.foto-gedung .profil-foto-box img {
        object-fit: contain;
    }

    .profil-foto-box .gambar-error {
        display: none;
        padding: 15px;
        color: #64748b;
        font-size: 14px;
    }

    /* ==============================
       INFORMASI SEKOLAH
    ============================== */

    .profil-informasi {
        padding: 25px;
    }

    .profil-informasi h2 {
        margin: 0 0 20px;
        color: #111827;
        font-size: 18px;
        font-weight: 700;
    }

    .profil-tabel {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .profil-tabel tr {
        border-bottom: 1px solid #d5eadc;
    }

    .profil-tabel tr:last-child {
        border-bottom: none;
    }

    .profil-tabel th,
    .profil-tabel td {
        padding: 16px 10px;
        font-size: 14px;
        line-height: 1.6;
        text-align: left;
        vertical-align: top;
        overflow-wrap: anywhere;
    }

    .profil-tabel th {
        width: 180px;
        color: #111827;
        font-weight: 700;
    }

    .profil-tabel .kolom-titik {
        width: 22px;
        padding-left: 0;
        padding-right: 0;
    }

    .profil-tabel td:last-child {
        color: #334155;
    }

    .profil-keterangan {
        white-space: pre-line;
    }

    /* ==============================
       TAMPILAN RESPONSIF
    ============================== */

    @media (max-width: 768px) {
        .profil-page {
            padding: 25px 0 35px;
        }

        .profil-heading h1 {
            font-size: 25px;
        }

        .profil-foto-container {
            grid-template-columns: 1fr;
            gap: 22px;
            padding: 17px;
        }

        .profil-foto-box {
            height: 210px;
        }

        .profil-informasi {
            padding: 18px 14px;
        }

        .profil-tabel th,
        .profil-tabel td {
            padding: 12px 5px;
            font-size: 13px;
        }

        .profil-tabel th {
            width: 115px;
        }

        .profil-tabel .kolom-titik {
            width: 14px;
        }
    }

    @media (max-width: 380px) {
        .profil-tabel th {
            width: 95px;
        }

        .profil-tabel th,
        .profil-tabel td {
            font-size: 12px;
        }
    }
</style>

<div class="profil-page">
    <div class="profil-container">

        {{-- JUDUL HALAMAN --}}
        <div class="profil-heading">
            <h1>Profil Madrasah</h1>
            <p>
                Informasi resmi
                {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
            </p>
        </div>

        <div class="profil-card">

            {{-- LOGO DAN FOTO SEKOLAH --}}
            <div class="profil-foto-container">

                {{-- LOGO --}}
                <div class="profil-foto-item">
                    <h3>Logo Sekolah</h3>

                    <div class="profil-foto-box">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Logo MTsN 10 Tasikmalaya"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                        >

                        <span class="gambar-error">
                            Logo tidak ditemukan.
                        </span>
                    </div>
                </div>

                
{{-- FOTO KEPALA SEKOLAH --}}
<div class="profil-foto-item foto-gedung">
    <h3>Foto Kepala Sekolah</h3>

    <div class="profil-foto-box">
        <img
            src="{{ asset('images/kepala%20sekolah.jpeg') }}"
            alt="Foto Kepala MTsN 10 Tasikmalaya"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
        >

        <span class="gambar-error">
            Foto kepala sekolah tidak ditemukan.
        </span>
    </div>
</div>


            </div>

            {{-- INFORMASI SEKOLAH --}}
            <div class="profil-informasi">
                <h2>Informasi Sekolah</h2>

                <table class="profil-tabel">
                    <tbody>

                        <tr>
                            <th>Nama Sekolah</th>
                            <td class="kolom-titik">:</td>
                            <td>
                                {{ $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya' }}
                            </td>
                        </tr>

                        <tr>
                            <th>Kepala Sekolah</th>
                            <td class="kolom-titik">:</td>
                            <td>
                                {{ $profil->kepala_sekolah ?? 'H. Saripudin, M.Si.' }}
                            </td>
                        </tr>

                        <tr>
                            <th>NPSN</th>
                            <td class="kolom-titik">:</td>
                            <td>
                                {{ $profil->npsn ?? '20278550' }}
                            </td>
                        </tr>

                        <tr>
                            <th>Tahun Berdiri</th>
                            <td class="kolom-titik">:</td>
                            <td>
                                {{ $profil->tahun_berdiri ?? '2010' }}
                            </td>
                        </tr>

                        <tr>
                            <th>Akreditasi</th>
                            <td class="kolom-titik">:</td>
                            <td>
                                {{ $profil->akreditasi ?? 'Belum diisi' }}
                            </td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td class="kolom-titik">:</td>
                            <td class="profil-keterangan">
                                {{ $profil->alamat ?? 'Alamat sekolah belum tersedia' }}
                            </td>
                        </tr>

                        <tr>
                            <th>Nomor Telepon</th>
                            <td class="kolom-titik">:</td>
                            <td>
                                {{ $profil->kontak ?? $profil->telepon ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td class="kolom-titik">:</td>
                            <td>
                                {{ $profil->email ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <th>Deskripsi</th>
                            <td class="kolom-titik">:</td>
                            <td class="profil-keterangan">
                                {{ $profil->tentang ?? $profil->deskripsi ?? 'Informasi profil madrasah belum tersedia.' }}
                            </td>
                        </tr>

                        <tr>
                            <th>Visi dan Misi</th>
                            <td class="kolom-titik">:</td>
                            <td class="profil-keterangan">
                                {{ $profil->visi_misi ?? 'Informasi visi dan misi belum tersedia.' }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection