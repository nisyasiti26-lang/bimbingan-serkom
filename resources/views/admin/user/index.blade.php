@extends('index') 
 
@section('title', 'Data User - MTsN 10 Tasikmalaya') 
 
@section('content') 
 
<style> 
    .user-page { 
        width: 100%; 
        padding: 5px 0 25px; 
    } 
 
    .user-card { 
        background: #ffffff; 
        border: 1px solid #e2eaf3; 
        border-radius: 14px; 
        box-shadow: 0 3px 12px rgba(30, 60, 90, 0.05); 
        overflow: hidden; 
    } 
 
    .user-card-header { 
        padding: 30px 38px 27px; 
        display: flex; 
        align-items: center; 
        justify-content: space-between; 
        gap: 20px; 
    } 
 
    .page-title { 
        color: #000000; 
        font-size: 25px; 
        font-weight: 700; 
        margin: 0 0 4px; 
        line-height: 1.3; 
    } 
 
    .page-subtitle { 
        color: #000000; 
        font-size: 14px; 
        margin: 0; 
        line-height: 1.4; 
    } 
 
    .btn-add-user { 
        display: inline-flex; 
        align-items: center; 
        justify-content: center; 
        gap: 7px; 
        background: #198754; 
        border: none; 
        border-radius: 9px; 
        padding: 10px 18px; 
        min-height: 46px; 
        color: #ffffff !important; 
        font-size: 14px; 
        font-weight: 600; 
        text-decoration: none; 
        white-space: nowrap; 
        transition: 0.2s; 
    } 
 
    .btn-add-user:hover { 
        background: #146c43; 
        color: #ffffff !important; 
        transform: translateY(-1px); 
    } 
 
    .btn-add-user i { 
        font-size: 18px; 
    } 
 
    .user-alert-wrapper { 
        padding: 0 38px 18px; 
    } 
 
    .user-alert { 
        border-radius: 8px; 
        border: 1px solid; 
        padding: 10px 13px; 
        font-size: 13px; 
        margin: 0; 
    } 
 
    .user-alert-success { 
        background: #eaf8f0; 
        border-color: #b7e4c7; 
        color: #000000; 
    } 
 
    .user-alert-danger { 
        background: #fff5f5; 
        border-color: #fecaca; 
        color: #000000; 
    } 
 
    .user-alert-content { 
        display: flex; 
        align-items: flex-start; 
        gap: 8px; 
    } 
 
    .user-alert-icon { 
        font-size: 16px; 
        margin-top: 1px; 
    } 
 
    .user-alert-message { 
        flex: 1; 
        line-height: 1.5; 
    } 
 
    .user-alert-message ul { 
        margin-bottom: 0; 
        padding-left: 20px; 
    } 
 
    .user-alert-message li { 
        margin-bottom: 3px; 
    } 
 
    .user-table-wrapper { 
        width: 100%; 
        border-top: 1px solid #e5ebf2; 
        overflow-x: auto; 
    } 
 
    .user-table { 
        width: 100%; 
        margin: 0; 
        border-collapse: collapse; 
        min-width: 650px; 
    } 
 
    .user-table thead th { 
        background: #eaf8f0; 
        color: #000000; 
        font-size: 13px; 
        font-weight: 700; 
        padding: 15px 30px; 
        border-bottom: 1px solid #d8f0e3; 
        white-space: nowrap; 
        text-align: left; 
    } 
 
    .user-table tbody td { 
        color: #000000; 
        font-size: 13px; 
        padding: 16px 30px; 
        border-bottom: 1px solid #edf1f6; 
        vertical-align: middle; 
    } 
 
    .user-table tbody tr:last-child td { 
        border-bottom: none; 
    } 
 
    .user-table tbody tr:hover { 
        background: #f5fbf7; 
    } 
 
    .username { 
        color: #000000; 
        font-weight: 600; 
        font-size: 13px; 
    } 
 
    .action-wrapper { 
        display: flex; 
        align-items: center; 
        gap: 7px; 
    } 
 
    .btn-action { 
        width: 38px; 
        height: 38px; 
        display: inline-flex; 
        align-items: center; 
        justify-content: center; 
        border-radius: 8px; 
        border: none; 
        text-decoration: none; 
        transition: 0.2s; 
    } 
 
    .btn-action i { 
        font-size: 17px; 
    } 
 
    .btn-edit { 
        background: #eaf8f0; 
        color: #198754; 
    } 
 
    .btn-edit:hover { 
        background: #d8f0e3; 
        color: #146c43; 
        transform: translateY(-1px); 
    } 
 
    .btn-delete { 
        background: #fff0f1; 
        color: #dc3545; 
    } 
 
    .btn-delete:hover { 
        background: #ffe0e3; 
        color: #b42332; 
        transform: translateY(-1px); 
    } 
 
    .empty-user { 
        text-align: center; 
        padding: 40px 20px !important; 
        color: #000000 !important; 
    } 
 
    .empty-user i { 
        display: block; 
        font-size: 34px; 
        margin-bottom: 8px; 
        color: #000000; 
    } 
 
    @media (max-width: 768px) { 
 
        .user-page { 
            padding: 5px 0 20px; 
        } 
 
        .user-card-header { 
            padding: 22px 20px; 
            flex-direction: column; 
            align-items: stretch; 
        } 
 
        .page-title { 
            font-size: 22px; 
        } 
 
        .page-subtitle { 
            font-size: 13px; 
        } 
 
        .btn-add-user { 
            width: 100%; 
        } 
 
        .user-alert-wrapper { 
            padding: 0 20px 18px; 
        } 
 
        .user-table thead th, 
        .user-table tbody td { 
            padding: 13px 18px; 
        } 
 
    } 
</style> 
 
 
<div class="user-page"> 
 
    <div class="user-card"> 
 
        {{-- HEADER --}} 
        <div class="user-card-header"> 
 
            <div> 
 
                <h4 class="page-title"> 
                    Data User 
                </h4> 
 
                <p class="page-subtitle"> 
                    Kelola pengguna dan hak akses sistem 
                </p> 
 
            </div> 
 
 
            <a 
                href="{{ url('/admin/user/create') }}" 
                class="btn-add-user" 
            > 
 
                <i class="ti ti-plus"></i> 
 
                <span> 
                    Tambah User 
                </span> 
 
            </a> 
 
        </div> 
 
 
        {{-- ALERT SUCCESS --}} 
        @if(session('success')) 
 
            <div class="user-alert-wrapper"> 
 
                <div class="user-alert user-alert-success"> 
 
                    <div class="user-alert-content"> 
 
                        <i class="ti ti-circle-check user-alert-icon"></i> 
 
                        <div class="user-alert-message"> 
 
                            {{ session('success') }} 
 
                        </div> 
 
                        <button 
                            type="button" 
                            class="btn-close" 
                            data-bs-dismiss="alert" 
                            aria-label="Close" 
                        > 
                        </button> 
 
                    </div> 
 
                </div> 
 
            </div> 
 
        @endif 
 
 
        {{-- ALERT ERROR --}} 
        @if(session('error')) 
 
            <div class="user-alert-wrapper"> 
 
                <div class="user-alert user-alert-danger"> 
 
                    <div class="user-alert-content"> 
 
                        <i class="ti ti-alert-circle user-alert-icon"></i> 
 
                        <div class="user-alert-message"> 
 
                            {{ session('error') }} 
 
                        </div> 
 
                        <button 
                            type="button" 
                            class="btn-close" 
                            data-bs-dismiss="alert" 
                            aria-label="Close" 
                        > 
                        </button> 
 
                    </div> 
 
                </div> 
 
            </div> 
 
        @endif 
 
 
        {{-- VALIDASI ERROR --}} 
        @if($errors->any()) 
 
            <div class="user-alert-wrapper"> 
 
                <div class="user-alert user-alert-danger"> 
 
                    <div class="user-alert-content"> 
 
                        <i class="ti ti-alert-circle user-alert-icon"></i> 
 
                        <div class="user-alert-message"> 
 
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
 
                        <button 
                            type="button" 
                            class="btn-close" 
                            data-bs-dismiss="alert" 
                            aria-label="Close" 
                        > 
                        </button> 
 
                    </div> 
 
                </div> 
 
            </div> 
 
        @endif 
 
 
        {{-- TABLE --}} 
        <div class="user-table-wrapper"> 
 
            <table class="user-table"> 
 
                <thead> 
 
                    <tr> 
 
                        <th width="90"> 
                            No 
                        </th> 
 
                        <th> 
                            Username 
                        </th> 
 
                        <th> 
                            Role 
                        </th> 
 
                        <th width="180"> 
                            Aksi 
                        </th> 
 
                    </tr> 
 
                </thead> 
 
 
                <tbody> 
 
                    @forelse($users as $user) 
 
                        <tr> 
 
                            {{-- NO --}} 
                            <td> 
                                {{ $loop->iteration }} 
                            </td> 
 
 
                            {{-- USERNAME --}} 
                            <td> 
 
                                <span class="username"> 
 
                                    {{ $user->username }} 
 
                                </span> 
 
                            </td> 
 
 
                            {{-- ROLE --}} 
                            <td> 
 
                                {{ ucfirst($user->role) }} 
 
                            </td> 
 
 
                            {{-- AKSI --}} 
                            <td> 
 
                                <div class="action-wrapper"> 
 
                                    {{-- EDIT --}} 
                                    <a 
                                        href="{{ url('/admin/user/edit/' . $user->id_user) }}" 
                                        class="btn-action btn-edit" 
                                        title="Edit User" 
                                    > 
 
                                        <i class="ti ti-edit"></i> 
 
                                    </a> 
 
 
                                    {{-- DELETE --}} 
                                    <form 
                                        action="{{ url('/admin/user/delete/' . $user->id_user) }}" 
                                        method="POST" 
                                        class="d-inline" 
                                    > 
 
                                        @csrf 
 
                                        @method('DELETE') 
 
                                        <button 
                                            type="submit" 
                                            class="btn-action btn-delete" 
                                            title="Hapus User" 
                                            onclick="return confirm('Yakin ingin menghapus user ini?')" 
                                        > 
 
                                            <i class="ti ti-trash"></i> 
 
                                        </button> 
 
                                    </form> 
 
                                </div> 
 
                            </td> 
 
                        </tr> 
 
                    @empty 
 
                        <tr> 
 
                            <td 
                                colspan="4" 
                                class="empty-user" 
                            > 
 
                                <i class="ti ti-users-off"></i> 
 
                                Belum ada data user. 
 
                            </td> 
 
                        </tr> 
 
                    @endforelse 
 
                </tbody> 
 
            </table> 
 
        </div> 
 
    </div> 
 
</div> 
 
@endsection