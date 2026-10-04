@extends('index')

@section('title', 'Tambah Data Galeri - SMKS Singaparna')

@section('content')

<style>

    .create-galeri-wrapper {
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


<div class="create-galeri-wrapper">

    <div class="create-card">


       


        {{-- BODY --}}
        <div class="create-card-body">


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
                action="{{ route('admin.galeri.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- JUDUL DAN TANGGAL --}}
                <div class="row">

                    {{-- JUDUL --}}
                    <div class="col-md-8">

                        <div class="form-group">

                            <label
                                for="judul"
                                class="form-label"
                            >
                                Judul
                            </label>

                            <input
                                type="text"
                                class="form-control @error('judul') is-invalid @enderror"
                                id="judul"
                                name="judul"
                                value="{{ old('judul') }}"
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


                {{-- KATEGORI --}}
                <div class="form-group">

                    <label
                        for="kategori"
                        class="form-label"
                    >
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
                            {{ old('kategori') == 'Foto' ? 'selected' : '' }}
                        >
                            Foto
                        </option>

                        <option
                            value="Video"
                            {{ old('kategori') == 'Video' ? 'selected' : '' }}
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
                        Keterangan
                    </label>

                    <textarea
                        class="form-control @error('keterangan') is-invalid @enderror"
                        id="keterangan"
                        name="keterangan"
                        placeholder="Masukkan keterangan galeri"
                        required
                    >{{ old('keterangan') }}</textarea>

                    @error('keterangan')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- FILE --}}
                <div class="form-group">

                    <label
                        for="file"
                        class="form-label"
                    >
                        File Galeri
                    </label>

                    <input
                        type="file"
                        class="form-control @error('file') is-invalid @enderror"
                        id="file"
                        name="file"
                        accept="image/jpeg,image/png,image/jpg,image/webp,video/mp4,video/webm"
                        required
                    >

                    <div class="file-info">
                        Untuk Foto: JPG, JPEG, PNG atau WEBP.
                        Untuk Video: MP4 atau WEBM.
                    </div>

                    @error('file')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn-simpan"
                    >
                        Simpan Galeri
                    </button>


                    <a
                        href="{{ route('admin.galeri.index') }}"
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