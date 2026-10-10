<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Profil Sekolah</title>

    <link rel="shortcut icon"
        type="image/png"
        href="{{ asset('images/logos/favicon.png') }}">

    <link rel="stylesheet"
        href="{{ asset('css/styles.min.css') }}">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(
                135deg,
                #e8f5e9 0%,
                #c8e6c9 50%,
                #a5d6a7 100%
            );
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px 15px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 18px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 15px 40px rgba(22, 101, 52, 0.15);
        }

        .login-card .card-body {
            padding: 35px;
        }

        .logo-img img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .login-title {
            color: #166534;
            font-weight: 700;
            font-size: 23px;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-label {
            color: #166534;
            font-weight: 600;
        }

        .form-control {
            border: 1px solid #d1e7d5;
            border-radius: 9px;
            padding: 12px 14px;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.15);
        }

        .form-check-input:checked {
            background-color: #198754;
            border-color: #198754;
        }

        .btn-login {
            background: linear-gradient(135deg, #198754, #14532d);
            border: none;
            color: #ffffff;
            border-radius: 9px;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #157347, #0f3d23);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(22, 101, 52, 0.2);
        }

        .login-footer {
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            margin-top: 20px;
            margin-bottom: 0;
        }

        @media (max-width: 480px) {
            .login-card .card-body {
                padding: 25px 20px;
            }

            .logo-img img {
                width: 85px;
                height: 85px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <div class="card login-card">

            <div class="card-body">

                <a href="{{ url('/') }}"
                    class="logo-img text-center d-block">

                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo Sekolah">
                </a>

                <h4 class="text-center login-title">
                    Selamat Datang
                </h4>

                <p class="text-center login-subtitle">
                    Sistem Informasi Profil Sekolah
                </p>

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            id="username"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}"
                            autocomplete="username"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            id="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                value="1">

                            <label
                                class="form-check-label text-dark"
                                for="remember">
                                Ingat Saya
                            </label>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-login w-100">
                        Sign In
                    </button>

                </form>

                <p class="login-footer">
                    &copy; {{ date('Y') }} Sistem Informasi Profil Sekolah
                </p>

            </div>
        </div>

    </div>

</body>
</html>