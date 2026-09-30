@extends('index')

@section('title', 'Data Siswa - SMKS Singaparna')

@section('content')

<style>
    .top-header {
        margin-bottom: 22px;
    }

    .top-header h3 {
        color: #17365d;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .top-header p {
        color: #7890a8;
        font-size: 14px;
        margin-bottom: 0;
    }

    .data-card {
        background: #ffffff;
        border: 1px solid #edf1f6;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(30, 60, 90, 0.05);
        overflow: hidden;
    }

    .data-card-header {
        padding: 25px 30px;
        border-bottom: 1px solid #edf1f6;
    }

    .data-card-header h4 {
        color: #17365d;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .data-card-header p {
        color: #7890a8;
        margin-bottom: 0;
        font-size: 14px;
    }

    .btn-tambah {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 18px;
        border: none;
        border-radius: 7px;
        background: #155a98;
        color: white;
        font-size: 14px;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-tambah:hover {
        background: #104b80;
        color: white;
    }

    .table th {
        color: #17365d;
        font-size: 14px;
        font-weight: 600;
        background: #f8fafc;
        padding: 15px 20px;
    }

    .table td {
        color: #526581;
        font-size: 14px;
        padding: 15px 20px;
        vertical-align: middle;
    }

    .table td strong {
        color: #17365d;
    }

    .badge-laki {
        background: #e8f1ff;
        color: #155a98;
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

    .badge-tahun {
        background: #f1f4f8;
        color: #526581;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 13px;
    }

    .btn-edit {
        background: #e8f1ff;
        color: #155a98;
        border: none;
        border-radius: 6px;
        padding: 9px 11px;
        text-decoration: none;
    }

    .btn-edit:hover {
        background: #d9e8fb;
        color: #104b80;
    }

    .btn-hapus {
        background: #fde8e8;
        color: #dc3545;
        border: none;
        border-radius: 6px;
        padding: 9px 11px;
    }

    .btn-hapus:hover {
        background: #fbd5d5;
        color: #b02a37;
    }
</style>


<div class="row">

    <div class="col-12">

        <div class="data-card">

            {{-- HEADER DAFTAR SISWA --}}
            <div class="data-card-header">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4>
                            Daftar Siswa
                        </h4>

                       

                    </div>


                    {{-- TOMBOL TAMBAH --}}
                    <a href="{{ route('admin.siswa.create') }}"
                       class="btn-tambah">

                        <i class="bi bi-plus-lg me-2"></i>
                        Tambah Siswa

                    </a>

                </div>

            </div>


            {{-- TABEL --}}
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

                            <th width="130">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($siswas as $siswa)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                <td>
                                    {{ $siswa->nisn }}
                                </td>


                                <td>

                                    <strong>
                                        {{ $siswa->nama_siswa }}
                                    </strong>

                                </td>


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


                                <td>

                                    <span class="badge-tahun">
                                        {{ $siswa->tahun_masuk }}
                                    </span>

                                </td>


                                <td>

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                                       class="btn-edit">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.siswa.delete', $siswa->id_siswa) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-hapus"
                                                onclick="return confirm('Yakin ingin menghapus data siswa ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-4">

                                    Belum ada data siswa.

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