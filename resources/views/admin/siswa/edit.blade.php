@extends('index')

@section('title', 'Edit Siswa - SMK Singaparna')

@section('content')

<style>
    .edit-siswa-wrapper {
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

    .form-control:focus,
    .form-select:focus {
        border-color: #3182c4;
        box-shadow: 0 0 0 3px rgba(49, 130, 196, 0.10);
        outline: none;
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
    }
</style>


<div class="edit-siswa-wrapper">

    <div class="edit-card">

        {{-- HEADER --}}
        <div class="edit-card-header">

            <h5>
                <i class="bi bi-person-gear me-2"></i>
                Edit Data Siswa
            </h5>

            <p>
                Silakan ubah data siswa yang diperlukan.
            </p>

        </div>


        {{-- BODY --}}
        <div class="edit-card-body">

            {{-- ERROR VALIDASI --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        <i class="bi bi-exclamation-circle me-1"></i>
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
            <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}"
                  method="POST">

                @csrf
                @method('PUT')


                {{-- BARIS PERTAMA --}}
                <div class="row">

                    {{-- NISN --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="nisn" class="form-label">

                                <i class="bi bi-card-text"></i>
                                NISN

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="nisn"
                                name="nisn"
                                value="{{ old('nisn', $siswa->nisn) }}"
                                placeholder="Masukkan NISN siswa"
                                maxlength="10"
                                required
                            >

                        </div>

                    </div>


                    {{-- NAMA SISWA --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="nama_siswa" class="form-label">

                                <i class="bi bi-person"></i>
                                Nama Siswa

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="nama_siswa"
                                name="nama_siswa"
                                value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                                placeholder="Masukkan nama siswa"
                                maxlength="40"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- BARIS KEDUA --}}
                <div class="row">

                    {{-- JENIS KELAMIN --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="jenis_kelamin" class="form-label">

                                <i class="bi bi-gender-ambiguous"></i>
                                Jenis Kelamin

                            </label>

                            <select
                                name="jenis_kelamin"
                                id="jenis_kelamin"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Jenis Kelamin --
                                </option>

                                <option value="Laki-Laki"
                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>

                                    Laki-Laki

                                </option>

                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>

                                    Perempuan

                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- TAHUN MASUK --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="tahun_masuk" class="form-label">

                                <i class="bi bi-calendar3"></i>
                                Tahun Masuk

                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="tahun_masuk"
                                name="tahun_masuk"
                                value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                                placeholder="Contoh: 2026"
                                min="2000"
                                max="2100"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="form-actions">

                    <button type="submit" class="btn-simpan">

                        <i class="bi bi-save me-2"></i>
                        Simpan Perubahan

                    </button>


                    <a href="{{ route('admin.siswa.index') }}"
                       class="btn-batal">

                        <i class="bi bi-arrow-left me-2"></i>
                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection