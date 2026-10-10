
@extends('index')

@section('title', 'Tambah Galeri - MTsN 10 Tasikmalaya')

@section('content')

<style>
    .galeri-wrapper {
        width: 100%;
        padding: 10px 5px 30px;
    }

    .galeri-card {
        background: #ffffff;
        border: 1px solid #e2eaf3;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(23, 54, 93, 0.07);
        overflow: hidden;
    }

    .galeri-card-body {
        padding: 25px;
    }

    .form-label {
        color: #17365d;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border: 1px solid #d7e1ec;
        border-radius: 8px;
        padding: 11px 13px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #155a98;
        box-shadow: 0 0 0 0.2rem rgba(21, 90, 152, 0.12);
    }

    .file-info {
        color: #6c757d;
        font-size: 13px;
        margin-top: 7px;
        line-height: 1.7;
    }

    .preview-container {
        margin-top: 15px;
        padding: 15px;
        border: 1px dashed #cbd8e6;
        border-radius: 10px;
        background: #f8fafc;
    }

    .preview-container img,
    .preview-container video,
    .preview-container iframe {
        display: block;
        width: 100%;
        max-width: 550px;
        max-height: 350px;
        border-radius: 8px;
        margin-top: 10px;
    }

    .preview-container img {
        object-fit: contain;
    }

    .preview-container iframe {
        aspect-ratio: 16 / 9;
        height: auto;
        border: 0;
    }

    .galeri-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e2eaf3;
    }

    .btn-simpan {
        background: #155a98;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
    }

    .btn-simpan:hover {
        background: #104777;
        color: #ffffff;
    }

    .btn-kembali {
        background: #eef2f7;
        color: #17365d;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-kembali:hover {
        background: #dfe7f0;
        color: #17365d;
    }

    @media (max-width: 576px) {
        .galeri-card-body {
            padding: 18px;
        }

        .galeri-actions {
            flex-direction: column;
        }

        .galeri-actions .btn,
        .galeri-actions a {
            text-align: center;
            width: 100%;
        }
    }
</style>

<div class="galeri-wrapper">
    <div class="galeri-card">
        <div class="galeri-card-body">

            {{-- PESAN ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Data belum berhasil disimpan.</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.galeri.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- JUDUL GALERI --}}
                    <div class="col-md-8 mb-3">
                        <label for="judul" class="form-label">
                            Judul Galeri
                        </label>

                        <input
                            type="text"
                            name="judul"
                            id="judul"
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: Pencegahan Perundungan (Bullying)"
                            maxlength="50"
                            required
                        >

                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- TANGGAL KEGIATAN --}}
                    <div class="col-md-4 mb-3">
                        <label for="tanggal" class="form-label">
                            Tanggal Kegiatan
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            id="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', date('Y-m-d')) }}"
                            required
                        >

                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- KATEGORI GALERI --}}
                    <div class="col-md-6 mb-3">
                        <label for="kategori" class="form-label">
                            Kategori Galeri
                        </label>

                        <select
                            name="kategori"
                            id="kategori"
                            class="form-select @error('kategori') is-invalid @enderror"
                            required
                        >
                            <option value="">-- Pilih Kategori --</option>

                            <option value="Foto"
                                {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                                Foto
                            </option>

                            <option value="Video"
                                {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                                Video
                            </option>
                        </select>

                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- JENIS VIDEO --}}
                    <div class="col-md-6 mb-3"
                         id="sumberVideoWrapper"
                         style="display: none;">

                        <label for="sumber_video" class="form-label">
                            Jenis Video
                        </label>

                        <select
                            name="sumber_video"
                            id="sumber_video"
                            class="form-select @error('sumber_video') is-invalid @enderror"
                        >
                            <option value="">-- Pilih Jenis Video --</option>

                            <option value="file"
                                {{ old('sumber_video', 'file') == 'file' ? 'selected' : '' }}>
                                Upload File Video
                            </option>

                            <option value="link"
                                {{ old('sumber_video') == 'link' ? 'selected' : '' }}>
                                Link YouTube
                            </option>
                        </select>

                        @error('sumber_video')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- INPUT FILE FOTO / VIDEO --}}
                    <div class="col-md-6 mb-3"
                         id="fileWrapper"
                         style="display: none;">

                        <label for="file" class="form-label" id="labelFile">
                            Pilih File
                        </label>

                        <input
                            type="file"
                            name="file"
                            id="file"
                            class="form-control @error('file') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.avi,.mkv"
                        >

                        <div class="file-info" id="fileInfo">
                            Pilih file sesuai kategori.
                            Ukuran maksimal 20 MB.
                        </div>

                        @error('file')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- INPUT LINK YOUTUBE --}}
                    <div class="col-md-6 mb-3"
                         id="linkVideoWrapper"
                         style="display: none;">

                        <label for="link_video" class="form-label">
                            Link Video YouTube
                        </label>

                        <input
                            type="url"
                            name="link_video"
                            id="link_video"
                            class="form-control @error('link_video') is-invalid @enderror"
                            value="{{ old('link_video') }}"
                            placeholder="https://www.youtube.com/watch?v=..."
                            disabled
                        >

                        <div class="file-info">
                            Tempel link video YouTube yang ingin ditampilkan.
                        </div>

                        @error('link_video')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- PREVIEW FOTO --}}
                    <div class="col-12"
                         id="previewFoto"
                         style="display: none;">

                        <div class="preview-container">
                            <strong>Preview Foto</strong>

                            <img id="gambarPreview"
                                 src=""
                                 alt="Preview foto yang dipilih">
                        </div>
                    </div>

                    {{-- PREVIEW FILE VIDEO --}}
                    <div class="col-12"
                         id="previewVideo"
                         style="display: none;">

                        <div class="preview-container">
                            <strong>Preview Video</strong>

                            <video id="videoPreview" controls>
                                Browser kamu tidak mendukung pemutaran video.
                            </video>
                        </div>
                    </div>

                    {{-- PREVIEW YOUTUBE --}}
                    <div class="col-12"
                         id="previewLinkVideo"
                         style="display: none;">

                        <div class="preview-container">
                            <strong>Preview Video YouTube</strong>

                            <iframe
                                id="youtubePreview"
                                src=""
                                title="Preview video YouTube"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>

                    {{-- KETERANGAN --}}
                    <div class="col-12 mt-3 mb-3">
                        <label for="keterangan" class="form-label">
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            id="keterangan"
                            rows="4"
                            class="form-control @error('keterangan') is-invalid @enderror"
                            placeholder="Tuliskan keterangan kegiatan atau isi galeri..."
                            required
                        >{{ old('keterangan') }}</textarea>

                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                {{-- TOMBOL --}}
                <div class="galeri-actions">
                    <a href="{{ route('admin.galeri.index') }}"
                       class="btn-kembali">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-simpan">
                        Simpan Galeri
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const kategori = document.getElementById('kategori');
    const sumberVideo = document.getElementById('sumber_video');

    const sumberWrapper = document.getElementById('sumberVideoWrapper');
    const fileWrapper = document.getElementById('fileWrapper');
    const linkWrapper = document.getElementById('linkVideoWrapper');

    const fileInput = document.getElementById('file');
    const fileInfo = document.getElementById('fileInfo');
    const labelFile = document.getElementById('labelFile');
    const linkInput = document.getElementById('link_video');

    const previewFoto = document.getElementById('previewFoto');
    const gambarPreview = document.getElementById('gambarPreview');

    const previewVideo = document.getElementById('previewVideo');
    const videoPreview = document.getElementById('videoPreview');

    const previewLinkVideo = document.getElementById('previewLinkVideo');
    const youtubePreview = document.getElementById('youtubePreview');

    let previewUrl = null;

    function bersihkanPreview() {
        previewFoto.style.display = 'none';
        previewVideo.style.display = 'none';
        previewLinkVideo.style.display = 'none';

        gambarPreview.removeAttribute('src');

        videoPreview.pause();
        videoPreview.removeAttribute('src');
        videoPreview.load();

        youtubePreview.removeAttribute('src');

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }
    }

    function youtubeEmbedUrl(url) {
        try {
            const parsed = new URL(url);
            let id = '';

            if (
                parsed.hostname === 'youtu.be' ||
                parsed.hostname.endsWith('.youtu.be')
            ) {
                id = parsed.pathname.split('/').filter(Boolean)[0] || '';
            } else if (
                parsed.hostname === 'youtube.com' ||
                parsed.hostname.endsWith('.youtube.com')
            ) {
                if (parsed.pathname === '/watch') {
                    id = parsed.searchParams.get('v') || '';
                } else {
                    const parts = parsed.pathname.split('/').filter(Boolean);

                    if (['embed', 'shorts', 'live'].includes(parts[0])) {
                        id = parts[1] || '';
                    }
                }
            }

            if (!/^[a-zA-Z0-9_-]{11}$/.test(id)) {
                return '';
            }

            return 'https://www.youtube.com/embed/' + id;
        } catch (error) {
            return '';
        }
    }

    function tampilkanPreview() {
        bersihkanPreview();

        const file = fileInput.files[0];

        if (!file || fileInput.disabled) {
            return;
        }

        previewUrl = URL.createObjectURL(file);

        if (
            kategori.value === 'Foto' &&
            file.type.startsWith('image/')
        ) {
            gambarPreview.src = previewUrl;
            previewFoto.style.display = 'block';
        } else if (
            kategori.value === 'Video' &&
            file.type.startsWith('video/')
        ) {
            videoPreview.src = previewUrl;
            previewVideo.style.display = 'block';
        }
    }

    function tampilkanPreviewLink() {
        bersihkanPreview();

        if (
            kategori.value !== 'Video' ||
            sumberVideo.value !== 'link'
        ) {
            return;
        }

        const embedUrl = youtubeEmbedUrl(linkInput.value.trim());

        if (embedUrl) {
            youtubePreview.src = embedUrl;
            previewLinkVideo.style.display = 'block';
        }
    }

    function aturForm() {
        const isFoto = kategori.value === 'Foto';
        const isVideo = kategori.value === 'Video';
        const pakaiLink = isVideo && sumberVideo.value === 'link';
        const pakaiFile = isFoto || (
            isVideo && sumberVideo.value === 'file'
        );

        // Pilihan jenis video hanya muncul saat kategori Video
        sumberWrapper.style.display = isVideo ? 'block' : 'none';

        // Tampilkan input file sesuai pilihan
        fileWrapper.style.display = pakaiFile ? 'block' : 'none';

        // Tampilkan input YouTube sesuai pilihan
        linkWrapper.style.display = pakaiLink ? 'block' : 'none';

        // Atur wajib isi input file
        fileInput.disabled = !pakaiFile;
        fileInput.required = pakaiFile;

        // Atur wajib isi link YouTube
        linkInput.disabled = !pakaiLink;
        linkInput.required = pakaiLink;

        if (isFoto) {
            labelFile.textContent = 'Pilih Foto';

            fileInput.accept = '.jpg,.jpeg,.png,.webp';

            fileInfo.innerHTML =
                'Format: JPG, JPEG, PNG, WEBP.<br>' +
                'Ukuran maksimal: 20 MB.';
        } else {
            labelFile.textContent = 'Pilih File Video';

            fileInput.accept = '.mp4,.mov,.avi,.mkv';

            fileInfo.innerHTML =
                'Format: MP4, MOV, AVI, MKV.<br>' +
                'Ukuran maksimal: 20 MB.';
        }

        bersihkanPreview();

        if (pakaiLink) {
            tampilkanPreviewLink();
        } else if (pakaiFile && fileInput.files.length) {
            tampilkanPreview();
        }
    }

    kategori.addEventListener('change', function () {
        fileInput.value = '';
        linkInput.value = '';

        // Saat kembali ke Video, pengguna memilih jenis sumbernya
        if (kategori.value === 'Video') {
            sumberVideo.value = '';
        }

        aturForm();
    });

    sumberVideo.addEventListener('change', function () {
        fileInput.value = '';
        linkInput.value = '';

        aturForm();
    });

    fileInput.addEventListener('change', tampilkanPreview);
    linkInput.addEventListener('input', tampilkanPreviewLink);

    // Pertahankan pilihan lama jika validasi Laravel gagal
    aturForm();
});
</script>

@endsection
