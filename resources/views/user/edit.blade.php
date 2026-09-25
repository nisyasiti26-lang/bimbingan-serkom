<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Edit User - Profil Sekolah</title>

    <link rel="stylesheet"
        href="{{ asset('css/styles.min.css') }}">

    <style>

        body {
            background: #f5f7fb;
        }

        .page {
            padding: 30px;
        }

        .card {
            border: 0;
            border-radius: 12px;
        }

    </style>

</head>


<body>

<div class="container page">

    <div class="card shadow-sm">

        <div class="card-body p-4">

            <h3 class="mb-1">
                Edit User
            </h3>

            <p class="text-muted mb-4">
                Ubah data user.
            </p>


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


            <form
                action="{{ url('/admin/user/update/' . $user->id_user) }}"
                method="POST">

                @csrf

                @method('PUT')


                {{-- NAMA --}}

                <div class="mb-3">

                    <label class="form-label">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $user->name) }}"
                        required>

                </div>


                {{-- USERNAME --}}

                <div class="mb-3">

                    <label class="form-label">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        value="{{ old('username', $user->username) }}"
                        required>

                </div>


                {{-- PASSWORD --}}

                <div class="mb-3">

                    <label class="form-label">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control">

                    <small class="text-muted">
                        Kosongkan jika password tidak ingin diubah.
                    </small>

                </div>


                {{-- ROLE --}}

                <div class="mb-4">

                    <label class="form-label">
                        Role
                    </label>

                    <select
                        name="role"
                        class="form-select"
                        required>

                        <option value="admin"
                            @selected(old('role', $user->role) === 'admin')>

                            Admin

                        </option>

                        <option value="operator"
                            @selected(old('role', $user->role) === 'operator')>

                            Operator

                        </option>

                    </select>

                </div>


                <a href="{{ url('/admin/user') }}"
                    class="btn btn-light">

                    Batal

                </a>


                <button type="submit"
                    class="btn btn-primary">

                    Update

                </button>

            </form>

        </div>

    </div>

</div>

</body>

</html>