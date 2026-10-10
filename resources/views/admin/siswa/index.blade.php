@extends('index')

@section('title', 'Data Siswa - MTsN 10 Tasikmalaya')

@section('content')

    <style>
        /* =========================  
           CARD  
        ========================= */

        .data-card {
            background: #ffffff;
            border: 1px solid #dfeee6;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(25, 135, 84, 0.07);
            overflow: hidden;
        }


        /* =========================  
           HEADER  
        ========================= */

        .data-card-header {
            padding: 25px 30px;
            border-bottom: 1px solid #e2eee7;
        }

        .data-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .data-card-header h4 {
            color: #000000;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .data-card-header p {
            color: #000000;
            margin-bottom: 0;
            font-size: 14px;
        }


        /* =========================  
           HEADER ACTION  
        ========================= */

        .siswa-header-action {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }


        /* =========================  
           PENCARIAN  
        ========================= */

        .search-siswa-box {
            position: relative;
            width: 300px;
        }

        .search-siswa-box>i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);

            color: #94a3b8;
            font-size: 15px;

            pointer-events: none;
        }

        .search-siswa-input {
            width: 100%;
            height: 40px;

            padding: 0 38px 0 38px;

            border: 1px solid #d3e3d9;
            border-radius: 7px;

            outline: none;

            font-size: 13px;
            color: #000000;

            background: #ffffff;

            transition: 0.2s;
        }

        .search-siswa-input::placeholder {
            color: #a0acba;
        }

        .search-siswa-input:focus {
            border-color: #198754;

            box-shadow:
                0 0 0 3px rgba(25, 135, 84, 0.10);
        }

        .btn-reset-search {
            position: absolute;
            right: 10px;
            top: 50%;

            transform: translateY(-50%);

            border: none;
            background: transparent;

            color: #94a3b8;

            font-size: 14px;

            cursor: pointer;

            display: none;
        }

        .btn-reset-search:hover {
            color: #dc3545;
        }


        /* =========================  
           TOMBOL TAMBAH  
        ========================= */

        .btn-tambah {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 9px 18px;

            border: none;
            border-radius: 7px;

            background: #198754;
            color: white;

            font-size: 14px;

            text-decoration: none;

            transition: 0.2s;

            white-space: nowrap;
        }

        .btn-tambah:hover {
            background: #157347;
            color: white;
        }


        /* =========================  
           TABLE  
        ========================= */

        .table th {
            color: #000000;
            font-size: 14px;
            font-weight: 600;

            background: #f4faf6;

            padding: 15px 20px;
        }

        .table td {
            color: #000000;
            font-size: 14px;

            padding: 15px 20px;

            vertical-align: middle;
        }

        .table td strong {
            color: #000000;
        }

        .table tbody tr {
            transition: 0.15s;
        }

        .table tbody tr:hover {
            background: #f8fcfa;
        }


        /* =========================  
           BADGE JENIS KELAMIN  
        ========================= */

        .badge-laki {
            background: #e8f7ef;
            color: #198754;

            padding: 8px 12px;

            border-radius: 6px;

            font-size: 13px;
        }

        .badge-perempuan {
            background: #fdecef;
            color: #c0395a;

            padding: 8px 12px;

            border-radius: 6px;

            font-size: 13px;
        }


        /* =========================  
           BADGE TAHUN  
        ========================= */

        .badge-tahun {
            background: #eef4f0;
            color: #000000;

            padding: 8px 12px;

            border-radius: 6px;

            font-size: 13px;
        }


        /* =========================  
           TOMBOL EDIT  
        ========================= */

        .btn-edit {
            background: #e8f7ef;
            color: #198754;

            border: none;
            border-radius: 6px;

            padding: 9px 11px;

            text-decoration: none;
        }

        .btn-edit:hover {
            background: #d8f0e2;
            color: #157347;
        }


        /* =========================  
           TOMBOL HAPUS  
        ========================= */

        .btn-hapus {
            background: #fde8e8;
            color: #dc3545;

            border: none;
            border-radius: 6px;

            padding: 9px 11px;

            cursor: pointer;
        }

        .btn-hapus:hover {
            background: #fbd5d5;
            color: #b02a37;
        }


        /* =========================  
           ALERT SUCCESS  
        ========================= */

        .alert-success {
            background: #d1e7dd;

            border: 1px solid #badbcc;

            color: #000000;

            border-radius: 8px;

            padding: 15px 18px;
        }


        /* =========================  
           DATA TIDAK DITEMUKAN  
        ========================= */

        .no-search-result {
            display: none;

            padding: 50px 20px;

            text-align: center;

            color: #000000;
        }

        .no-search-result i {
            display: block;

            font-size: 40px;

            color: #9bb8a7;

            margin-bottom: 10px;
        }

        .no-search-result h5 {
            margin: 0 0 5px;

            font-size: 15px;

            color: #000000;

            font-weight: 600;
        }

        .no-search-result p {
            margin: 0;

            font-size: 12px;

            color: #000000;
        }


        /* =========================  
           RESPONSIVE  
        ========================= */

        @media (max-width: 1000px) {

            .data-header-content {
                flex-wrap: wrap;
            }

            .siswa-header-action {
                width: 100%;
            }

            .search-siswa-box {
                flex: 1;
            }

        }


        @media (max-width: 700px) {

            .data-card-header {
                padding: 20px;
            }

            .data-header-content {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .siswa-header-action {
                width: 100%;

                flex-direction: column;

                align-items: stretch;
            }

            .search-siswa-box {
                width: 100%;
            }

            .btn-tambah {
                width: 100%;
            }

        }
    </style>


    <div class="row">

        <div class="col-12">


            {{-- =========================================
            NOTIFIKASI BERHASIL
            ========================================== --}}

            @if (session('success'))

                <div class="alert alert-success d-flex align-items-center mb-4">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- =========================================
            NOTIFIKASI ERROR
            ========================================== --}}

            @if (session('error'))

                <div class="alert alert-danger d-flex align-items-center mb-4">

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    <span>
                        {{ session('error') }}
                    </span>

                </div>

            @endif


            {{-- =========================================
            DATA CARD
            ========================================== --}}

            <div class="data-card">


                {{-- =========================================
                HEADER DAFTAR SISWA
                ========================================== --}}

                <div class="data-card-header">

                    <div class="data-header-content">

                        <div>

                            <h4>
                                Daftar Siswa
                            </h4>

                            <p>
                                Data siswa yang terdaftar dalam sistem
                            </p>

                        </div>


                        {{-- =========================================
                        SEARCH + TOMBOL TAMBAH
                        ========================================== --}}

                        <div class="siswa-header-action">


                            {{-- PENCARIAN --}}

                            @if(isset($siswas) && $siswas->count() > 0)

                                <div class="search-siswa-box">

                                    <i class="bi bi-search"></i>

                                    <input type="text" id="searchSiswa" class="search-siswa-input"
                                        placeholder="Cari NISN, nama, tahun masuk..." autocomplete="off">

                                    <button type="button" id="resetSearchSiswa" class="btn-reset-search"
                                        title="Hapus pencarian">

                                        <i class="bi bi-x-circle-fill"></i>

                                    </button>

                                </div>

                            @endif


                            {{-- TOMBOL TAMBAH KHUSUS ADMIN --}}

                            @auth

                                @if (strtolower(Auth::user()->role) === 'admin')

                                    <a href="{{ route('admin.siswa.create') }}" class="btn-tambah">

                                        <i class="bi bi-plus-lg me-2"></i>

                                        Tambah Siswa

                                    </a>

                                @endif

                            @endauth

                        </div>

                    </div>

                </div>


                {{-- =========================================
                TABEL
                ========================================== --}}

                <div class="table-responsive">

                    <table class="table align-middle mb-0">

                        <thead>

                            <tr>

                                <th width="60">
                                    No
                                </th>

                                <th>
                                    NISN
                                </th>

                                <th>
                                    Nama Siswa
                                </th>

                                <th>
                                    Jenis Kelamin
                                </th>

                                <th>
                                    Tahun Masuk
                                </th>


                                {{-- KOLOM AKSI KHUSUS ADMIN --}}

                                @auth

                                    @if (strtolower(Auth::user()->role) === 'admin')

                                        <th width="130">
                                            Aksi
                                        </th>

                                    @endif

                                @endauth

                            </tr>

                        </thead>


                        <tbody id="siswaTableBody">


                            @forelse ($siswas as $siswa)

                                <tr class="siswa-row">


                                    {{-- NOMOR --}}

                                    <td>

                                        {{ $loop->iteration }}

                                    </td>


                                    {{-- NISN --}}

                                    <td>

                                        {{ $siswa->nisn }}

                                    </td>


                                    {{-- NAMA --}}

                                    <td>

                                        <strong>
                                            {{ $siswa->nama_siswa }}
                                        </strong>

                                    </td>


                                    {{-- JENIS KELAMIN --}}

                                    <td>

                                        @if ($siswa->jenis_kelamin == 'Laki-Laki')

                                            <span class="badge-laki">

                                                Laki-Laki

                                            </span>

                                        @else

                                            <span class="badge-perempuan">

                                                Perempuan

                                            </span>

                                        @endif

                                    </td>


                                    {{-- TAHUN MASUK --}}

                                    <td>

                                        <span class="badge-tahun">

                                            {{ $siswa->tahun_masuk }}

                                        </span>

                                    </td>


                                    {{-- AKSI KHUSUS ADMIN --}}

                                    @auth

                                        @if (strtolower(Auth::user()->role) === 'admin')

                                            <td>


                                                {{-- EDIT --}}

                                                <a href="{{ route('admin.siswa.edit', $siswa->nisn) }}" class="btn-edit"
                                                    title="Edit Siswa">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>


                                                {{-- HAPUS --}}

                                                <form action="{{ route('admin.siswa.delete', $siswa->id) }}" method="POST"
                                                    class="d-inline">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit" class="btn-hapus"
                                                        onclick="return confirm('Yakin ingin menghapus data siswa ini?')">

                                                        <i class="bi bi-trash"></i>

                                                    </button>

                                                </form>


                                            </td>

                                        @endif

                                    @endauth


                                </tr>


                            @empty


                                <tr id="dataKosong">

                                    <td colspan="{{ auth()->check() && strtolower(auth()->user()->role) === 'admin' ? 6 : 5 }}"
                                        class="text-center py-4">

                                        Belum ada data siswa.

                                    </td>

                                </tr>


                            @endforelse


                        </tbody>

                    </table>


                    {{-- =========================================
                    HASIL PENCARIAN KOSONG
                    ========================================== --}}

                    <div class="no-search-result" id="noSearchResult">

                        <i class="bi bi-search"></i>

                        <h5>
                            Data Tidak Ditemukan
                        </h5>

                        <p>
                            Tidak ada data siswa yang sesuai dengan pencarian.
                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>


    {{-- =========================================
    JAVASCRIPT PENCARIAN SISWA
    ========================================== --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {


            const searchInput =
                document.getElementById('searchSiswa');


            const resetButton =
                document.getElementById('resetSearchSiswa');


            const rows =
                document.querySelectorAll('.siswa-row');


            const noSearchResult =
                document.getElementById('noSearchResult');


            if (!searchInput) {
                return;
            }


            /* =========================  
               FUNGSI PENCARIAN  
            ========================= */

            function cariSiswa() {


                const keyword =
                    searchInput.value
                        .toLowerCase()
                        .trim();


                let jumlahDitemukan = 0;


                rows.forEach(function (row) {


                    /*  
                     * Kolom:  
                     *  
                     * 0 = No  
                     * 1 = NISN  
                     * 2 = Nama Siswa  
                     * 3 = Jenis Kelamin  
                     * 4 = Tahun Masuk  
                     */


                    const nisn =
                        row.cells[1]
                            ? row.cells[1]
                                .textContent
                                .toLowerCase()
                            : '';


                    const nama =
                        row.cells[2]
                            ? row.cells[2]
                                .textContent
                                .toLowerCase()
                            : '';


                    const jenisKelamin =
                        row.cells[3]
                            ? row.cells[3]
                                .textContent
                                .toLowerCase()
                            : '';


                    const tahunMasuk =
                        row.cells[4]
                            ? row.cells[4]
                                .textContent
                                .toLowerCase()
                            : '';


                    const cocok =
                        nisn.includes(keyword) ||
                        nama.includes(keyword) ||
                        jenisKelamin.includes(keyword) ||
                        tahunMasuk.includes(keyword);


                    if (cocok) {

                        row.style.display = '';

                        jumlahDitemukan++;

                    } else {

                        row.style.display = 'none';

                    }

                });


                /* =========================  
                   TOMBOL RESET  
                ========================= */

                if (keyword !== '') {

                    resetButton.style.display = 'block';

                } else {

                    resetButton.style.display = 'none';

                }


                /* =========================  
                   DATA TIDAK DITEMUKAN  
                ========================= */

                if (
                    jumlahDitemukan === 0 &&
                    keyword !== ''
                ) {

                    noSearchResult.style.display = 'block';

                } else {

                    noSearchResult.style.display = 'none';

                }

            }


            /* =========================  
               SAAT MENGETIK  
            ========================= */

            searchInput.addEventListener(
                'input',
                cariSiswa
            );


            /* =========================  
               TOMBOL X  
            ========================= */

            resetButton.addEventListener(
                'click',
                function () {

                    searchInput.value = '';

                    cariSiswa();

                    searchInput.focus();

                }
            );

        });

    </script>

@endsection