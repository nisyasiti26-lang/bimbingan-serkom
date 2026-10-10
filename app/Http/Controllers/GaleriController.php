<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('id', 'desc')->get();

        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Memastikan kategori sesuai dengan jenis file.
     */
    private function validasiJenisFile(Request $request): void
    {
        $kategori = $request->input('kategori');
        $file = $request->file('file');

        if (!$file) {
            return;
        }

        $ekstensi = strtolower($file->getClientOriginalExtension());

        $ekstensiFoto = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensiVideo = ['mp4', 'mov', 'avi', 'mkv'];

        if (
            $kategori === 'Foto' &&
            !in_array($ekstensi, $ekstensiFoto, true)
        ) {
            throw ValidationException::withMessages([
                'file' => 'Kategori Foto hanya menerima JPG, JPEG, PNG, atau WebP.',
            ]);
        }

        if (
            $kategori === 'Video' &&
            !in_array($ekstensi, $ekstensiVideo, true)
        ) {
            throw ValidationException::withMessages([
                'file' => 'Kategori Video hanya menerima MP4, MOV, AVI, atau MKV.',
            ]);
        }
    }




public function store(\Illuminate\Http\Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:50',
        'tanggal' => 'required|date',
        'kategori' => 'required|in:Foto,Video',

        'sumber_video' => [
            'nullable',
            'required_if:kategori,Video',
            'in:file,link',
        ],

        'file' => [
            'nullable',
            'required_if:kategori,Foto',
            'required_if,sumber_video,file',
            'file',
            'max:20480',
            'mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv',
        ],

        'link_video' => [
            'nullable',
            'required_if,sumber_video,link',
            'url',
        ],

        'keterangan' => 'required|string',
    ], [
        'file.required_if' => 'Silakan pilih file foto atau video.',
        'file.max' => 'Ukuran file maksimal 20 MB.',
        'file.mimes' => 'Format file harus JPG, PNG, WEBP, MP4, MOV, AVI, atau MKV.',
        'link_video.required_if' => 'Link video wajib diisi.',
    ]);

    $pathFile = null;
    $linkVideo = null;

    // Simpan file foto atau video ke storage/app/public/galeri
    if ($request->hasFile('file')) {
        $pathFile = $request->file('file')->store('galeri', 'public');

        if (!$pathFile) {
            return back()
                ->withInput()
                ->withErrors(['file' => 'File gagal disimpan. Silakan coba lagi.']);
        }
    }

    // Jika sumber video berupa tautan
    if (
        $request->kategori === 'Video' &&
        $request->sumber_video === 'link'
    ) {
        $linkVideo = $request->link_video;
    }

    \App\Models\Galeri::create([
        'judul' => $request->judul,
        'keterangan' => $request->keterangan,
        'kategori' => $request->kategori,
        'tanggal' => $request->tanggal,
        'file' => $pathFile,
        'sumber_video' => $request->kategori === 'Video'
            ? $request->sumber_video
            : null,
        'link_video' => $linkVideo,
    ]);

    return redirect()
        ->route('admin.galeri.index')
        ->with('success', 'Data galeri berhasil ditambahkan.');
}


    public function edit($id)
    {
        try {
            $id = \Illuminate\Support\Facades\Crypt::decryptString($id);
        } catch (\Throwable $e) {
            abort(404, 'Data galeri tidak ditemukan.');
        }

        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        // Dekripsi ID galeri dari URL
        try {
            $id = Crypt::decryptString($id);
        } catch (\Throwable $e) {
            abort(404, 'Data galeri tidak ditemukan.');
        }

        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv|max:20480',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'judul.max' => 'Judul galeri maksimal 50 karakter.',
            'keterangan.required' => 'Keterangan galeri wajib diisi.',
            'file.file' => 'File yang dipilih tidak valid.',
            'file.mimes' => 'Format file tidak sesuai.',
            'file.max' => 'Ukuran file maksimal 20 MB.',
            'kategori.required' => 'Kategori galeri wajib dipilih.',
            'kategori.in' => 'Kategori hanya boleh Foto atau Video.',
            'tanggal.required' => 'Tanggal galeri wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
        ]);

        // Periksa jenis file baru jika ada upload
        $this->validasiJenisFile($request);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('file')) {
            $fileLama = $galeri->file;

            $fileBaru = $request->file('file')
                ->store('galeri', 'public');

            $data['file'] = $fileBaru;

            // Hapus file lama setelah file baru tersimpan
            if (
                $fileLama &&
                Storage::disk('public')->exists($fileLama)
            ) {
                Storage::disk('public')->delete($fileLama);
            }
        }

        $galeri->update($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Dekripsi ID yang dikirim dari Blade
        try {
            $id = Crypt::decryptString($id);
        } catch (\Throwable $e) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'ID galeri tidak valid.');
        }

        $galeri = Galeri::find($id);

        if (!$galeri) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        try {
            // Simpan lokasi file sebelum data dihapus
            $fileLama = $galeri->file;

            // Hapus data galeri dari database
            $galeri->delete();

            // Hapus file fisik jika ada
            if (
                !empty($fileLama) &&
                Storage::disk('public')->exists($fileLama)
            ) {
                Storage::disk('public')->delete($fileLama);
            }

            return redirect()
                ->route('admin.galeri.index')
                ->with('success', 'Data galeri berhasil dihapus.');

        } catch (\Throwable $e) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri gagal dihapus. Silakan periksa kembali.');
        }
    }


}
