@extends('index')

@section('title', 'Edit Profil Sekolah - MTsN 10 Tasikmalay')

@section('content')

<style>

    /* =========================================
       WRAPPER
    ========================================= */

    .profil-edit-wrapper {
        width: 100%;
        padding-bottom: 30px;
    }


    /* =========================================
       HEADER
    ========================================= */

    .profil-edit-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .profil-edit-header h2 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #164e32;
    }


    /* =========================================
       CARD FORM
    ========================================= */

    .profil-form-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 3px 15px rgba(25, 135, 84, 0.08);
        border: 1px solid #e1eee6;
    }


    /* =========================================
       FORM
    ========================================= */

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #374151;
    }

    .form-control {
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #d1ddd6;
        border-radius: 7px;
        font-size: 14px;
        outline: none;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.10);
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }


    /* =========================================
       PREVIEW IMAGE
    ========================================= */

    .preview-image {
        margin-top: 10px;
    }

    .preview-image img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #d7e5dc;
    }

    .file-info {
        margin-top: 6px;
        font-size: 12px;
        color: #6b7280;
    }


    /* =========================================
       BUTTON AREA
    ========================================= */

    .form-button-area {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 30px;
    }


    /* =========================================
       BUTTON BATAL
    ========================================= */

    .btn-batal {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        min-width: 90px;
        height: 45px;

        padding: 0 18px;

        background: #6c757d;
        color: #ffffff;

        border: none;
        border-radius: 8px;

        font-size: 14px;
        font-weight: 500;

        text-decoration: none;

        cursor: pointer;

        transition: all 0.2s ease;
    }

    .btn-batal:hover {
        background: #5a6268;
        color: #ffffff;
        text-decoration: none;
    }


    /* =========================================
       BUTTON SIMPAN
    ========================================= */

    .btn-simpan {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        height: 45px;

        padding: 0 25px;

        background: #198754;
        color: #ffffff;

        border: none;
        border-radius: 8px;

        font-size: 14px;
        font-weight: 500;

        cursor: pointer;

        transition: all 0.2s ease;
    }

    .btn-simpan:hover {
        background: #157347;
    }


    /* =========================================
       ALERT SUCCESS
    ========================================= */

    .alert-success {
        background: #d1e7dd;
        color: #0f5132;

        padding: 12px 15px;

        border-radius: 7px;

        margin-bottom: 20px;

        font-size: 14px;
    }


    /* =========================================
       ALERT ERROR
    ========================================= */

    .alert-danger {
        background: #f8d7da;
        color: #842029;

        padding: 12px 15px;

        border-radius: 7px;

        margin-bottom: 20px;

        font-size: 14px;
    }


    /* =========================================
       ERROR INPUT
    ========================================= */

    .text-danger {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 768px) {

        .form-row {
            grid-template-columns: 1fr;
        }

        .profil-edit-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .profil-form-card {
            padding: 20px;
        }

        .form-button-area {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-batal,
        .btn-simpan {
            width: 100%;
        }

    }

</style>


<div class="profil-edit-wrapper">


    <!-- =========================================
         HEADER
    ========================================== -->


    <!-- =========================================
         SUCCESS MESSAGE
    ========================================== -->

    @if(session('success'))

        <div class="alert-success">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    <!-- =========================================
         ERROR MESSAGE
    ========================================== -->

    @if($errors->any())

        <div class="alert-danger">

            <strong>
                Terjadi kesalahan:
            </strong>

            <ul style="margin: 8px 0 0 20px;">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- =========================================
         FORM CARD
    ========================================== -->

    <div class="profil-form-card">

        <form
            action="{{ route('profile.sekolah.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <!-- NAMA SEKOLAH -->

            <div class="form-group">

                <label for="nama_sekolah">
                    Nama Sekolah
                </label>

                <input
                    type="text"
                    id="nama_sekolah"
                    name="nama_sekolah"
                    class="form-control"
                    value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}"
                    placeholder="Masukkan nama sekolah"
                    required
                >

                @error('nama_sekolah')

                    <span class="text-danger">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- KEPALA SEKOLAH + NPSN -->

            <div class="form-row">

                <div class="form-group">

                    <label for="kepala_sekolah">
                        Kepala Sekolah
                    </label>

                    <input
                        type="text"
                        id="kepala_sekolah"
                        name="kepala_sekolah"
                        class="form-control"
                        value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}"
                        placeholder="Nama kepala sekolah"
                    >

                    @error('kepala_sekolah')

                        <span class="text-danger">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <div class="form-group">

                    <label for="npsn">
                        NPSN
                    </label>

                    <input
                        type="text"
                        id="npsn"
                        name="npsn"
                        class="form-control"
                        value="{{ old('npsn', $profil->npsn ?? '') }}"
                        placeholder="Masukkan NPSN"
                    >

                    @error('npsn')

                        <span class="text-danger">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

            </div>


            <!-- TAHUN BERDIRI + KONTAK -->

            <div class="form-row">

                <div class="form-group">

                    <label for="tahun_berdiri">
                        Tahun Berdiri
                    </label>

                    <input
                        type="number"
                        id="tahun_berdiri"
                        name="tahun_berdiri"
                        class="form-control"
                        value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}"
                        placeholder="Contoh: 2005"
                    >

                    @error('tahun_berdiri')

                        <span class="text-danger">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <div class="form-group">

                    <label for="kontak">
                        Kontak
                    </label>

                    <input
                        type="text"
                        id="kontak"
                        name="kontak"
                        class="form-control"
                        value="{{ old('kontak', $profil->kontak ?? '') }}"
                        placeholder="Nomor telepon / email"
                    >

                    @error('kontak')

                        <span class="text-danger">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

            </div>


            <!-- ALAMAT -->

            <div class="form-group">

                <label for="alamat">
                    Alamat Sekolah
                </label>

                <textarea
                    id="alamat"
                    name="alamat"
                    class="form-control"
                    placeholder="Masukkan alamat sekolah"
                >{{ old('alamat', $profil->alamat ?? '') }}</textarea>

                @error('alamat')

                    <span class="text-danger">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- VISI MISI -->

            <div class="form-group">

                <label for="visi_misi">
                    Visi & Misi
                </label>

                <textarea
                    id="visi_misi"
                    name="visi_misi"
                    class="form-control"
                    placeholder="Masukkan visi dan misi sekolah"
                >{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>

                @error('visi_misi')

                    <span class="text-danger">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- DESKRIPSI -->

            <div class="form-group">

                <label for="deskripsi">
                    Deskripsi Sekolah
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    class="form-control"
                    placeholder="Masukkan deskripsi sekolah"
                >{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>

                @error('deskripsi')

                    <span class="text-danger">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- LOGO -->

            <div class="form-group">

                <label for="logo">
                    Logo Sekolah
                </label>

                <input
                    type="file"
                    id="logo"
                    name="logo"
                    class="form-control"
                    accept="image/jpeg,image/jpg,image/png"
                >

                @if(!empty($profil->logo))

                    <div class="preview-image">

                        <p class="file-info">
                            Logo saat ini:
                        </p>

                        <img
                            src="{{ asset('storage/' . $profil->logo) }}"
                            alt="Logo Sekolah"
                        >

                    </div>

                @endif

                <div class="file-info">
                    Format JPG, JPEG, PNG. Maksimal 2MB.
                </div>

                @error('logo')

                    <span class="text-danger">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- FOTO -->

            <div class="form-group">

                <label for="foto">
                    Foto Sekolah
                </label>

                <input
                    type="file"
                    id="foto"
                    name="foto"
                    class="form-control"
                    accept="image/jpeg,image/jpg,image/png"
                >

                @if(!empty($profil->foto))

                    <div class="preview-image">

                        <p class="file-info">
                            Foto saat ini:
                        </p>

                        <img
                            src="{{ asset('storage/' . $profil->foto) }}"
                            alt="Foto Sekolah"
                        >

                    </div>

                @endif

                <div class="file-info">
                    Format JPG, JPEG, PNG. Maksimal 2MB.
                </div>

                @error('foto')

                    <span class="text-danger">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- =========================================
                 BUTTON BATAL + SIMPAN
            ========================================== -->

            <div class="form-button-area">

                <!-- BUTTON BATAL -->

                <a
                    href="{{ route('profile.sekolah') }}"
                    class="btn-batal"
                >

                    <i class="bi bi-x-circle"></i>

                    Batal

                </a>


                <!-- BUTTON SIMPAN -->

                <button
                    type="submit"
                    class="btn-simpan"
                >

                   
                    Simpan Perubahan

                </button>

            </div>


        </form>

    </div>

</div>

@endsection