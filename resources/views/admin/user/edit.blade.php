@extends('index') 
 
@section('title', 'Edit User - MTsN 10 Tasikmalaya') 
 
@section('content') 
 
<style> 
    .edit-user-wrapper { 
        width: 100%; 
        max-width: 850px; 
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
 
    .form-control, 
    .form-select { 
        width: 100%; 
        height: 45px; 
        border: 1px solid #d9e3ee; 
        border-radius: 8px; 
        padding: 0 14px; 
        font-size: 14px; 
        color: #000000; 
        background-color: #ffffff; 
        transition: all 0.2s ease; 
        box-shadow: none; 
    } 
 
    .form-control:focus, 
    .form-select:focus { 
        border-color: #198754; 
        box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.10); 
        outline: none; 
    } 
 
    .form-control.is-invalid, 
    .form-select.is-invalid { 
        border-color: #dc3545; 
    } 
 
    .invalid-feedback { 
        display: block; 
        font-size: 12px; 
        margin-top: 6px; 
        color: #dc3545; 
    } 
 
    .password-info { 
        display: block; 
        margin-top: 7px; 
        color: #000000; 
        font-size: 12px; 
    } 
 
    /* ALERT */ 
    .alert-danger { 
        background: #fff5f5; 
        border: 1px solid #f3b8bd; 
        border-radius: 9px; 
        color: #000000; 
        font-size: 13px; 
        padding: 13px 16px; 
        margin-bottom: 24px; 
    } 
 
    .alert-danger strong { 
        font-size: 14px; 
        color: #000000; 
    } 
 
    .alert-danger ul { 
        padding-left: 20px; 
    } 
 
    .alert-danger li { 
        margin-bottom: 3px; 
        color: #000000; 
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
        transform: translateY(-1px); 
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
 
    /* ROLE INFO */ 
    .role-info { 
        margin-top: 8px; 
        padding: 12px 14px; 
        background: #eaf8f0; 
        border: 1px solid #b7e4c7; 
        border-radius: 8px; 
        font-size: 12px; 
        color: #000000; 
    } 
 
    @media (max-width: 768px) { 
 
        .edit-user-wrapper { 
            margin-top: 5px; 
        } 
 
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
 
 
<div class="edit-user-wrapper"> 
 
    <div class="edit-card"> 
 
        {{-- BODY --}} 
        <div class="edit-card-body"> 
 
            {{-- ERROR --}} 
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
                action="{{ route('admin.user.update', $user->id_user) }}" 
                method="POST" 
            > 
 
                @csrf 
 
                @method('PUT') 
 
 
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
                        class="form-control @error('username') is-invalid @enderror" 
                        id="username" 
                        name="username" 
                        value="{{ old('username', $user->username) }}" 
                        placeholder="Masukkan username" 
                        autocomplete="off" 
                        required 
                    > 
 
                    @error('username') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @else 
 
 
                    @enderror 
 
                </div> 
 
 
                {{-- PASSWORD --}} 
                <div class="form-group"> 
 
                    <label 
                        for="password" 
                        class="form-label" 
                    > 
                        Password Baru 
                    </label> 
 
                    <input 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password baru" 
                        autocomplete="new-password" 
                    > 
 
                    @error('password') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @else 
 
                    @enderror 
 
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
                        name="role" 
                        id="role" 
                        class="form-select @error('role') is-invalid @enderror" 
                        required 
                    > 
 
                        <option 
                            value="admin" 
                            {{ old('role', $user->role) == 'admin' ? 'selected' : '' }} 
                        > 
                            Admin 
                        </option> 
 
                        <option 
                            value="operator" 
                            {{ old('role', $user->role) == 'operator' ? 'selected' : '' }} 
                        > 
                            Operator 
                        </option> 
 
                    </select> 
 
                    @error('role') 
 
                        <div class="invalid-feedback"> 
                            {{ $message }} 
                        </div> 
 
                    @else 
 
                        
                    @enderror 
 
                </div> 
 
 
                {{-- BUTTON --}} 
                <div class="form-actions"> 
 
                    <button 
                        type="submit" 
                        class="btn-simpan" 
                    > 
                        Simpan Perubahan 
                    </button> 
 
 
                    <a 
                        href="{{ route('admin.user.index') }}" 
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