@extends('index') 
 
@section('title', 'Tambah User - MTsN 10 Tasikmalaya') 
 
@section('content') 
 
<style> 
    .user-create-page { 
        width: 100%; 
        padding: 5px 0 25px; 
    } 
 
    .user-create-card { 
        background: #ffffff; 
        border: 1px solid #e2eaf3; 
        border-radius: 14px; 
        box-shadow: 0 3px 12px rgba(30, 60, 90, 0.05); 
        overflow: hidden; 
    } 
 
    .user-create-header { 
        padding: 28px 38px 24px; 
        border-bottom: 1px solid #e5ebf2; 
        background: #eaf8f0; 
    } 
 
    .user-create-title { 
        color: #000000; 
        font-size: 23px; 
        font-weight: 700; 
        margin: 0 0 5px; 
        line-height: 1.3; 
    } 
 
    .user-create-subtitle { 
        color: #000000; 
        font-size: 13px; 
        margin: 0; 
        line-height: 1.5; 
    } 
 
    .user-create-body { 
        padding: 30px 38px; 
    } 
 
    .form-group { 
        margin-bottom: 21px; 
    } 
 
    .form-label { 
        display: block; 
        margin-bottom: 8px; 
        color: #000000; 
        font-size: 14px; 
        font-weight: 600; 
    } 
 
    .form-control, 
    .form-select { 
        width: 100%; 
        min-height: 45px; 
        border: 1px solid #d9e3ee; 
        border-radius: 8px; 
        padding: 10px 14px; 
        color: #000000; 
        background-color: #ffffff; 
        font-size: 14px; 
        box-shadow: none; 
        transition: all 0.2s ease; 
    } 
 
    .form-control:focus, 
    .form-select:focus { 
        border-color: #198754; 
        box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.10); 
        outline: none; 
    } 
 
    .form-control::placeholder { 
        color: #000000; 
    } 
 
    .is-invalid { 
        border-color: #dc3545 !important; 
    } 
 
    .is-invalid:focus { 
        border-color: #dc3545 !important; 
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.10) !important; 
    } 
 
    .invalid-feedback { 
        display: block; 
        color: #dc3545; 
        font-size: 12px; 
        margin-top: 5px; 
        line-height: 1.4; 
    } 
 
    .form-info { 
        margin-top: 6px; 
        color: #000000; 
        font-size: 12px; 
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
        background: #f5fbf7; 
        color: #000000; 
    } 
 
    .alert-validation { 
        background: #fff5f5; 
        border: 1px solid #fecaca; 
        border-radius: 8px; 
        color: #000000; 
        padding: 12px 15px; 
        margin-bottom: 22px; 
        font-size: 13px; 
    } 
 
    .alert-validation strong { 
        display: block; 
        margin-bottom: 6px; 
        color: #000000; 
    } 
 
    .alert-validation ul { 
        margin: 0; 
        padding-left: 20px; 
    } 
 
    .alert-validation li { 
        margin-bottom: 3px; 
        color: #000000; 
    } 
 
    @media (max-width: 768px) { 
 
        .user-create-header { 
            padding: 22px 20px; 
        } 
 
        .user-create-body { 
            padding: 22px 20px; 
        } 
 
        .user-create-title { 
            font-size: 21px; 
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
 
 
<div class="user-create-page"> 
 
    <div class="user-create-card"> 
 
        
 
        {{-- BODY --}} 
        <div class="user-create-body"> 
 
            {{-- VALIDASI UMUM --}} 
            @if($errors->any()) 
 
                <div class="alert-validation"> 
 
                    <strong> 
                        Terjadi kesalahan! 
                    </strong> 
 
                    <ul> 
 
                        @foreach($errors->all() as $error) 
 
                            <li> 
                                {{ $error }} 
                            </li> 
 
                        @endforeach 
 
                    </ul> 
 
                </div> 
 
            @endif 
 
 
            {{-- FORM --}} 
            <form 
                action="{{ url('/admin/user/store') }}" 
                method="POST" 
            > 
 
                @csrf 
 
 
                {{-- USERNAME --}} 
                <div class="form-group"> 
 
                    <label 
                        for="username" 
                        class="form-label" 
                    > 
                        Username 
                    </label> 
 
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="form-control @error('username') is-invalid @enderror" 
                        value="{{ old('username') }}" 
                        placeholder="Masukkan username" 
                        maxlength="255" 
                        autocomplete="username" 
                        required 
                    > 
 
                    @error('username') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                </div> 
 
 
                {{-- PASSWORD --}} 
                <div class="form-group"> 
 
                    <label 
                        for="password" 
                        class="form-label" 
                    > 
                        Password 
                    </label> 
 
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        placeholder="Masukkan password" 
                        autocomplete="new-password" 
                        required 
                    > 
 
                    @error('password') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @enderror 
 
                    <div class="form-info"> 
                        Password minimal 6 karakter. 
                    </div> 
 
                </div> 
 
 
                {{-- ROLE --}} 
                <div class="form-group"> 
 
                    <label 
                        for="role" 
                        class="form-label" 
                    > 
                        Role 
                    </label> 
 
                    <select 
                        id="role" 
                        name="role" 
                        class="form-select @error('role') is-invalid @enderror" 
                        required 
                    > 
 
                        <option value=""> 
                            Pilih Role 
                        </option> 
 
                        <option 
                            value="admin" 
                            {{ old('role') == 'admin' ? 'selected' : '' }} 
                        > 
                            Admin 
                        </option> 
 
                        <option 
                            value="operator" 
                            {{ old('role') == 'operator' ? 'selected' : '' }} 
                        > 
                            Operator 
                        </option> 
 
                    </select> 
 
                    @error('role') 
 
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
                        Simpan 
                    </button> 
 
 
                    <a 
                        href="{{ url('/admin/user') }}" 
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