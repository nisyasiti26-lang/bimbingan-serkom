@extends('index')

@section('title', 'Edit Profil Sekolah - SMK Singaparna')

@section('content')

<style>
    .profil-edit-wrapper {
        width: 100%;
        padding-bottom: 30px;
    }

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
        color: #1f2937;
    }

    .profil-edit-header p {
        margin: 5px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .btn-kembali {
        background: #6c757d;
        color: white;
        text-decoration: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 14px;
    }

    .btn-kembali:hover {
        background: #5a6268;
        color: white;
    }

    .profil-form-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    }

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
        border: 1px solid #d1d5db;
        border-radius: 7px;
        font-size: 14px;
        outline: none;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #176db0;
        box-shadow: 0 0 0 3px rgba(23, 109, 176, 0.1);
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

    .preview-image {
        margin-top: 10px;
    }

    .preview-image img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .file-info {
        margin-top: 6px;
        font-size: 12px;
        color: #6b7280;
    }

    .btn-simpan {
        background: #176db0;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-simpan:hover {
        background: #155a98;
    }

    .alert-success {
        background: #d1e7dd;
        color: #0f5132;
        padding: 12px 15px;
        border-radius: 7px;
        margin-bottom: 20px;
    }

    .alert-danger {
        background: #f8d7da;
        color: #842029;
        padding: 12px 15px;
        border-radius: 7px;
        margin-bottom: 20px;
    }

    .text-danger {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

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
    }
</style>

<div class="profil-edit-wrapper">

    {{-- HEADER --}}
    <div class="profil-edit-header">

        <div>
            <h2>Edit Profil Sekolah</h2>

            <p>
                Perbarui informasi profil SMK Singaparna
            </p>
        </div>

        <a href="{{ route('admin.profile') }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>


    {{-- PESAN BERHASIL --}}
    @if(session('success'))

        <div class="alert-success">

            <i class="bi bi-check-circle"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- ERROR --}}
    @if($errors->any())

        <div class="alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul style="margin: 8px 0 0 20px;">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <div class="profil-form-card">

        {{-- PENTING: ROUTE SUDAH DIPERBAIKI --}}
        <form action="{{ route('admin.profile.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            @method('PUT')


            {{-- NAMA SEKOLAH --}}
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


            {{-- KEPALA SEKOLAH + NPSN --}}
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


            {{-- TAHUN BERDIRI + KONTAK --}}
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


            {{-- ALAMAT --}}
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


            {{-- VISI MISI --}}
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


            {{-- DESKRIPSI --}}
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


            {{-- LOGO --}}
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


            {{-- FOTO SEKOLAH --}}
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


            {{-- TOMBOL --}}
            <div style="margin-top: 30px;">

                <a href="{{ route('admin.profile') }}"
                   class="btn-kembali"
                   style="margin-right: 10px;">

                    Batal

                </a>

                <button type="submit" class="btn-simpan">

                    <i class="bi bi-save"></i>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection