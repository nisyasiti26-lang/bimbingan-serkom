
@extends('index')

@section('title', 'Data Guru - MTsN 10 Tasikmalaya')

@section('content')

<style>
    .guru-wrapper {
        width: 100%;
        padding: 0 0 30px;
    }

    /* ALERT */
    .alert-success {
        background: #d1e7dd;
        color: #000000;
        border: 1px solid #badbcc;
        padding: 13px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .alert-danger {
        background: #f8d7da;
        color: #000000;
        border: 1px solid #f5c2c7;
        padding: 13px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-danger strong {
        display: block;
        margin-bottom: 5px;
    }

    .alert-danger ul {
        margin: 5px 0 0 20px;
        padding: 0;
    }

    .alert-danger li {
        margin-bottom: 3px;
    }

    /* CARD */
    .guru-card {
        background: #ffffff;
        border: 1px solid #dcefe2;
        border-radius: 10px;
        overflow: hidden;
    }

    /* HEADER CARD */
    .guru-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e4eee7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .guru-card-title {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #000000;
    }

    .guru-card-subtitle {
        margin: 5px 0 0;
        font-size: 13px;
        color: #000000;
    }

    /* HEADER ACTION */
    .guru-header-action {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-shrink: 0;
    }

    /* PENCARIAN */
    .search-guru-box {
        position: relative;
        width: 300px;
    }

    .search-guru-box > i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3a0;
        font-size: 15px;
        pointer-events: none;
    }

    .search-guru-input {
        width: 100%;
        height: 40px;
        padding: 0 38px;
        border: 1px solid #d6e3da;
        border-radius: 7px;
        outline: none;
        font-size: 13px;
        color: #000000;
        background: #ffffff;
        transition: 0.2s;
    }

    .search-guru-input::placeholder {
        color: #9aa9a0;
    }

    .search-guru-input:focus {
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.10);
    }

    .btn-reset-search {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #94a3a0;
        font-size: 14px;
        cursor: pointer;
        display: none;
    }

    .btn-reset-search:hover {
        color: #dc3545;
    }

    /* TOMBOL TAMBAH */
    .btn-tambah {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 10px 16px;
        background: #198754;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
        white-space: nowrap;
    }

    .btn-tambah:hover {
        background: #157347;
        color: #ffffff;
    }

    /* TABLE */
    .guru-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .guru-table {
        width: 100%;
        border-collapse: collapse;
    }

    .guru-table thead {
        background: #f4faf6;
    }

    .guru-table th {
        padding: 14px 16px;
        font-size: 12px;
        font-weight: 700;
        color: #000000;
        text-align: left;
        border-bottom: 1px solid #dce9df;
    }

    .guru-table td {
        padding: 14px 16px;
        font-size: 13px;
        color: #000000;
        border-bottom: 1px solid #edf3ef;
        vertical-align: middle;
    }

    .guru-table tbody tr:hover {
        background: #f8fcf9;
    }

    .guru-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* NOMOR */
    .nomor {
        width: 60px;
        text-align: center !important;
        color: #000000 !important;
        font-weight: 600;
    }

    /* FOTO */
    .guru-foto {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #dce9df;
    }

    .foto-kosong {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #f0f7f2;
        border: 1px solid #dce9df;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8ba394;
        font-size: 18px;
    }

    /* NAMA */
    .nama-guru {
        font-weight: 600;
        color: #000000 !important;
    }

    /* MAPEL */
    .badge-mapel {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 5px;
        background: #e8f5e9;
        color: #198754;
        font-size: 11px;
        font-weight: 600;
    }

    /* AKSI */
    .aksi {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-aksi {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        text-decoration: none;
        border: none;
        font-size: 14px;
        transition: 0.2s;
    }

    .btn-edit {
        background: #e8f5e9;
        color: #198754;
    }

    .btn-edit:hover {
        background: #d1e7dd;
        color: #157347;
    }

    .btn-hapus {
        background: #feecec;
        color: #dc3545;
        cursor: pointer;
    }

    .btn-hapus:hover {
        background: #fddddd;
        color: #b02a37;
    }

    /* DATA KOSONG */
    .empty-guru {
        padding: 60px 20px;
        text-align: center;
        color: #000000;
    }

    .empty-guru i {
        display: block;
        margin-bottom: 10px;
        font-size: 42px;
        color: #aabdb1;
    }

    .empty-guru h5 {
        margin: 0 0 5px;
        font-size: 15px;
        color: #000000;
        font-weight: 600;
    }

    .empty-guru p {
        margin: 0;
        font-size: 12px;
        color: #000000;
    }

    /* HASIL PENCARIAN KOSONG */
    .no-search-result {
        display: none;
        padding: 50px 20px;
        text-align: center;
        color: #000000;
    }

    .no-search-result i {
        display: block;
        font-size: 40px;
        color: #aabdb1;
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

    /* RESPONSIVE */
    @media (max-width: 1000px) {
        .guru-card-header {
            flex-wrap: wrap;
        }

        .guru-header-action {
            width: 100%;
        }

        .search-guru-box {
            flex: 1;
        }
    }

    @media (max-width: 700px) {
        .guru-card-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .guru-header-action {
            width: 100%;
            flex-direction: column;
            align-items: stretch;
        }

        .search-guru-box {
            width: 100%;
        }

        .btn-tambah {
            width: 100%;
            justify-content: center;
        }

        .guru-table {
            min-width: 700px;
        }
    }
</style>

<div class="guru-wrapper">

    {{-- PESAN BERHASIL --}}
    @if(session('success'))
        <div class="alert-success">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- PESAN ERROR --}}
    @if($errors->any())
        <div class="alert-danger">
            <strong>
                <i class="bi bi-exclamation-triangle-fill"></i>
                Terjadi kesalahan:
            </strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- CARD DATA GURU --}}
    <div class="guru-card">

        {{-- HEADER --}}
        <div class="guru-card-header">
            <div>
                <div class="guru-card-title">Daftar Guru</div>
                <div class="guru-card-subtitle">
                    Data guru yang terdaftar dalam sistem
                </div>
            </div>

            {{-- PENCARIAN DAN TOMBOL TAMBAH --}}
            <div class="guru-header-action">

                @if(isset($gurus) && $gurus->count() > 0)
                    <div class="search-guru-box">
                        <i class="bi bi-search"></i>

                        <input
                            type="text"
                            id="searchGuru"
                            class="search-guru-input"
                            placeholder="Cari nama, NIP, atau mata pelajaran..."
                            autocomplete="off">

                        <button
                            type="button"
                            id="resetSearchGuru"
                            class="btn-reset-search"
                            title="Hapus pencarian">
                            <i class="bi bi-x-circle-fill"></i>
                        </button>
                    </div>
                @endif

                {{-- TOMBOL TAMBAH KHUSUS ADMIN --}}
                @auth
                    @if(strtolower(Auth::user()->role) === 'admin')
                        <a href="{{ route('admin.guru.create') }}" class="btn-tambah">
                            <i class="bi bi-plus-lg"></i>
                            Tambah Guru
                        </a>
                    @endif
                @endauth
            </div>
        </div>

        {{-- CEK DATA GURU --}}
        @if(isset($gurus) && $gurus->count() > 0)

            <div class="guru-table-wrapper">
                <table class="guru-table">
                    <thead>
                        <tr>
                            <th class="nomor">No</th>
                            <th>Foto</th>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Mata Pelajaran</th>

                            {{-- KOLOM AKSI KHUSUS ADMIN --}}
                            @auth
                                @if(strtolower(Auth::user()->role) === 'admin')
                                    <th>Aksi</th>
                                @endif
                            @endauth
                        </tr>
                    </thead>

                    <tbody id="guruTableBody">
                        @foreach($gurus as $guru)
                            <tr class="guru-row">

                                {{-- NOMOR --}}
                                <td class="nomor">{{ $loop->iteration }}</td>

                                {{-- FOTO --}}
                                <td>
                                    @if($guru->foto)
                                        <img
                                            src="{{ asset('storage/' . $guru->foto) }}"
                                            alt="{{ $guru->nama_guru }}"
                                            class="guru-foto">
                                    @else
                                        <div class="foto-kosong">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    @endif
                                </td>

                                {{-- NAMA --}}
                                <td class="nama-guru">
                                    {{ $guru->nama_guru }}
                                </td>

                                {{-- NIP --}}
                                <td>{{ $guru->nip ?? '-' }}</td>

                                {{-- MATA PELAJARAN --}}
                                <td>
                                    @if($guru->mapel)
                                        <span class="badge-mapel">
                                            {{ $guru->mapel }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>

                                {{-- AKSI KHUSUS ADMIN --}}
                                @auth
                                    @if(strtolower(Auth::user()->role) === 'admin')
                                        <td>
                                            <div class="aksi">

                                                {{-- EDIT MENGGUNAKAN NAMA GURU --}}
                                                <a
                                                    href="{{ route('admin.guru.edit', ['nama_guru' => $guru->nama_guru]) }}"
                                                    class="btn-aksi btn-edit"
                                                    title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                {{-- HAPUS TETAP MENGGUNAKAN ID --}}
                                                <form
                                                    action="{{ route('admin.guru.delete', $guru->id_guru) }}"
                                                    method="POST"
                                                    style="display: inline;"
                                                    onsubmit="return confirm('Yakin ingin menghapus data guru ini?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn-aksi btn-hapus"
                                                        title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    @endif
                                @endauth

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- HASIL PENCARIAN KOSONG --}}
                <div class="no-search-result" id="noSearchResult">
                    <i class="bi bi-search"></i>
                    <h5>Data Tidak Ditemukan</h5>
                    <p>Tidak ada data guru yang sesuai dengan pencarian.</p>
                </div>
            </div>

        @else

            {{-- DATA KOSONG --}}
            <div class="empty-guru">
                <i class="bi bi-person-workspace"></i>
                <h5>Belum Ada Data Guru</h5>
                <p>Silakan tambahkan data guru terlebih dahulu.</p>
            </div>

        @endif
    </div>
</div>

{{-- JAVASCRIPT PENCARIAN --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchGuru');
    const resetButton = document.getElementById('resetSearchGuru');
    const rows = document.querySelectorAll('.guru-row');
    const noSearchResult = document.getElementById('noSearchResult');

    if (!searchInput || !resetButton || !noSearchResult) {
        return;
    }

    function cariGuru() {
        const keyword = searchInput.value.toLowerCase().trim();
        let jumlahDitemukan = 0;

        rows.forEach(function (row) {
            // 0 = No, 1 = Foto, 2 = Nama, 3 = NIP, 4 = Mata Pelajaran
            const nama = row.cells[2]
                ? row.cells[2].textContent.toLowerCase()
                : '';

            const nip = row.cells[3]
                ? row.cells[3].textContent.toLowerCase()
                : '';

            const mapel = row.cells[4]
                ? row.cells[4].textContent.toLowerCase()
                : '';

            const cocok =
                nama.includes(keyword) ||
                nip.includes(keyword) ||
                mapel.includes(keyword);

            if (cocok) {
                row.style.display = '';
                jumlahDitemukan++;
            } else {
                row.style.display = 'none';
            }
        });

        resetButton.style.display = keyword !== '' ? 'block' : 'none';

        noSearchResult.style.display =
            jumlahDitemukan === 0 && keyword !== ''
                ? 'block'
                : 'none';
    }

    searchInput.addEventListener('input', cariGuru);

    resetButton.addEventListener('click', function () {
        searchInput.value = '';
        cariGuru();
        searchInput.focus();
    });
});
</script>

@endsection
