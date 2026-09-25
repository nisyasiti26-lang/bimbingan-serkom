<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah User - Profil Sekolah</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #333;
        }

        .page {
            width: 100%;
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .card-body {
            padding: 30px;
        }

        h3 {
            margin-top: 0;
            margin-bottom: 5px;
        }

        .text-muted {
            color: #777;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        .mb-4 {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input,
        select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 14px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #0d6efd;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 7px;
            background: #f8d7da;
            color: #842029;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-light {
            background: #e9ecef;
            color: #333;
        }

        .btn-primary {
            background: #0d6efd;
            color: white;
        }

        .btn-primary:hover {
            background: #0b5ed7;
        }

        small {
            display: block;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="page">

        <div class="card">

            <div class="card-body">

                <h3>Tambah User</h3>

                <p class="text-muted">
                    Masukkan data user baru.
                </p>

                @if($errors->any())

                    <div class="alert">

                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif

                <form action="{{ url('/admin/user/store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label for="name">
                            Nama
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label for="username">
                            Username
                        </label>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label for="password">
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            required>

                        <small class="text-muted">
                            Minimal 6 karakter.
                        </small>

                    </div>

                    <div class="mb-4">

                        <label for="role">
                            Role
                        </label>

                        <select
                            id="role"
                            name="role"
                            required>

                            <option value="">
                                -- Pilih Role --
                            </option>

                            <option value="admin">
                                Admin
                            </option>

                            <option value="operator">
                                Operator
                            </option>

                        </select>

                    </div>

                    <a
                        href="{{ url('/admin/user') }}"
                        class="btn btn-light">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">
                        Simpan
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>