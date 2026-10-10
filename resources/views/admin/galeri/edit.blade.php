@extends('index')

@section('title', 'Edit Data Galeri - MTsN 10 Tasikmalaya')

@section('content')

    <style>
        .edit-galeri-wrapper {
            width: 100%;
            margin-top: 10px;
        }

        .edit-card {
            background: #fff;
            border: 1px solid #e2eaf3;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(31, 70, 110, .07);
            overflow: hidden;
        }

        .edit-card-body {
            padding: 28px;
        }

        .form-group {
            margin-bottom: 21px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #17365d;
        }

        .form-control,
        .form-select {
            width: 100%;
            min-height: 45px;
            border: 1px solid #d9e3ee;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            color: #17365d;
            background: #fff;
            box-shadow: none;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, .10);
            outline: none;
        }

        .file-info {
            margin-top: 7px;
            font-size: 12px;
            color: #6c757d;
            line-height: 1.7;
        }

        .current-file img,
        .current-file video,
        .current-file iframe,
        .preview-container img,
        .preview-container video {
            display: block;
            width: 100%;
            max-width: 550px;
            max-height: 350px;
            margin-top: 10px;
            border-radius: 8px;
        }

        .current-file img,
        .preview-container img {
            object-fit: contain;
        }

        .current-file video,
        .preview-container video {
            background: #000;
        }

        .current-file iframe {
            aspect-ratio: 16 / 9;
            height: auto;
            border: 0;
        }

        .preview-container {
            margin-top: 12px;
            padding: 15px;
            border: 1px dashed #cbd8e6;
            border-radius: 10px;
            background: #f8fafc;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-top: 20px;
            margin-top: 8px;
            border-top: 1px solid #edf1f5;
        }

        .btn-simpan,
        .btn-batal {
            min-height: 42px;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-simpan {
            border: none;
            background: #198754;
            color: #fff;
        }

        .btn-simpan:hover {
            background: #146c43;
            color: #fff;
        }

        .btn-batal {
            border: 1px solid #d9e2ec;
            background: #fff;
            color: #17365d;
        }

        .btn-batal:hover {
            background: #f5f8fb;
            color: #17365d;
        }

        @media (max-width: 768px) {
            .edit-card-body {
                padding: 18px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-simpan,
            .btn-batal {
                width: 100%;
            }
        }
    </style>

    <div class="edit-galeri-wrapper">
        <div class="edit-card">
            <div class="edit-card-body">

                {{-- PESAN ERROR --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <strong>Terjadi kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- FORM EDIT DENGAN ID TERENKRIPSI --}}
                <form
                    action="{{ route('admin.galeri.update', \Illuminate\Support\Facades\Crypt::encryptString((string) $galeri->id)) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- JUDUL --}}
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="judul" class="form-label">
                                    Judul Galeri
                                </label>

                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                    name="judul" value="{{ old('judul', $galeri->judul) }}" maxlength="50"
                                    placeholder="Masukkan judul galeri" required>

                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- TANGGAL --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal" class="form-label">
                                    Tanggal Kegiatan
                                </label>

                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                    name="tanggal"
                                    value="{{ old('tanggal', $galeri->tanggal ? \Illuminate\Support\Carbon::parse($galeri->tanggal)->format('Y-m-d') : '') }}"
                                    required>

                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- KATEGORI --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori" class="form-label">
                                    Kategori Galeri
                                </label>

                                <select class="form-select @error('kategori') is-invalid @enderror" id="kategori"
                                    name="kategori" required>
                                    <option value="">-- Pilih Kategori --</option>

                                    <option value="Foto" {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                                        Foto
                                    </option>

                                    <option value="Video" {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
                                        Video
                                    </option>
                                </select>

                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- SUMBER VIDEO --}}
                        <div class="col-md-6" id="sumberVideoWrapper" style="display:none;">

                            <div class="form-group">
                                <label for="sumber_video" class="form-label">
                                    Jenis Video
                                </label>

                                <select class="form-select @error('sumber_video') is-invalid @enderror" id="sumber_video"
                                    name="sumber_video">
                                    <option value="">-- Pilih Jenis Video --</option>

                                    <option value="file" {{ old('sumber_video', $galeri->sumber_video ?? '') == 'file' ? 'selected' : '' }}>
                                        Upload File Video
                                    </option>

                                    <option value="link" {{ old('sumber_video', $galeri->sumber_video ?? '') == 'link' ? 'selected' : '' }}>
                                        Link YouTube
                                    </option>
                                </select>

                                @error('sumber_video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- UPLOAD FOTO / VIDEO --}}
                        <div class="col-md-6" id="fileWrapper" style="display:none;">

                            <div class="form-group">
                                <label for="file" class="form-label" id="labelFile">
                                    Ganti File
                                </label>

                                <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                                    name="file" accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.avi,.mkv">

                                <div class="file-info" id="fileInfo">
                                    Kosongkan jika tidak ingin mengganti file.
                                </div>

                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- LINK YOUTUBE --}}
                        <div class="col-md-6" id="linkVideoWrapper" style="display:none;">

                            <div class="form-group">
                                <label for="link_video" class="form-label">
                                    Link Video YouTube
                                </label>

                                <input type="url" class="form-control @error('link_video') is-invalid @enderror"
                                    id="link_video" name="link_video"
                                    value="{{ old('link_video', $galeri->link_video ?? '') }}"
                                    placeholder="https://www.youtube.com/watch?v=..." disabled>

                                <div class="file-info">
                                    Kosongkan jika ingin mempertahankan link lama.
                                </div>

                                @error('link_video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    {{-- MEDIA SAAT INI --}}
                    <div class="form-group" id="mediaSaatIni">
                        <label class="form-label">Media Saat Ini</label>

                        <div class="current-file">

                            @if ($galeri->kategori === 'Foto' && $galeri->file)
                                <img src="{{ asset('storage/' . $galeri->file) }}" alt="{{ $galeri->judul }}">

                            @elseif ($galeri->kategori === 'Video' && !empty($galeri->link_video))
                                <iframe id="youtubeLama" src="" title="Video YouTube saat ini"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>

                            @elseif ($galeri->kategori === 'Video' && $galeri->file)
                                <video controls>
                                    <source src="{{ asset('storage/' . $galeri->file) }}">
                                    Browser Anda tidak mendukung video.
                                </video>

                            @else
                                <p class="text-muted small">
                                    Media lama tidak ditemukan. Periksa file atau link di database.
                                </p>
                            @endif

                        </div>
                    </div>

                    {{-- PREVIEW FOTO BARU --}}
                    <div class="form-group" id="previewFoto" style="display:none;">
                        <div class="preview-container">
                            <strong>Preview Foto Baru</strong>
                            <img id="gambarPreview" src="" alt="Preview foto baru">
                        </div>
                    </div>

                    {{-- PREVIEW VIDEO BARU --}}
                    <div class="form-group" id="previewVideo" style="display:none;">
                        <div class="preview-container">
                            <strong>Preview Video Baru</strong>
                            <video id="videoPreview" controls>
                                Browser Anda tidak mendukung video.
                            </video>
                        </div>
                    </div>

                    {{-- KETERANGAN --}}
                    <div class="form-group">
                        <label for="keterangan" class="form-label">
                            Keterangan
                        </label>

                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                            name="keterangan" rows="4" placeholder="Masukkan keterangan galeri"
                            required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- TOMBOL --}}
                    <div class="form-actions">
                        <button type="submit" class="btn-simpan">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('admin.galeri.index') }}" class="btn-batal">
                            Batal
                        </a>
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

            const mediaSaatIni = document.getElementById('mediaSaatIni');
            const youtubeLama = document.getElementById('youtubeLama');

            const linkLama = @json($galeri->link_video ?? '');
            const sumberLama = @json($galeri->sumber_video ?? '');

            let previewUrl = null;

            function bersihkanPreview() {
                previewFoto.style.display = 'none';
                previewVideo.style.display = 'none';

                gambarPreview.removeAttribute('src');

                videoPreview.pause();
                videoPreview.removeAttribute('src');
                videoPreview.load();

                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                    previewUrl = null;
                }
            }

            function youtubeEmbedUrl(url) {
                try {
                    const parsed = new URL(url);
                    let id = '';

                    if (parsed.hostname === 'youtu.be') {
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

            function aturForm() {
                const isFoto = kategori.value === 'Foto';
                const isVideo = kategori.value === 'Video';
                const pakaiLink = isVideo && sumberVideo.value === 'link';
                const pakaiFile = isFoto ||
                    (isVideo && sumberVideo.value === 'file');

                sumberWrapper.style.display = isVideo ? 'block' : 'none';
                fileWrapper.style.display = pakaiFile ? 'block' : 'none';
                linkWrapper.style.display = pakaiLink ? 'block' : 'none';

                fileInput.disabled = !pakaiFile;
                linkInput.disabled = !pakaiLink;

                fileInput.required = false;
                linkInput.required = false;

                if (isFoto) {
                    labelFile.textContent = 'Ganti Foto';
                    fileInput.accept = '.jpg,.jpeg,.png,.webp';

                    fileInfo.innerHTML =
                        'Format: JPG, JPEG, PNG, WEBP.<br>' +
                        'Kosongkan jika tidak ingin mengganti foto.';
                } else {
                    labelFile.textContent = 'Ganti File Video';
                    fileInput.accept = '.mp4,.mov,.avi,.mkv';

                    fileInfo.innerHTML =
                        'Format: MP4, MOV, AVI, MKV.<br>' +
                        'Kosongkan jika tidak ingin mengganti video.';
                }

                bersihkanPreview();

                mediaSaatIni.style.display =
                    fileInput.files.length > 0 ? 'none' : 'block';
            }

            kategori.addEventListener('change', function () {
                fileInput.value = '';

                if (kategori.value === 'Foto') {
                    sumberVideo.value = '';
                    linkInput.value = '';
                } else if (
                    kategori.value === 'Video' &&
                    !sumberVideo.value
                ) {
                    sumberVideo.value = sumberLama || '';
                }

                aturForm();
            });

            sumberVideo.addEventListener('change', function () {
                fileInput.value = '';

                if (sumberVideo.value === 'file') {
                    linkInput.value = '';
                } else if (
                    sumberVideo.value === 'link' &&
                    !linkInput.value
                ) {
                    linkInput.value = linkLama;
                }

                aturForm();
            });

            fileInput.addEventListener('change', function () {
                bersihkanPreview();

                const file = fileInput.files[0];

                if (!file) {
                    mediaSaatIni.style.display = 'block';
                    return;
                }

                mediaSaatIni.style.display = 'none';
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
            });

            if (youtubeLama && linkLama) {
                const embedLama = youtubeEmbedUrl(linkLama);

                if (embedLama) {
                    youtubeLama.src = embedLama;
                }
            }

            aturForm();
        });
    </script>

@endsection