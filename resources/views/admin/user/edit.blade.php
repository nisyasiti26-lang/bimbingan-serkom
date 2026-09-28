@extends('index')

@section('title', 'Edit User - SMK Singaparna')

@section('content')

<style>
    .edit-user-wrapper {
        max-width: 850px;
        margin-top: 10px;
    }

    .page-title {
        margin-bottom: 25px;
    }

    .page-title h3 {
        font-size: 25px;
        font-weight: 700;
        color: #17365d;
        margin-bottom: 6px;
    }

    .page-title p {
        margin: 0;
        color: #7b8ba3;
        font-size: 14px;
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

    .password-info {
        display: block;
        margin-top: 7px;
        color: #8b99aa;
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


<div class="edit-user-wrapper">

   

    {{-- CARD --}}
    <div class="edit-card">

        {{-- HEADER --}}
        <div class="edit-card-header">

            <h5>
                <i class="bi bi-person-gear me-2"></i>
                Edit Data User
            </h5>

            <p>
                Silakan ubah nama, password, atau role pengguna.
            </p>

        </div>


        {{-- BODY --}}
        <div class="edit-card-body">

            {{-- ERROR --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        <i class="bi bi-exclamation-circle me-1"></i>
                        Terjadi kesalahan!
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- FORM --}}
            <form action="{{ url('/admin/user/update/' . $user->id_user) }}"
                  method="POST">

                @csrf
                @method('PUT')


                {{-- NAMA --}}
                <div class="form-group">

                    <label for="name" class="form-label">
                        <i class="bi bi-person"></i>
                        Nama Pengguna
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        placeholder="Masukkan nama pengguna"
                        required
                    >

                </div>


                {{-- PASSWORD --}}
                <div class="form-group">

                    <label for="password" class="form-label">
                        <i class="bi bi-lock"></i>
                        Password Baru
                    </label>

                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Masukkan password baru"
                    >

                    <small class="password-info">
                        <i class="bi bi-info-circle me-1"></i>
                        Kosongkan jika tidak ingin mengubah password.
                    </small>

                </div>


                {{-- ROLE --}}
                <div class="form-group">

                    <label for="role" class="form-label">
                        <i class="bi bi-shield-check"></i>
                        Role
                    </label>

                    <select
                        name="role"
                        id="role"
                        class="form-select"
                        required
                    >

                        <option value="admin"
                            {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="operator"
                            {{ old('role', $user->role) == 'operator' ? 'selected' : '' }}>
                            Operator
                        </option>

                    </select>

                </div>


                {{-- BUTTON --}}
                <div class="form-actions">

                    <button type="submit" class="btn-simpan">
                        <i class="bi bi-save me-2"></i>
                        Simpan Perubahan
                    </button>

                    <a href="{{ url('/admin/user') }}" class="btn-batal">
                        <i class="bi bi-arrow-left me-2"></i>
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection