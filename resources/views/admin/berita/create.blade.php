@extends('index')
@section('title', 'Tambah Berita - MTsN 10 Tasikmalaya')
@section('content')

<style>
    .create-berita-wrapper {
        width: 100%;
        margin-top: 10px;
    }
    .create-card {
        background: #ffffff;
        border: 1px solid #e2eaf3;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(31, 70, 110, 0.07);
        overflow: hidden;
    }
    .create-card-header {
        padding: 22px 28px;
        border-bottom: 1px solid #e8eef5;
        background: #fbfdff;
    }
    .create-card-header h5 {
        margin: 0 0 5px 0;
        color: #17365d;
        font-size: 18px;
        font-weight: 700;
    }
    .create-card-header p {
        margin: 0;
        font-size: 13px;
        color: #8291a5;
    }
    .create-card-body {
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
        color: #263b55;
    }
    .form-control,
    .form-select {
        width: 100%;
        height: 45px;
        border: 1px solid #d9e3ee;
        border-radius: 8px;
        padding: 0 14px;
        font-size: 14px;
        color: #34495e;
        background-color: #ffffff;
        transition: all 0.2s ease;
        box-shadow: none;
    }
    textarea.form-control {
        height: 160px;
        padding: 12px 14px;
        resize: vertical;
        line-height: 1.6;
    }
    .form-control:focus,
    .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.10);
        outline: none;
    }
    .form-control::placeholder {
        color: #a0adbb;
    }
    .form-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-top: 20px;
        margin-top: 8px;
        border-top: 1px solid #edf1f5;
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
        background: #146c43;
        color: #ffffff;
    }
    .btn-batal {
        height: 42px;
        padding: 0 18px;
        border: 1px solid #d9e2ec;
        border-radius: 8px;
        background: #ffffff;
        color: #64748b;
        font-size: 13px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
    }
    .btn-batal:hover {
        background: #f5f8fb;
        color: #334155;
    }
    .alert-danger {
        border-radius: 8px;
        font-size: 13px;
    }
    .file-info {
        margin-top: 7px;
        font-size: 12px;
        color: #8291a5;
    }
    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }
    @media (max-width: 768px) {
        .create-card-body {
            padding: 20px;
        }
        .create-card-header {
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

<div class="create-berita-wrapper">
    <div class="create-card">
        <div class="create-card-body">
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <strong>
                        Terjadi kesalahan!
                    </strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form
                action="{{ route('admin.berita.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label
                                for="judul"
                                class="form-label"
                            >
                                Judul Berita
                            </label>
                            <input
                                type="text"
                                class="form-control @error('judul') is-invalid @enderror"
                                id="judul"
                                name="judul"
                                value="{{ old('judul') }}"
                                placeholder="Masukkan judul berita"
                                maxlength="50"
                                required
                            >
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label
                                for="tanggal"
                                class="form-label"
                            >
                                Tanggal
                            </label>
                            <input
                                type="date"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal"
                                name="tanggal"
                                value="{{ old('tanggal', date('Y-m-d')) }}"
                                required
                            >

                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label
                        for="id_user"
                        class="form-label"
                    >
                        User
                    </label>
                    <select
                        class="form-select @error('id_user') is-invalid @enderror"
                        id="id_user"
                        name="id_user"
                        required
                    >
                        <option value="">
                            -- Pilih User --
                        </option>
                        @foreach ($users as $user)
                            <option
                                value="{{ $user->id_user }}"
                                {{ old('id_user') == $user->id_user ? 'selected' : '' }}
                            >
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>

                    @error('id_user')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- STATUS DITAMBAHKAN DI SINI --}}

                <div class="form-group">
                    <label
                        for="status"
                        class="form-label"
                    >
                        Status
                    </label>

                    <select
                        class="form-select @error('status') is-invalid @enderror"
                        id="status"
                        name="status"
                        required
                    >
                        <option value="">
                            -- Pilih Status --
                        </option>

                        <option
                            value="draft"
                            {{ old('status') == 'draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                        <option
                            value="publikasi"
                            {{ old('status') == 'publikasi' ? 'selected' : '' }}
                        >
                            Publikasi
                        </option>

                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label
                        for="isi"
                        class="form-label"
                    >
                        Isi Berita
                    </label>

                    <textarea
                        class="form-control @error('isi') is-invalid @enderror"
                        id="isi"
                        name="isi"
                        placeholder="Masukkan isi berita"
                        required
                    >{{ old('isi') }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label
                        for="gambar"
                        class="form-label"
                    >
                        Gambar Berita
                    </label>

                    <input
                        type="file"
                        class="form-control @error('gambar') is-invalid @enderror"
                        id="gambar"
                        name="gambar"
                        accept="image/jpeg,image/png,image/jpg,image/webp"
                    >

                    <div class="file-info">
                        Format JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                    </div>

                    @error('gambar')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn-simpan"
                    >
                        Simpan Berita
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