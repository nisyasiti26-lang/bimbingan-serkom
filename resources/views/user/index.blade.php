<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Management User - Profil Sekolah</title>

    <link rel="stylesheet"
        href="{{ asset('css/styles.min.css') }}">

    <style>

        body {
            background: #f5f7fb;
        }

        .user-page {
            padding: 30px;
        }

        .card {
            border: 0;
            border-radius: 12px;
        }

        .table th {
            white-space: nowrap;
        }

        .btn-action {
            min-width: 70px;
        }

        .btn-tambah-user {
            display: inline-block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

    </style>

</head>


<body>

<div class="container-fluid user-page">

    {{-- HEADER --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="mb-1">
                Management User
            </h3>

            <p class="text-muted mb-0">
                Kelola data pengguna sistem.
            </p>

        </div>


        <a href="{{ url('/admin/user/create') }}"
            class="btn btn-primary btn-tambah-user">

            <i class="ti ti-plus"></i>

            Tambah User

        </a>

    </div>


    {{-- PESAN BERHASIL --}}

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    {{-- ERROR --}}

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- TABLE USER --}}

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Nama</th>

                            <th>Username</th>

                            <th>Role</th>

                            <th width="180">
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
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->username }}
                                </td>

                                <td>

                                    @if($user->role === 'admin')

                                        <span class="badge bg-primary">
                                            Admin
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Operator
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    {{-- EDIT --}}

                                    <a href="{{ url('/admin/user/edit/' . $user->id_user) }}"
                                        class="btn btn-sm btn-warning btn-action">

                                        Edit

                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ url('/admin/user/delete/' . $user->id_user) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-sm btn-danger btn-action">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center text-muted py-4">

                                    Belum ada data user.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- KEMBALI --}}

    <a href="{{ url('/') }}"
        class="btn btn-light mt-3">

        ← Kembali ke Dashboard

    </a>

</div>

</body>

</html>