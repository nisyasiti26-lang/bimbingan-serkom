
@extends('index')

@section('title', 'Edit Data Pembina - MTsN 10 Tasikmalaya')

@section('content')

<style>
    .edit-guru-wrapper {
        width: 100%;
        margin-top: 10px;
    }

    .edit-card {
        background: #fff;
        border: 1px solid #dfeee6;
        border-radius: 12px;
        padding: 24px 22px;
        box-shadow: 0 4px 18px rgba(25, 135, 84, .06);
    }

    .form-group {
        margin-bottom: 19px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #12365d;
        font-size: 13px;
        font-weight: 600;
    }

    .form-control,
    .form-select {
        width: 100%;
        min-height: 40px;
        border: 1px solid #cfe1d7;
        border-radius: 7px;
        padding: 8px 12px;
        font-size: 13px;
        color: #34495e;
        background-color: #fff;
        box-shadow: none;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, .10);
    }

    .form-text {
        display: block;
        margin-top: 6px;
        font-size: 11px;
        color: #8291a5;
    }

    .foto-lama {
        width: 86px;
        height: 86px;
        object-fit: cover;
        border: 1px solid #cfe1d7;
        border-radius: 8px;
        padding: 3px;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 22px;
    }

    .btn-simpan,
    .btn-batal {
        min-height: 38px;
        padding: 8px 16px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        transition: .2s;
    }

    .btn-simpan {
        color: #fff;
        background: #198754;
        border: 1px solid #198754;
        cursor: pointer;
    }

    .btn-simpan:hover {
        color: #fff;
        background: #157347;
    }

    .btn-batal {
        color: #198754;
        background: #eaf7f0;
        border: 1px solid #cfe1d7;
    }

    .btn-batal:hover {
        color: #157347;
        background: #dff1e7;
    }

    @media (max-width: 767px) {
        .edit-card {
            padding: 18px;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-simpan,
        .btn-batal {
            width: 100%;
        }
    }
</style>

<div class="edit-guru-wrapper">
    <div class="edit-card">

        {{-- Pesan validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form edit pembina --}}
        <form
            action="{{ route('admin.guru.update', $guru->id_guru) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            {{-- Nama pegawai --}}
            <div class="form-group">
                <label for="nama_guru" class="form-label">
                    Nama Pegawai <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    id="nama_guru"
                    name="nama_guru"
                    class="form-control"
                    value="{{ old('nama_guru', $guru->nama_guru) }}"
                    placeholder="Masukkan nama pembina"
                    maxlength="40"
                    required
                >
            </div>

            {{-- NIP --}}
            <div class="form-group">
                <label for="nip" class="form-label">NIP</label>
                <input
                    type="text"
                    id="nip"
                    name="nip"
                    class="form-control"
                    value="{{ old('nip', $guru->nip) }}"
                    placeholder="Masukkan NIP"
                    maxlength="15"
                >
                <small class="form-text">NIP maksimal 15 karakter.</small>
            </div>

            {{-- Mata pelajaran --}}
            <div class="form-group">
                <label for="mapel" class="form-label">Mata Pelajaran</label>
                <input
                    type="text"
                    id="mapel"
                    name="mapel"
                    class="form-control"
                    value="{{ old('mapel', $guru->mapel) }}"
                    placeholder="Masukkan mata pelajaran"
                    maxlength="40"
                >
            </div>

            {{-- Kategori --}}
            <div class="form-group">
                <label for="kategori" class="form-label">
                    Kategori <span class="text-danger">*</span>
                </label>

                <select
                    id="kategori"
                    name="kategori"
                    class="form-select"
                    required
                >
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Guru"
                        {{ old('kategori', $guru->kategori ?? 'Guru') == 'Guru' ? 'selected' : '' }}>
                        Guru
                    </option>
                    <option value="Staf"
                        {{ old('kategori', $guru->kategori ?? '') == 'Staf' ? 'selected' : '' }}>
                        Staf
                    </option>
                </select>
            </div>

            {{-- Foto pembina --}}
            <div class="form-group">
                <label for="foto" class="form-label">Foto Pembina</label>
                <input
                    type="file"
                    id="foto"
                    name="foto"
                    class="form-control"
                    accept=".jpg,.jpeg,.png"
                >
                <small class="form-text">
                    Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                </small>
            </div>

            {{-- Foto saat ini --}}
            @if (!empty($guru->foto))
                <div class="form-group">
                    <label class="form-label">Foto Saat Ini</label>
                    <div>
                        <img
                            src="{{ asset('storage/' . $guru->foto) }}"
                            alt="Foto {{ $guru->nama_guru }}"
                            class="foto-lama"
                        >
                    </div>
                </div>
            @endif

            {{-- Tombol --}}
            <div class="form-actions">
                <button type="submit" class="btn-simpan">
                    <i class="bi bi-save"></i>
                    Simpan Perubahan
                </button>

                <a href="{{ url('/admin/guru') }}" class="btn-batal">
                    <i class="bi bi-arrow-left"></i>
                    Batal
                </a>
            </div>
        </form>

    </div>
</div>

@endsection
