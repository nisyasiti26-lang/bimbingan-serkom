@extends('index') 
 
@section('title', 'Data Ekstrakurikuler - MTsN 10 Tasikmalaya') 
 
@section('content') 
 
<style> 
    .data-card { 
        background: #ffffff; 
        border: 1px solid #e5eaf0; 
        border-radius: 14px; 
        overflow: hidden; 
    } 
 
    .data-header { 
        padding: 20px 24px; 
        border-bottom: 1px solid #e5eaf0; 
    } 
 
    .data-title { 
        color: #000000; 
        font-size: 22px; 
        font-weight: 700; 
        margin-bottom: 4px; 
    } 
 
    .data-subtitle { 
        color: #000000; 
        font-size: 13px; 
        margin: 0; 
    } 
 
    .btn-tambah { 
        background: #198754; 
        color: #ffffff; 
        border: none; 
        border-radius: 8px; 
        padding: 10px 17px; 
        font-size: 13px; 
        font-weight: 600; 
        text-decoration: none; 
        display: inline-flex; 
        align-items: center; 
        gap: 6px; 
        transition: 0.2s; 
    } 
 
    .btn-tambah:hover { 
        background: #146c43; 
        color: #ffffff; 
    } 
 
    .table-wrapper { 
        width: 100%; 
        overflow-x: auto; 
    } 
 
    .data-table { 
        width: 100%; 
        margin: 0; 
        border-collapse: collapse; 
        table-layout: fixed; 
    } 
 
    .data-table thead th { 
        background: #eaf8f0; 
        color: #000000; 
        font-size: 13px; 
        font-weight: 700; 
        padding: 14px 12px; 
        border-bottom: 1px solid #e5eaf0; 
        vertical-align: middle; 
    } 
 
    .data-table tbody td { 
        color: #000000; 
        font-size: 13px; 
        padding: 14px 12px; 
        border-bottom: 1px solid #edf1f5; 
        vertical-align: middle; 
        word-wrap: break-word; 
        line-height: 1.5; 
    } 
 
    .data-table tbody tr:last-child td { 
        border-bottom: none; 
    } 
 
    .data-table tbody tr:hover { 
        background: #f5fbf7; 
    } 
 
    /* Lebar kolom dibuat seimbang */ 
    .col-no { 
        width: 7%; 
        text-align: center; 
    } 
 
    .col-gambar { 
        width: 12%; 
        text-align: center; 
    } 
 
    .col-nama { 
        width: 21%; 
    } 
 
    .col-pembina { 
        width: 19%; 
    } 
 
    .col-jadwal { 
        width: 18%; 
    } 
 
    .col-deskripsi { 
        width: 16%; 
    } 
 
    .col-aksi { 
        width: 7%; 
        text-align: center; 
    } 
 
    .gambar-ekskul { 
        width: 58px; 
        height: 48px; 
        object-fit: cover; 
        border-radius: 8px; 
        border: 1px solid #d8e8df; 
    } 
 
    .gambar-kosong { 
        width: 58px; 
        height: 48px; 
        background: #eaf8f0; 
        border-radius: 8px; 
        display: inline-flex; 
        align-items: center; 
        justify-content: center; 
        color: #000000; 
        border: 1px solid #d8e8df; 
    } 
 
    .nama-ekskul { 
        color: #000000; 
        font-weight: 600; 
    } 
 
    .deskripsi { 
        color: #000000; 
        line-height: 1.5; 
    } 
 
    .btn-edit { 
        width: 36px; 
        height: 36px; 
        border: none; 
        border-radius: 8px; 
        background: #eaf8f0; 
        color: #198754; 
        display: inline-flex; 
        align-items: center; 
        justify-content: center; 
        text-decoration: none; 
        transition: 0.2s; 
    } 
 
    .btn-edit:hover { 
        background: #d8f0e3; 
        color: #146c43; 
    } 
 
    .btn-hapus { 
        width: 36px; 
        height: 36px; 
        border: none; 
        border-radius: 8px; 
        background: #fff0f1; 
        color: #dc3545; 
        display: inline-flex; 
        align-items: center; 
        justify-content: center; 
        transition: 0.2s; 
    } 
 
    .btn-hapus:hover { 
        background: #ffe0e3; 
        color: #b02a37; 
    } 
 
    .aksi-wrapper { 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        gap: 6px; 
    } 
 
    .empty-data { 
        height: 190px; 
        text-align: center; 
        color: #000000; 
    } 
 
    .empty-data i { 
        font-size: 38px; 
        color: #000000; 
        margin-bottom: 8px; 
    } 
</style> 
 
 
<div class="container-fluid"> 
 
    <div class="data-card shadow-sm"> 
 
        {{-- HEADER --}} 
        <div class="data-header"> 
 
            <div class="d-flex justify-content-between align-items-center"> 
 
                <div> 
 
                    <h3 class="data-title"> 
                        Daftar Ekstrakurikuler 
                    </h3> 
 
                    <p class="data-subtitle"> 
                        Data ekstrakurikuler yang terdaftar dalam sistem 
                    </p> 
 
                </div> 
 
 
                <a 
                    href="{{ route('admin.ekstrakurikuler.create') }}" 
                    class="btn-tambah" 
                > 
 
                    <i class="ti ti-plus"></i> 
 
                    Tambah Ekstrakurikuler 
 
                </a> 
 
            </div> 
 
        </div> 
 
 
        {{-- TABLE --}} 
        <div class="table-wrapper"> 
 
            <table class="data-table"> 
 
                <colgroup> 
 
                    <col class="col-no"> 
                    <col class="col-gambar"> 
                    <col class="col-nama"> 
                    <col class="col-pembina"> 
                    <col class="col-jadwal"> 
                    <col class="col-deskripsi"> 
                    <col class="col-aksi"> 
 
                </colgroup> 
 
 
                <thead> 
 
                    <tr> 
 
                        <th class="text-center"> 
                            No 
                        </th> 
 
                        <th class="text-center"> 
                            Gambar 
                        </th> 
 
                        <th> 
                            Nama Ekstrakurikuler 
                        </th> 
 
                        <th> 
                            Pembina 
                        </th> 
 
                        <th> 
                            Jadwal Latihan 
                        </th> 
 
                        <th> 
                            Deskripsi 
                        </th> 
 
                        <th class="text-center"> 
                            Aksi 
                        </th> 
 
                    </tr> 
 
                </thead> 
 
 
                <tbody> 
 
                    @forelse($ekstrakurikuler as $item) 
 
                    <tr> 
 
                        {{-- NO --}} 
                        <td class="text-center"> 
 
                            {{ $loop->iteration }} 
 
                        </td> 
 
 
                        {{-- GAMBAR --}} 
                        <td class="text-center"> 
 
                            @if($item->gambar) 
 
                                <img 
                                    src="{{ asset('storage/' . $item->gambar) }}" 
                                    alt="{{ $item->nama_ekskul }}" 
                                    class="gambar-ekskul" 
                                > 
 
                            @else 
 
                                <div class="gambar-kosong"> 
 
                                    <i class="ti ti-photo-off fs-5"></i> 
 
                                </div> 
 
                            @endif 
 
                        </td> 
 
 
                        {{-- NAMA --}} 
                        <td> 
 
                            <span class="nama-ekskul"> 
 
                                {{ $item->nama_ekskul }} 
 
                            </span> 
 
                        </td> 
 
 
                        {{-- PEMBINA --}} 
                        <td> 
 
                            {{ $item->pembina }} 
 
                        </td> 
 
 
                        {{-- JADWAL --}} 
                        <td> 
 
                            {{ $item->jadwal_latihan }} 
 
                        </td> 
 
 
                        {{-- DESKRIPSI --}} 
                        <td> 
 
                            <span class="deskripsi"> 
 
                                {{ Str::limit($item->deskripsi, 60) }} 
 
                            </span> 
 
                        </td> 
 
 
                        {{-- AKSI --}} 
                        <td> 
 
                            <div class="aksi-wrapper"> 
 
                                {{-- EDIT --}} 
                                <a 
                                    href="{{ route('admin.ekstrakurikuler.edit', $item->id) }}" 
                                    class="btn-edit" 
                                    title="Edit" 
                                > 
 
                                    <i class="ti ti-edit fs-6"></i> 
 
                                </a> 
 
 
                                {{-- HAPUS --}} 
                                <form 
                                    action="{{ route('admin.ekstrakurikuler.delete', $item->id) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Yakin ingin menghapus data ekstrakurikuler ini?');" 
                                > 
 
                                    @csrf 
 
                                    @method('DELETE') 
 
                                    <button 
                                        type="submit" 
                                        class="btn-hapus" 
                                        title="Hapus" 
                                    > 
 
                                        <i class="ti ti-trash fs-6"></i> 
 
                                    </button> 
 
                                </form> 
 
                            </div> 
 
                        </td> 
 
                    </tr> 
 
                    @empty 
 
                    <tr> 
 
                        <td 
                            colspan="7" 
                            class="empty-data" 
                        > 
 
                            <div class="d-flex flex-column align-items-center justify-content-center h-100"> 
 
                                <i class="ti ti-folder-off"></i> 
 
                                <span> 
                                    Belum ada data ekstrakurikuler. 
                                </span> 
 
                            </div> 
 
                        </td> 
 
                    </tr> 
 
                    @endforelse 
 
                </tbody> 
 
            </table> 
 
        </div> 
 
    </div> 
 
</div> 
 
@endsection