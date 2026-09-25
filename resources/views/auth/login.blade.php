<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Profil Sekolah</title>

    {{-- Favicon --}}
    <link rel="shortcut icon"
        type="image/png"
        href="{{ asset('images/logos/favicon.png') }}" />

    {{-- CSS --}}
    <link rel="stylesheet"
        href="{{ asset('css/styles.min.css') }}" />
</head>

<body>

    <!-- Body Wrapper -->
    <div class="page-wrapper"
        id="main-wrapper"
        data-layout="vertical"
        data-navbarbg="skin6"
        data-sidebartype="full"
        data-sidebar-position="fixed"
        data-header-position="fixed">

        <div class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">

            <div class="d-flex align-items-center justify-content-center w-100">

                <div class="row justify-content-center w-100">

                    <div class="col-md-8 col-lg-6 col-xxl-3">

                        <div class="card mb-0">

                            <div class="card-body">

                                {{-- LOGO --}}
                                <a href="{{ url('/') }}"
                                    class="text-nowrap logo-img text-center d-block py-3 w-100">

                                    <img src="{{ asset('images/logos/logo.svg') }}"
                                        alt="Logo">

                                </a>

                                {{-- JUDUL --}}
                                <p class="text-center">
                                    Sistem Informasi Profil Sekolah
                                </p>


                                {{-- ERROR LOGIN --}}
                                @if($errors->any())

                                    <div class="alert alert-danger">

                                        {{ $errors->first() }}

                                    </div>

                                @endif


                                {{-- FORM LOGIN --}}
                                <form action="{{ url('/login') }}" method="POST">

                                    @csrf


                                    {{-- USERNAME --}}
                                    <div class="mb-3">

                                        <label for="username"
                                            class="form-label">

                                            Username

                                        </label>

                                        <input type="text"
                                            name="username"
                                            class="form-control"
                                            id="username"
                                            value="{{ old('username') }}"
                                            required>

                                    </div>


                                    {{-- PASSWORD --}}
                                    <div class="mb-4">

                                        <label for="password"
                                            class="form-label">

                                            Password

                                        </label>

                                        <input type="password"
                                            name="password"
                                            class="form-control"
                                            id="password"
                                            required>

                                    </div>


                                    {{-- REMEMBER --}}
                                    <div class="d-flex align-items-center justify-content-between mb-4">

                                        <div class="form-check">

                                            <input
                                                class="form-check-input primary"
                                                type="checkbox"
                                                name="remember"
                                                id="remember">

                                            <label
                                                class="form-check-label text-dark"
                                                for="remember">

                                                Ingat Saya?

                                            </label>

                                        </div>

                                    </div>


                                    {{-- TOMBOL LOGIN --}}
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">

                                        Sign In

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Bootstrap JS --}}
    {{-- Dihapus karena folder assets/libs tidak tersedia --}}

</body>

</html>