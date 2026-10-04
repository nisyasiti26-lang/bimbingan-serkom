@extends('index')

@section('title', 'Edit Data Galeri - SMKS Singaparna')

@section('content')

<style>

    .edit-galeri-wrapper {
        width: 100%;
        margin-top: 10px;
    }

    .edit-card {
        background: #ffffff;
        border: 1px solid #e2eaf3;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(31, 70, 110, 0.07);
        overflow: hidden;
    }

    .edit-card-header {
        padding: 22px 28px;
        border-bottom: 1px solid #e8eef5;
        background: #fbfdff;
    }

    .edit-card-header h5 {
        margin: 0 0 5px 0;
        color: #17365d;
        font-size: 18px;
        font-weight: 700;
    }

    .edit-card-header h5 i {
        color: #1769aa;
    }

    .edit-card-header p {
        margin: 0;
        font-size: 13px;
        color: #8291a5;
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
        color: #263b55;
    }

    .form-label i {
        color: #1769aa;
        margin-right: 5px;
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
        height: 150px;
        padding: 12px 14px;
        resize: vertical;
        line-height: 1.6;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #3182c4;
        box-shadow: 0 0 0 3px rgba(49, 130, 196, 0.10);
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
        background: #1769aa;
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
        background: #12568d;
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

    .current-file {
        margin-top: 8px;
    }

    .current-file img {
        width: 180px;
        height: 110px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #d9e3ee;
        display: block;
    }

    .current-file video {
        width: 300px;
        height: 170px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #d9e3ee;
        display: block;
        background: #000;
    }

    .file-info {
        margin-top: 7px;
        font-size: 12px;
        color: #8291a5;
    }

    .alert-danger {
        border-radius: 8px;
        font-size: 13px;
    }

    @media (max-width: 768px) {

        .edit-card-body {
            padding: 20px;
        }

        .edit-card-header {
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

        .current-file img {
            width: 150px;
            height: 100px;
        }

        .current-file video {
            width: 100%;
            height: auto;
        }

    }

</style>


<div class="edit-galeri-wrapper">

    <div class="edit-card">


        {{-- HEADER --}}
        <div class="edit-card-header">

            <h5>
                <i class="bi bi-images me-2"></i>
                Edit Data Galeri
            </h5>

            <p>
                Perbarui informasi galeri sekolah
            </p>

        </div>


        {{-- BODY --}}
        <div class="edit-card-body">


            {{-- ERROR VALIDASI --}}
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


            {{-- FORM --}}
            <form
                action="{{ route('admin.galeri.update', $galeri->id_galeri) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                {{-- BARIS PERTAMA --}}
                <div class="row">


                    {{-- JUDUL --}}
                    <div class="col-md-8">

                        <div class="form-group">

                            <label
                                for="judul"
                                class="form-label"
                            >

                                <i class="bi bi-card-heading"></i>
                                Judul

                            </label>

                            <input
                                type="text"
                                class="form-control @error('judul') is-invalid @enderror"
                                id="judul"
                                name="judul"
                                value="{{ old('judul', $galeri->judul) }}"
                                placeholder="Masukkan judul galeri"
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


                    {{-- TANGGAL --}}
                    <div class="col-md-4">

                        <div class="form-group">

                            <label
                                for="tanggal"
                                class="form-label"
                            >

                                <i class="bi bi-calendar3"></i>
                                Tanggal

                            </label>

                            <input
                                type="date"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal"
                                name="tanggal"
                                value="{{ old('tanggal', $galeri->tanggal) }}"
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


                {{-- KATEGORI --}}
                <div class="form-group">

                    <label
                        for="kategori"
                        class="form-label"
                    >

                        <i class="bi bi-grid"></i>
                        Kategori

                    </label>

                    <select
                        class="form-select @error('kategori') is-invalid @enderror"
                        id="kategori"
                        name="kategori"
                        required
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option
                            value="Foto"
                            {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}
                        >
                            Foto
                        </option>

                        <option
                            value="Video"
                            {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}
                        >
                            Video
                        </option>

                    </select>

                    @error('kategori')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- KETERANGAN --}}
                <div class="form-group">

                    <label
                        for="keterangan"
                        class="form-label"
                    >

                        <i class="bi bi-file-text"></i>
                        Keterangan

                    </label>

                    <textarea
                        class="form-control @error('keterangan') is-invalid @enderror"
                        id="keterangan"
                        name="keterangan"
                        placeholder="Masukkan keterangan galeri"
                        required
                    >{{ old('keterangan', $galeri->keterangan) }}</textarea>

                    @error('keterangan')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- FILE BARU --}}
                <div class="form-group">

                    <label
                        for="file"
                        class="form-label"
                    >

                        <i class="bi bi-cloud-arrow-up"></i>
                        Ganti File

                    </label>

                    <input
                        type="file"
                        class="form-control @error('file') is-invalid @enderror"
                        id="file"
                        name="file"
                        accept="image/jpeg,image/png,image/jpg,image/webp,video/mp4,video/webm,video/quicktime,video/x-msvideo"
                    >

                    <div class="file-info">
                        Kosongkan jika tidak ingin mengganti file.
                        Foto: JPG, JPEG, PNG, WEBP.
                        Video: MP4, MOV, AVI, MKV.
                    </div>

                    @error('file')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- FILE LAMA --}}
                @if (!empty($galeri->file))

                    <div class="form-group">

                        <label class="form-label">

                            <i class="bi bi-eye"></i>
                            File Saat Ini

                        </label>


                        <div class="current-file">

                            @if ($galeri->kategori === 'Foto')

                                <img
                                    src="{{ asset('storage/' . $galeri->file) }}"
                                    alt="{{ $galeri->judul }}"
                                >

                            @elseif ($galeri->kategori === 'Video')

                                <video controls>

                                    <source
                                        src="{{ asset('storage/' . $galeri->file) }}"
                                    >

                                    Browser Anda tidak mendukung video.

                                </video>

                            @endif

                        </div>

                    </div>

                @endif


                {{-- BUTTON --}}
                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn-simpan"
                    >

                        <i class="bi bi-save me-2"></i>

                        Simpan Perubahan

                    </button>


                    <a
                        href="{{ route('admin.galeri.index') }}"
                        class="btn-batal"
                    >

                        <i class="bi bi-arrow-left me-2"></i>

                        Batal

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>

@endsection