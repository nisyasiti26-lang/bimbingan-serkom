<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Sekolah - MTsN 10 Tasikmalaya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #111827;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 270px;
            height: 100vh;
            background: white;
            border-right: 1px solid #e5e7eb;
            padding: 28px 15px;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 0 10px 28px;
        }

        .sidebar-header h4 {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 12px;
            color: #64748b;
        }

        .menu-title {
            font-size: 12px;
            font-weight: 700;
            color: #111827;
            margin: 18px 10px 8px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 11px 15px;
            margin-bottom: 3px;
            border-radius: 8px;
            color: #111827;
            text-decoration: none;
            font-size: 16px;
            transition: 0.2s;
        }

        .menu-item i {
            width: 28px;
            font-size: 20px;
            color: #111827;
        }

        .menu-item:hover {
            background: #eef3ff;
            color: #1d4ed8;
        }

        .menu-item:hover i {
            color: #1d4ed8;
        }

        .menu-item.active {
            background: #2854bd;
            color: white;
        }

        .menu-item.active i {
            color: white;
        }

        /* ================= CONTENT ================= */

        .main-content {
            margin-left: 270px;
            min-height: 100vh;
            padding: 30px 35px;
        }

        .top-header {
            background: white;
            border-radius: 12px;
            padding: 20px 25px;
            margin-bottom: 25px;
            border: 1px solid #e5e7eb;
        }

        .top-header h3 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        .top-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        /* ================= CARD ================= */

        .card-custom {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e293b;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 7px;
        }

        .form-control {
            border: 1px solid #d1d5db;
            border-radius: 7px;
            padding: 10px 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #2854bd;
            box-shadow: 0 0 0 0.2rem rgba(40, 84, 189, 0.12);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* ================= BUTTON ================= */

        .btn-simpan {
            background: #2854bd;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-simpan:hover {
            background: #1e40af;
            color: white;
        }

        .btn-kembali {
            background: #e5e7eb;
            color: #374151;
            border: none;
            border-radius: 7px;
            padding: 10px 22px;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-kembali:hover {
            background: #d1d5db;
            color: #111827;
        }

        /* ================= ALERT ================= */

        .alert-success {
            border-radius: 8px;
            border: none;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 768px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
                padding: 20px;
            }

        }

    </style>

</head>

<body>

    <!-- ================= SIDEBAR ================= -->

    <div class="sidebar">

        <div class="sidebar-header">

            <h4>MTsN 10 TASIKMALAYA</h4>

            <p>Sistem Informasi Sekolah</p>

        </div>


        <div class="menu-title">
            MENU UTAMA
        </div>


        <!-- Dashboard -->

        <a href="{{ route('dashboard') }}" class="menu-item">

            <i class="bi bi-speedometer2"></i>

            <span>Dashboard</span>

        </a>


        <!-- Profil Sekolah -->

        <a href="{{ route('admin.profile') }}" class="menu-item active">

            <i class="bi bi-mortarboard"></i>

            <span>Profil Sekolah</span>

        </a>


        <!-- Guru -->

        <a href="#" class="menu-item">

            <i class="bi bi-people"></i>

            <span>Data Guru</span>

        </a>


        <!-- Siswa -->

        <a href="#" class="menu-item">

            <i class="bi bi-mortarboard"></i>

            <span>Data Siswa</span>

        </a>


        <!-- Berita -->

        <a href="#" class="menu-item">

            <i class="bi bi-newspaper"></i>

            <span>Berita</span>

        </a>


        <!-- Galeri -->

        <a href="#" class="menu-item">

            <i class="bi bi-images"></i>

            <span>Galeri</span>

        </a>


        <!-- Ekstrakurikuler -->

        <a href="#" class="menu-item">

            <i class="bi bi-trophy"></i>

            <span>Ekstrakurikuler</span>

        </a>


        <div class="menu-title mt-4">
            MANAGEMENT USER
        </div>


        <!-- User -->

        <a href="#" class="menu-item">

            <i class="bi bi-person"></i>

            <span>User</span>

        </a>


        <div class="menu-title mt-4">
            INFORMASI
        </div>


        <!-- Logout -->

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit"
                class="menu-item w-100 border-0 bg-transparent text-start"
                onclick="return confirm('Anda yakin ingin keluar?')">

                <i class="bi bi-box-arrow-right"></i>

                <span>Logout</span>

            </button>

        </form>

    </div>


    <!-- ================= MAIN CONTENT ================= -->

    <div class="main-content">

        <!-- HEADER -->

        <div class="top-header">

            <h3>
                Profil Sekolah
            </h3>

            <p>
                Kelola informasi profil MTsN 10 Tasikmalaya
            </p>

        </div>


        <!-- SUCCESS MESSAGE -->

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


        <!-- VALIDATION ERROR -->

        @if($errors->any())

            <div class="alert alert-danger">

                <strong>Terjadi kesalahan:</strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- ================= FORM ================= -->

        <form action="{{ route('admin.profile.update') }}"
            method="POST">

            @csrf

            @method('PUT')


            <!-- ================= INFORMASI SEKOLAH ================= -->

            <div class="card-custom">

                <div class="card-title">

                    <i class="bi bi-building me-2"></i>

                    Informasi Sekolah

                </div>


                <div class="row">

                    <!-- Nama Sekolah -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nama Sekolah
                        </label>

                        <input type="text"
                            name="nama_sekolah"
                            class="form-control"
                            value="{{ old('nama_sekolah', $profil->nama_sekolah ?? 'MTsN 10 Tasikmalaya') }}"
                            placeholder="Masukkan nama sekolah">

                    </div>


                    <!-- Kepala Sekolah -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Kepala Sekolah
                        </label>

                        <input type="text"
                            name="kepala_sekolah"
                            class="form-control"
                            value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}"
                            placeholder="Masukkan nama kepala sekolah">

                    </div>


                    <!-- NPSN -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            NPSN
                        </label>

                        <input type="text"
                            name="npsn"
                            class="form-control"
                            value="{{ old('npsn', $profil->npsn ?? '') }}"
                            placeholder="Masukkan NPSN">

                    </div>


                    <!-- Kontak -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Kontak
                        </label>

                        <input type="text"
                            name="kontak"
                            class="form-control"
                            value="{{ old('kontak', $profil->kontak ?? '') }}"
                            placeholder="Masukkan nomor kontak">

                    </div>


                    <!-- Alamat -->

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Alamat Sekolah
                        </label>

                        <textarea name="alamat"
                            class="form-control"
                            rows="4"
                            placeholder="Masukkan alamat sekolah">{{ old('alamat', $profil->alamat ?? '') }}</textarea>

                    </div>


                    <!-- Tahun Berdiri -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tahun Berdiri
                        </label>

                        <input type="number"
                            name="tahun_berdiri"
                            class="form-control"
                            value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}"
                            placeholder="Contoh: 2009"
                            min="1900"
                            max="{{ date('Y') }}">

                    </div>

                </div>

            </div>


            <!-- ================= VISI MISI ================= -->

            <div class="card-custom">

                <div class="card-title">

                    <i class="bi bi-bullseye me-2"></i>

                    Visi dan Misi

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Visi dan Misi
                    </label>

                    <textarea name="visi_misi"
                        class="form-control"
                        rows="7"
                        placeholder="Masukkan visi dan misi sekolah">{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>

                </div>

            </div>


            <!-- ================= DESKRIPSI ================= -->

            <div class="card-custom">

                <div class="card-title">

                    <i class="bi bi-info-circle me-2"></i>

                    Deskripsi Sekolah

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                        class="form-control"
                        rows="7"
                        placeholder="Masukkan deskripsi sekolah">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>

                </div>

            </div>


            <!-- ================= BUTTON ================= -->

            <div class="d-flex justify-content-end gap-2 mb-4">

                <a href="{{ route('dashboard') }}"
                    class="btn-kembali">

                    <i class="bi bi-arrow-left me-1"></i>

                    Kembali

                </a>


                <button type="submit"
                    class="btn-simpan">

                    <i class="bi bi-save me-1"></i>

                    Simpan Perubahan

                </button>

            </div>


        </form>

    </div>


    <!-- BOOTSTRAP JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>