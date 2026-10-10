
@extends('index')

@section('title', 'Edit Siswa - MTsN 10 Tasikmalaya')

@section('content')

<style>
    .edit-siswa-wrapper {
        width: 100%;
        margin-top: 10px;
    }

    .edit-card {
        background: #ffffff;
        border: 1px solid #dfeee6;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(25, 135, 84, 0.08);
        overflow: hidden;
    }

    .edit-card-body {
        padding: 28px;
    }

    .form-group {
        margin-bottom: 21px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #12365d;
    }

    .form-control,
    .form-select {
        width: 100%;
        height: 45px;
        border: 1px solid #cfe1d7;
        border-radius: 8px;
        padding: 0 14px;
        font-size: 14px;
        color: #334155;
        background-color: #ffffff;
        transition: all 0.2s ease;
        box-shadow: none;
    }

    .form-control:focus,
    .form-select:focus {
        color: #334155;
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.12);
        outline: none;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-top: 20px;
        margin-top: 8px;
        border-top: 1px solid #e5eee9;
    }

    .btn-simpan {
        height: 42px;
        padding: 0 20px;
        border: none;
        border-radius: 8px;
        background: #198754;
        color: #ffffff;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-simpan:hover {
        background: #157347;
        color: #ffffff;
    }

    .btn-batal {
        height: 42px;
        padding: 0 18px;
        border: 1px solid #cfe1d7;
        border-radius: 8px;
        background: #eaf7f0;
        color: #198754;
        font-size: 13px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
    }

    .btn-batal:hover {
        background: #dff1e7;
        color: #157347;
    }

    .alert-danger {
        border-radius: 8px;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .edit-card-body {
            padding: 20px;
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

<div class="edit-siswa-wrapper">
    <div class="edit-card">
        <div class="edit-card-body">

            {{-- VALIDASI ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM EDIT SISWA --}}
            <form
                action="{{ route('admin.siswa.update', $siswa->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row">
                    {{-- NISN --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nisn" class="form-label">
                                NISN
                            </label>

                            <input
                                type="text"
                                class="form-control @error('nisn') is-invalid @enderror"
                                id="nisn"
                                name="nisn"
                                value="{{ old('nisn', $siswa->nisn) }}"
                                placeholder="Masukkan NISN siswa"
                                maxlength="10"
                                required>

                            @error('nisn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- NAMA SISWA --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_siswa" class="form-label">
                                Nama Siswa
                            </label>

                            <input
                                type="text"
                                class="form-control @error('nama_siswa') is-invalid @enderror"
                                id="nama_siswa"
                                name="nama_siswa"
                                value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                                placeholder="Masukkan nama siswa"
                                maxlength="40"
                                required>

                            @error('nama_siswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- JENIS KELAMIN --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_kelamin" class="form-label">
                                Jenis Kelamin
                            </label>

                            <select
                                name="jenis_kelamin"
                                id="jenis_kelamin"
                                class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                required>

                                <option value="">-- Pilih Jenis Kelamin --</option>

                                <option
                                    value="Laki-Laki"
                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>

                                <option
                                    value="Perempuan"
                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>

                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- TAHUN MASUK --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tahun_masuk" class="form-label">
                                Tahun Masuk
                            </label>

                            <input
                                type="number"
                                class="form-control @error('tahun_masuk') is-invalid @enderror"
                                id="tahun_masuk"
                                name="tahun_masuk"
                                value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                                placeholder="Contoh: 2026"
                                min="2000"
                                max="2100"
                                required>

                            @error('tahun_masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- TOMBOL --}}
                <div class="form-actions">
                    <button type="submit" class="btn-simpan">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.siswa.index') }}" class="btn-batal">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection