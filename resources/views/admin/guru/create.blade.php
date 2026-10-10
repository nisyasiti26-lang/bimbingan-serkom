@extends('index') 
 
@section('title', 'Tambah Data Guru - MTsN 10 Tasikmalaya') 
 
@section('content') 
 
<style>
    .top-header {
        margin-bottom: 22px;
    }

    .top-header h3 {
        color: #198754;
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
        border: 1px solid #dfeee6;
        border-radius: 12px;
        box-shadow: 0 4px 18px rgba(25, 135, 84, 0.08);
        padding: 25px;
    }

    .form-card h5 {
        color: #198754;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .form-card hr {
        border-color: #dfeee6;
        margin-bottom: 24px;
    }

    .form-label {
        color: #12365d;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .form-control {
        min-height: 43px;
        border: 1px solid #cfe1d7;
        border-radius: 7px;
        font-size: 14px;
        color: #334155;
        background: #ffffff;
    }

    .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.15);
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
    }

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 18px;
        border: none;
        border-radius: 7px;
        background: #198754;
        color: white;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-tambah:hover {
        background: #157347;
        color: white;
    }

    .btn-kembali {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 18px;
        border-radius: 7px;
        background: #eaf7f0;
        border: 1px solid #cfe5d8;
        color: #198754;
        font-size: 14px;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-kembali:hover {
        background: #dff1e7;
        color: #157347;
    }

    .alert-danger {
        border-radius: 8px;
        font-size: 13px;
    }

    .required {
        color: #dc3545;
    }

    .file-info {
        font-size: 12px;
        color: #7890a8;
        margin-top: 6px;
    }
</style>

<div class="row"> 
 
    <div class="col-lg-18"> 
 
        <div class="form-card"> 
 
 
            {{-- PESAN ERROR --}} 
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
            <form action="{{ route('admin.guru.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data"> 
 
                @csrf 
 
 
                {{-- NAMA GURU --}} 
                <div class="mb-3"> 
 
                    <label for="nama_guru" 
                           class="form-label"> 
 
                        Nama Guru 
                        <span class="required">*</span> 
 
                    </label> 
 
                    <input 
                        type="text" 
                        class="form-control @error('nama_guru') is-invalid @enderror" 
                        id="nama_guru" 
                        name="nama_guru" 
                        value="{{ old('nama_guru') }}" 
                        placeholder="Masukkan nama guru" 
                    > 
 
                    @error('nama_guru') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                </div> 
 
 
                {{-- NIP --}} 
                <div class="mb-3"> 
 
                    <label for="nip" 
                           class="form-label"> 
 
                        NIP 
 
                    </label> 
 
                    <input 
                        type="text" 
                        class="form-control @error('nip') is-invalid @enderror" 
                        id="nip" 
                        name="nip" 
                        value="{{ old('nip') }}" 
                        placeholder="Masukkan NIP" 
                    > 
 
                    @error('nip') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                    <div class="file-info"> 
                        NIP maksimal 15 karakter. 
                    </div> 
 
                </div> 
 
 
                {{-- MAPEL --}} 
                <div class="mb-3"> 
 
                    <label for="mapel" 
                           class="form-label"> 
 
                        Mata Pelajaran 
                        <span class="required">*</span> 
 
                    </label> 
 
                    <input 
                        type="text" 
                        class="form-control @error('mapel') is-invalid @enderror" 
                        id="mapel" 
                        name="mapel" 
                        value="{{ old('mapel') }}" 
                        placeholder="Masukkan mata pelajaran" 
                    > 
 
                    @error('mapel') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                </div> 
 
 
                {{-- FOTO --}} 
                <div class="mb-4"> 
 
                    <label for="foto" 
                           class="form-label"> 
 
                        Foto Guru 
 
                    </label> 
 
                    <input 
                        type="file" 
                        class="form-control @error('foto') is-invalid @enderror" 
                        id="foto" 
                        name="foto" 
                        accept="image/jpeg,image/jpg,image/png" 
                    > 
 
                    @error('foto') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                    <div class="file-info"> 
                        Format JPG, JPEG, atau PNG. Maksimal 2 MB. 
                    </div> 
 
                </div> 
 
 
                {{-- BUTTON --}} 
                <div> 
 
                    <button type="submit" 
                            class="btn-tambah"> 
 
                        
                        Simpan 
 
                    </button> 
 
 
                    <a href="{{ route('admin.guru') }}" 
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