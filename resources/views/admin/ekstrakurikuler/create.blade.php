@extends('index') 
 
@section('title', 'Tambah Data Ekstrakurikuler - MTsN 10 Tasikmalaya') 
 
@section('content') 
 
<style> 
    .top-header { 
        margin-bottom: 22px; 
    } 
 
    .top-header h3 { 
        color: #000000; 
        font-size: 24px; 
        font-weight: 700; 
        margin-bottom: 5px; 
    } 
 
    .top-header p { 
        color: #000000; 
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
 
    .form-label { 
        color: #000000; 
        font-size: 14px; 
        font-weight: 600; 
        margin-bottom: 7px; 
    } 
 
    .form-control { 
        min-height: 43px; 
        border: 1px solid #dfe6ee; 
        border-radius: 7px; 
        font-size: 14px; 
        color: #000000; 
    } 
 
    textarea.form-control { 
        min-height: 110px; 
        resize: vertical; 
    } 
 
    .form-control:focus { 
        border-color: #198754; 
        box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.12); 
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
        color: #ffffff; 
        font-size: 14px; 
        text-decoration: none; 
        cursor: pointer; 
        transition: 0.2s; 
    } 
 
    .btn-tambah:hover { 
        background: #146c43; 
        color: #ffffff; 
    } 
 
    .btn-kembali { 
        display: inline-flex; 
        align-items: center; 
        justify-content: center; 
        padding: 9px 18px; 
        border-radius: 7px; 
        background: #eaf8f0; 
        border: 1px solid #d8f0e3; 
        color: #000000; 
        font-size: 14px; 
        text-decoration: none; 
        transition: 0.2s; 
    } 
 
    .btn-kembali:hover { 
        background: #d8f0e3; 
        color: #000000; 
    } 
 
    .alert-danger { 
        border-radius: 8px; 
        font-size: 13px; 
        color: #000000; 
    } 
 
    .required { 
        color: #dc3545; 
    } 
 
    .file-info { 
        font-size: 12px; 
        color: #000000; 
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
            <form action="{{ url('/admin/ekstrakurikuler/store') }}" 
                  method="POST" 
                  enctype="multipart/form-data"> 
 
                @csrf 
 
 
                {{-- NAMA EKSTRAKURIKULER --}} 
                <div class="mb-3"> 
 
                    <label for="nama_ekskul" 
                           class="form-label"> 
 
                        Nama Ekstrakurikuler 
                        <span class="required">*</span> 
 
                    </label> 
 
                    <input 
                        type="text" 
                        class="form-control @error('nama_ekskul') is-invalid @enderror" 
                        id="nama_ekskul" 
                        name="nama_ekskul" 
                        value="{{ old('nama_ekskul') }}" 
                        placeholder="Masukkan nama ekstrakurikuler" 
                    > 
 
                    @error('nama_ekskul') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                </div> 
 
 
                {{-- PEMBINA --}} 
                <div class="mb-3"> 
 
                    <label for="pembina" 
                           class="form-label"> 
 
                        Pembina 
                        <span class="required">*</span> 
 
                    </label> 
 
                    <input 
                        type="text" 
                        class="form-control @error('pembina') is-invalid @enderror" 
                        id="pembina" 
                        name="pembina" 
                        value="{{ old('pembina') }}" 
                        placeholder="Masukkan nama pembina" 
                    > 
 
                    @error('pembina') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                </div> 
 
 
                {{-- JADWAL LATIHAN --}} 
                <div class="mb-3"> 
 
                    <label for="jadwal_latihan" 
                           class="form-label"> 
 
                        Jadwal Latihan 
                        <span class="required">*</span> 
 
                    </label> 
 
                    <input 
                        type="text" 
                        class="form-control @error('jadwal_latihan') is-invalid @enderror" 
                        id="jadwal_latihan" 
                        name="jadwal_latihan" 
                        value="{{ old('jadwal_latihan') }}" 
                        placeholder="Contoh: Jumat, 14.00 - 16.00" 
                    > 
 
                    @error('jadwal_latihan') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                </div> 
 
 
                {{-- DESKRIPSI --}} 
                <div class="mb-3"> 
 
                    <label for="deskripsi" 
                           class="form-label"> 
 
                        Deskripsi 
                        <span class="required">*</span> 
 
                    </label> 
 
                    <textarea 
                        class="form-control @error('deskripsi') is-invalid @enderror" 
                        id="deskripsi" 
                        name="deskripsi" 
                        placeholder="Masukkan deskripsi ekstrakurikuler">{{ old('deskripsi') }}</textarea> 
 
                    @error('deskripsi') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                </div> 
 
 
                {{-- GAMBAR --}} 
                <div class="mb-4"> 
 
                    <label for="gambar" 
                           class="form-label"> 
 
                        Gambar Ekstrakurikuler 
 
                    </label> 
 
                    <input 
                        type="file" 
                        class="form-control @error('gambar') is-invalid @enderror" 
                        id="gambar" 
                        name="gambar" 
                        accept="image/jpeg,image/jpg,image/png" 
                    > 
 
                    @error('gambar') 
 
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
 
 
                    <a href="{{ url('/admin/ekstrakurikuler') }}" 
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