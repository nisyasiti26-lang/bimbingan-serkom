@extends('index') 
 
@section('title', 'Edit Ekstrakurikuler - MTsN 10 Tasikmalaya') 
 
@section('content') 
 
<style> 
 
    .edit-ekskul-wrapper { 
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
        background: #eaf8f0; 
    } 
 
    .edit-card-header h5 { 
        margin: 0 0 5px 0; 
        color: #000000; 
        font-size: 18px; 
        font-weight: 700; 
    } 
 
    .edit-card-header p { 
        margin: 0; 
        font-size: 13px; 
        color: #000000; 
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
        color: #000000; 
    } 
 
    .form-control { 
        width: 100%; 
        min-height: 45px; 
        border: 1px solid #d9e3ee; 
        border-radius: 8px; 
        padding: 10px 14px; 
        font-size: 14px; 
        color: #000000; 
        background-color: #ffffff; 
        transition: all 0.2s ease; 
        box-shadow: none; 
    } 
 
    .form-control:focus { 
        border-color: #198754; 
        box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.10); 
        outline: none; 
    } 
 
    textarea.form-control { 
        min-height: 110px; 
        resize: vertical; 
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
        color: #000000; 
        font-size: 13px; 
        text-decoration: none; 
        display: inline-flex; 
        align-items: center; 
        justify-content: center; 
        transition: 0.2s; 
    } 
 
    .btn-batal:hover { 
        background: #eaf8f0; 
        color: #000000; 
    } 
 
    .foto-lama { 
        margin-top: 8px; 
    } 
 
    .foto-lama img { 
        width: 120px; 
        height: 90px; 
        object-fit: cover; 
        border-radius: 8px; 
        border: 1px solid #d9e3ee; 
    } 
 
    .file-info { 
        margin-top: 6px; 
        font-size: 12px; 
        color: #000000; 
    } 
 
    .invalid-feedback { 
        display: block; 
        color: #dc3545; 
        font-size: 12px; 
        margin-top: 5px; 
    } 
 
    .is-invalid { 
        border-color: #dc3545 !important; 
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
 
 
<div class="edit-ekskul-wrapper"> 
 
    <div class="edit-card"> 
 
        
 
        {{-- BODY --}} 
        <div class="edit-card-body"> 
 
 
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
 
            <form 
                action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) }}" 
                method="POST" 
                enctype="multipart/form-data" 
            > 
 
                @csrf 
 
                @method('PUT') 
 
 
                {{-- BARIS PERTAMA --}} 
 
                <div class="row"> 
 
 
                    {{-- NAMA EKSTRAKURIKULER --}} 
 
                    <div class="col-md-6"> 
 
                        <div class="form-group"> 
 
                            <label 
                                for="nama_ekskul" 
                                class="form-label" 
                            > 
 
                                Nama Ekstrakurikuler 
 
                            </label> 
 
                            <input 
                                type="text" 
                                class="form-control @error('nama_ekskul') is-invalid @enderror" 
                                id="nama_ekskul" 
                                name="nama_ekskul" 
                                value="{{ old('nama_ekskul', $ekstrakurikuler->nama_ekskul) }}" 
                                placeholder="Masukkan nama ekstrakurikuler" 
                                maxlength="100" 
                                required 
                            > 
 
                            @error('nama_ekskul') 
 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
 
                            @enderror 
 
                        </div> 
 
                    </div> 
 
 
                    {{-- PEMBINA --}} 
 
                    <div class="col-md-6"> 
 
                        <div class="form-group"> 
 
                            <label 
                                for="pembina" 
                                class="form-label" 
                            > 
 
                                Pembina 
 
                            </label> 
 
                            <input 
                                type="text" 
                                class="form-control @error('pembina') is-invalid @enderror" 
                                id="pembina" 
                                name="pembina" 
                                value="{{ old('pembina', $ekstrakurikuler->pembina) }}" 
                                placeholder="Masukkan nama pembina" 
                                maxlength="100" 
                                required 
                            > 
 
                            @error('pembina') 
 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
 
                            @enderror 
 
                        </div> 
 
                    </div> 
 
                </div> 
 
 
                {{-- BARIS KEDUA --}} 
 
                <div class="row"> 
 
 
                    {{-- JADWAL LATIHAN --}} 
 
                    <div class="col-md-6"> 
 
                        <div class="form-group"> 
 
                            <label 
                                for="jadwal_latihan" 
                                class="form-label" 
                            > 
 
                                Jadwal Latihan 
 
                            </label> 
 
                            <input 
                                type="text" 
                                class="form-control @error('jadwal_latihan') is-invalid @enderror" 
                                id="jadwal_latihan" 
                                name="jadwal_latihan" 
                                value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan) }}" 
                                placeholder="Contoh: Senin dan Kamis" 
                                maxlength="100" 
                                required 
                            > 
 
                            @error('jadwal_latihan') 
 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
 
                            @enderror 
 
                        </div> 
 
                    </div> 
 
 
                    {{-- GAMBAR --}} 
 
                    <div class="col-md-6"> 
 
                        <div class="form-group"> 
 
                            <label 
                                for="gambar" 
                                class="form-label" 
                            > 
 
                                Gambar Ekstrakurikuler 
 
                            </label> 
 
                            <input 
                                type="file" 
                                class="form-control @error('gambar') is-invalid @enderror" 
                                id="gambar" 
                                name="gambar" 
                                accept="image/jpeg,image/jpg,image/png,image/webp" 
                            > 
 
                            @error('gambar') 
 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
 
                            @enderror 
 
                            <div class="file-info"> 
 
                                Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB. 
 
                            </div> 
 
                        </div> 
 
                    </div> 
 
                </div> 
 
 
                {{-- DESKRIPSI --}} 
 
                <div class="form-group"> 
 
                    <label 
                        for="deskripsi" 
                        class="form-label" 
                    > 
 
                        Deskripsi 
 
                    </label> 
 
                    <textarea 
                        class="form-control @error('deskripsi') is-invalid @enderror" 
                        id="deskripsi" 
                        name="deskripsi" 
                        placeholder="Masukkan deskripsi ekstrakurikuler" 
                    >{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea> 
 
                    @error('deskripsi') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                </div> 
 
 
                {{-- GAMBAR LAMA --}} 
 
                @if (!empty($ekstrakurikuler->gambar)) 
 
                    <div class="form-group"> 
 
                        <label class="form-label"> 
 
                            Gambar Saat Ini 
 
                        </label> 
 
                        <div class="foto-lama"> 
 
                            <img 
                                src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" 
                                alt="Gambar Ekstrakurikuler" 
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
 
                        Simpan Perubahan 
 
                    </button> 
 
 
                    <a 
                        href="{{ route('admin.ekstrakurikuler.index') }}" 
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