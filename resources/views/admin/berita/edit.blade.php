@extends('index')

@section('title', 'Edit Berita - SMKS Singaparna')

@section('content')

<style>

    .edit-berita-wrapper {
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
        height: 160px;
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

    .current-image {
        margin-top: 8px;
    }

    .current-image img {
        width: 180px;
        height: 110px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #d9e3ee;
        display: block;
    }

    .image-info {
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

        .current-image img {
            width: 150px;
            height: 100px;
        }

    }

</style>


<div class="edit-berita-wrapper">

    <div class="edit-card">


        {{-- HEADER --}}
        <div class="edit-card-header">

            <h5>
                <i class="bi bi-newspaper me-2"></i>
                Edit Data Berita
            </h5>

            <p>
                Perbarui informasi berita sekolah
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
                action="{{ route('admin.berita.update', $berita->id_berita) }}"
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

                                <i class="bi bi-newspaper"></i>
                                Judul Berita

                            </label>

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
                                value="{{ old('tanggal', $berita->tanggal) }}"
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


                {{-- USER --}}
                <div class="form-group">

                    <label
                        for="id_user"
                        class="form-label"
                    >

                        <i class="bi bi-person"></i>
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
                                {{ old('id_user', $berita->id_user) == $user->id_user ? 'selected' : '' }}
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


                {{-- ISI BERITA --}}
                <div class="form-group">

                    <label
                        for="isi"
                        class="form-label"
                    >

                        <i class="bi bi-file-text"></i>
                        Isi Berita

                    </label>

                    <textarea
                        class="form-control @error('isi') is-invalid @enderror"
                        id="isi"
                        name="isi"
                        placeholder="Masukkan isi berita"
                        required
                    >{{ old('isi', $berita->isi) }}</textarea>

                    @error('isi')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- GAMBAR --}}
                <div class="form-group">

                    <label
                        for="gambar"
                        class="form-label"
                    >

                        <i class="bi bi-image"></i>
                        Gambar Berita

                    </label>

                    <input
                        type="file"
                        class="form-control @error('gambar') is-invalid @enderror"
                        id="gambar"
                        name="gambar"
                        accept="image/jpeg,image/png,image/jpg,image/webp"
                    >

                    <div class="image-info">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </div>

                    @error('gambar')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- GAMBAR LAMA --}}
                @if (!empty($berita->gambar))

                    <div class="form-group">

                        <label class="form-label">

                            <i class="bi bi-eye"></i>
                            Gambar Saat Ini

                        </label>

                        <div class="current-image">

                            <img
                                src="{{ asset('storage/' . $berita->gambar) }}"
                                alt="Gambar Berita"
                            >

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
                        href="{{ route('admin.berita.index') }}"
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