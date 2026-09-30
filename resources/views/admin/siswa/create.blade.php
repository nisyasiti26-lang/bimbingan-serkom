@extends('index')

@section('title', 'Tambah Siswa - SMK Singaparna')

@section('content')

<style>
    .form-card {
        background: #ffffff;
        border: 1px solid #edf1f6;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(30, 60, 90, 0.05);
        padding: 25px;
    }

    .form-card h5 {
        color: #17365d;
        font-weight: 600;
    }

    .form-card hr {
        border-color: #edf1f6;
        margin-bottom: 24px;
    }

    .form-label {
        color: #526581;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .form-control,
    .form-select {
        min-height: 43px;
        border: 1px solid #dfe6ee;
        border-radius: 7px;
        font-size: 14px;
        color: #334155;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #155a98;
        box-shadow: 0 0 0 0.15rem rgba(21, 90, 152, 0.12);
    }

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 18px;
        border: none;
        border-radius: 7px;
        background: #155a98;
        color: white;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-tambah:hover {
        background: #104b80;
        color: white;
    }

    .btn-kembali {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 18px;
        border-radius: 7px;
        background: #f1f4f8;
        border: 1px solid #dfe5ec;
        color: #526581;
        font-size: 14px;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-kembali:hover {
        background: #e5eaf0;
        color: #17365d;
    }
</style>


<div class="row">

    <div class="col-12">

        <div class="form-card">



            {{-- ERROR VALIDASI --}}
            @if ($errors->any())

                <div class="alert alert-danger">

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
            <form action="{{ route('admin.siswa.store') }}" method="POST">

                @csrf


                {{-- BARIS PERTAMA --}}
                <div class="row">

                    {{-- NISN --}}
                    <div class="col-md-6 mb-3">

                        <label for="nisn" class="form-label">
                            NISN
                        </label>

                        <input type="text"
                               class="form-control"
                               id="nisn"
                               name="nisn"
                               value="{{ old('nisn') }}"
                               placeholder="Masukkan NISN siswa"
                               maxlength="10"
                               required>

                    </div>


                    {{-- NAMA SISWA --}}
                    <div class="col-md-6 mb-3">

                        <label for="nama_siswa" class="form-label">
                            Nama Siswa
                        </label>

                        <input type="text"
                               class="form-control"
                               id="nama_siswa"
                               name="nama_siswa"
                               value="{{ old('nama_siswa') }}"
                               placeholder="Masukkan nama siswa"
                               maxlength="40"
                               required>

                    </div>

                </div>


                {{-- BARIS KEDUA --}}
                <div class="row">

                    {{-- JENIS KELAMIN --}}
                    <div class="col-md-6 mb-4">

                        <label for="jenis_kelamin" class="form-label">
                            Jenis Kelamin
                        </label>

                        <select name="jenis_kelamin"
                                id="jenis_kelamin"
                                class="form-select"
                                required>

                            <option value="">
                                -- Pilih Jenis Kelamin --
                            </option>

                            <option value="Laki-Laki"
                                {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>

                                Laki-Laki

                            </option>

                            <option value="Perempuan"
                                {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>

                                Perempuan

                            </option>

                        </select>

                    </div>


                    {{-- TAHUN MASUK --}}
                    <div class="col-md-6 mb-4">

                        <label for="tahun_masuk" class="form-label">
                            Tahun Masuk
                        </label>

                        <input type="number"
                               class="form-control"
                               id="tahun_masuk"
                               name="tahun_masuk"
                               value="{{ old('tahun_masuk') }}"
                               placeholder="Contoh: 2026"
                               min="2000"
                               max="2100"
                               required>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="mt-2">

                    <button type="submit"
                            class="btn-tambah">

                        <i class="bi bi-save me-1"></i>
                        Simpan

                    </button>


                    <a href="{{ route('admin.siswa.index') }}"
                       class="btn-kembali ms-2">

                        <i class="bi bi-arrow-left me-1"></i>
                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection