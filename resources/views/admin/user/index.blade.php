@extends('index')

@section('title', 'Management User - SMK Singaparna')

@section('content')

<div class="top-header">

    <h3>
        Management User
    </h3>

    <p>
        Kelola data pengguna sistem.
    </p>

</div>


@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="bi bi-check-circle me-2"></i>

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


@if($errors->any())

    <div class="alert alert-danger">

        <strong>
            Terjadi kesalahan:
        </strong>

        <ul class="mb-0 mt-2">

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


<div class="card-custom">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="card-title-custom">

            <i class="bi bi-people me-2"></i>

            Daftar Pengguna

        </div>


        <a href="{{ url('/admin/user/create') }}"
           class="btn-tambah">

            <i class="bi bi-plus-lg me-1"></i>

            Tambah User

        </a>

    </div>


    <div class="table-responsive">

        <table class="table align-middle">

            <thead>

                <tr>

                    <th width="70">
                        No
                    </th>

                    <th>
                        Username
                    </th>

                    <th width="130">
                        Role
                    </th>

                    <th width="190">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $user->username }}
                        </td>

                        <td>

                            @if($user->role === 'admin')

                                <span class="badge-admin">
                                    Admin
                                </span>

                            @else

                                <span class="badge-operator">
                                    Operator
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ url('/admin/user/edit/' . $user->id_user) }}"
                               class="btn-edit">

                                <i class="bi bi-pencil-square me-1"></i>

                                Edit

                            </a>


                            <form action="{{ url('/admin/user/delete/' . $user->id_user) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn-hapus">

                                    <i class="bi bi-trash me-1"></i>

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center text-muted py-5">

                            <i class="bi bi-person-x fs-2 d-block mb-2"></i>

                            Belum ada data user.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection