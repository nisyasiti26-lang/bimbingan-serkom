@extends('index')

@section('title', 'Data User - SMKS Singaparna')

@section('content')

<div class="container-fluid">

    <!-- HEADER HALAMAN -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1 fw-bold">
                Data User
            </h4>

            <p class="text-muted mb-0">
                Kelola data pengguna sistem
            </p>
        </div>

        <a
            href="{{ url('/admin/user/create') }}"
            class="btn btn-primary">

            <i class="ti ti-plus me-1"></i>

            Tambah User

        </a>

    </div>


    <!-- CARD DATA USER -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

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

                            <th>
                                Role
                            </th>

                            <th width="150">
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
                                {{ $user->role }}
                            </td>

                            <td>

                                <!-- EDIT -->
                                <a
                                    href="{{ url('/admin/user/edit/' . $user->id_user) }}"
                                    class="btn btn-sm btn-warning">

                                    <i class="ti ti-edit"></i>

                                </a>


                                <!-- DELETE -->
                                <form
                                    action="{{ url('/admin/user/delete/' . $user->id_user) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">

                                        <i class="ti ti-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="4"
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

</div>

@endsection