@extends('index')

@section('title', 'Tambah Data Guru - SMKS Singaparna')

@section('content')

<style>
    .top-header {
        margin-bottom: 22px;
    }

    .top-header h3 {
        color: #17365d;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .top-header p {
        color: #7890a8;
        font-size: 14px;
        margin-bottom: 0;
    }

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

    .form-control {
        min-height: 43px;
        border: 1px solid #dfe6ee;
        border-radius: 7px;
        font-size: 14px;
        color: #334155;
    }

    .form-control:focus {
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

    <div class="col-lg-12">

        <div class="form-card">

           
            {{-- PESAN ERROR --}}
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
            <form action="{{ url('/admin/guru/store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- NAMA GURU --}}
                <div class="mb-3">

                    <label for="nama_guru"
                           class="form-label">
                        Nama Guru
                    </label>

                    <input type="text"
                           class="form-control"
                           id="nama_guru"
                           name="nama_guru"
                           value="{{ old('nama_guru') }}"
                           placeholder="Masukkan nama guru"
                           required>

                </div>

                {{-- NIP --}}
                <div class="mb-3">

                    <label for="nip"
                           class="form-label">
                        NIP
                    </label>

                    <input type="text"
                           class="form-control"
                           id="nip"
                           name="nip"
                           value="{{ old('nip') }}"
                           placeholder="Masukkan NIP">

                </div>

                {{-- MAPEL --}}
                <div class="mb-3">

                    <label for="mapel"
                           class="form-label">
                        Mata Pelajaran
                    </label>

                    <input type="text"
                           class="form-control"
                           id="mapel"
                           name="mapel"
                           value="{{ old('mapel') }}"
                           placeholder="Masukkan mata pelajaran"
                           required>

                </div>

                {{-- FOTO --}}
                <div class="mb-4">

                    <label for="foto"
                           class="form-label">
                        Foto Guru
                    </label>

                    <input type="file"
                           class="form-control"
                           id="foto"
                           name="foto"
                           accept="image/*">

                   

                </div>

                {{-- BUTTON --}}
                <button type="submit"
                        class="btn-tambah">

                    <i class="bi bi-save me-1"></i>
                    Simpan

                </button>

                <a href="{{ url('/admin/guru') }}"
                   class="btn-kembali ms-2">

                    Batal

                </a>

            </form>

        </div>

    </div>

</div>

@endsection