@extends('index')

@section('title', 'Edit Berita - MTsN 10 Tasikmalaya')

@section('content')

<style>
    .edit-berita-wrapper {
        width: 100%;
        margin-top: 10px;
    }

    .edit-card {
        background: #fff;
        border: 1px solid #e2eaf3;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(31, 70, 110, .07);
        overflow: hidden;
    }

    .edit-card-body {
        padding: 24px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-label {
        display: block;
        margin-bottom: 7px;
        font-size: 13px;
        font-weight: 600;
        color: #263b55;
    }

    .edit-card .form-control,
    .edit-card .form-select {
        width: 100%;
        min-height: 43px;
        border: 1px solid #d9e3ee;
        border-radius: 8px;
        padding: 9px 13px;
        font-size: 13px;
        color: #34495e;
        background-color: #fff;
        box-shadow: none;
    }

    .edit-card textarea.form-control {
        min-height: 140px;
        resize: vertical;
        line-height: 1.6;
    }

    .edit-card .form-control:focus,
    .edit-card .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, .10);
        outline: none;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-top: 18px;
        margin-top: 5px;
        border-top: 1px solid #edf1f5;
    }

    .btn-simpan,
    .btn-batal {
        min-height: 40px;
        padding: 0 18px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-decoration: none;
        transition: .2s;
    }

    .btn-simpan {
        border: none;
        background: #198754;
        color: #fff;
    }

    .btn-simpan:hover {
        background: #146c43;
        color: #fff;
    }

    .btn-batal {
        border: 1px solid #d9e2ec;
        background: #fff;
        color: #64748b;
    }

    .btn-batal:hover {
        background: #f5f8fb;
        color: #334155;
    }

    .current-image {
        margin-top: 7px;
    }

    .current-image img {
        width: 170px;
        height: 105px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #d9e3ee;
        display: block;
    }

    .image-info {
        margin-top: 6px;
        font-size: 12px;
        color: #8291a5;
    }

    .edit-card .alert {
        border-radius: 8px;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .edit-card-body {
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

        .current-image img {
            width: 150px;
            height: 100px;
        }
    }
</style>

<div class="edit-berita-wrapper">
    <div class="edit-card">
        <div class="edit-card-body">

            {{-- PESAN ERROR VALIDASI --}}
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

            {{-- FORM EDIT BERITA --}}
            <form
                action="{{ route('admin.berita.update', ['id_berita' => $berita->id]) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                {{-- JUDUL DAN TANGGAL --}}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="judul" class="form-label">Judul Berita</label>

                            <input
                                type="text"
                                class="form-control @error('judul') is-invalid @enderror"
                                id="judul"
                                name="judul"
                                value="{{ old('judul', $berita->judul) }}"
                                placeholder="Masukkan judul berita"
                                maxlength="50"
                                required
                            >

                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tanggal" class="form-label">Tanggal</label>

                            <input
                                type="date"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal"
                                name="tanggal"
                                value="{{ old('tanggal', $berita->tanggal ? \Illuminate\Support\Carbon::parse($berita->tanggal)->format('Y-m-d') : '') }}"
                                required
                            >

                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- USER --}}
                <div class="form-group">
                    <label for="id_user" class="form-label">User</label>

                    <select
                        class="form-select @error('id_user') is-invalid @enderror"
                        id="id_user"
                        name="id_user"
                        required
                    >
                        <option value="">-- Pilih User --</option>

                        @foreach ($users as $user)
                            <option
                                value="{{ $user->id_user }}"
                                {{ old('id_user', $berita->id_user) == $user->id_user ? 'selected' : '' }}
                            >
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>

                    @error('id_user')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- STATUS --}}
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>

                    <select
                        class="form-select @error('status') is-invalid @enderror"
                        id="status"
                        name="status"
                        required
                    >
                        <option value="">-- Pilih Status --</option>

                        <option
                            value="draft"
                            {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                        <option
                            value="publikasi"
                            {{ old('status', $berita->status) == 'publikasi' ? 'selected' : '' }}
                        >
                            Publikasi
                        </option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ISI BERITA --}}
                <div class="form-group">
                    <label for="isi" class="form-label">Isi Berita</label>

                    <textarea
                        class="form-control @error('isi') is-invalid @enderror"
                        id="isi"
                        name="isi"
                        placeholder="Masukkan isi berita"
                        required
                    >{{ old('isi', $berita->isi) }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- GANTI GAMBAR --}}
                <div class="form-group">
                    <label for="gambar" class="form-label">Gambar Berita</label>

                    <input
                        type="file"
                        class="form-control @error('gambar') is-invalid @enderror"
                        id="gambar"
                        name="gambar"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="image-info">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </div>

                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- GAMBAR SAAT INI --}}
                @if (!empty($berita->gambar))
                    <div class="form-group">
                        <label class="form-label">Gambar Saat Ini</label>

                        <div class="current-image">
                            <img
                                src="{{ asset('storage/' . $berita->gambar) }}"
                                alt="Gambar berita: {{ $berita->judul }}"
                            >
                        </div>
                    </div>
                @endif

                {{-- TOMBOL --}}
                <div class="form-actions">
                    <button type="submit" class="btn-simpan">
                        Simpan Perubahan
                    </button>

                    <a
                        href="{{ route('admin.berita.index') }}"
                        class="btn-batal"
                    >
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
