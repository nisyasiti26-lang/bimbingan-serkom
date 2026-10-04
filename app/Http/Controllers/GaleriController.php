<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('id_galeri', 'desc')->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'required|string',
            'file' => 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi,mkv|max:20480',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'judul.max' => 'Judul galeri maksimal 50 karakter.',

            'keterangan.required' => 'Keterangan galeri wajib diisi.',

            'file.required' => 'File galeri wajib dipilih.',
            'file.file' => 'File yang dipilih tidak valid.',
            'file.mimes' => 'Format file tidak sesuai dengan kategori galeri.',
            'file.max' => 'Ukuran file maksimal 20 MB.',

            'kategori.required' => 'Kategori galeri wajib dipilih.',
            'kategori.in' => 'Kategori hanya boleh Foto atau Video.',

            'tanggal.required' => 'Tanggal galeri wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];


        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')
                ->store('galeri', 'public');
        }

        Galeri::create($data);
        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function edit($id_galeri)
    {
        $galeri = Galeri::findOrFail($id_galeri);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id_galeri)
    {
        $galeri = Galeri::findOrFail($id_galeri);
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
            'file.mimes' => 'Format file tidak sesuai dengan kategori galeri.',
            'file.max' => 'Ukuran file maksimal 20 MB.',

            'kategori.required' => 'Kategori galeri wajib dipilih.',
            'kategori.in' => 'Kategori hanya boleh Foto atau Video.',

            'tanggal.required' => 'Tanggal galeri wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('file')) {
            // Hapus file lama
            if (
                $galeri->file &&
                Storage::disk('public')->exists($galeri->file)
            ) {
                Storage::disk('public')->delete($galeri->file);
            }
            // Simpan file baru
            $data['file'] = $request->file('file')
                ->store('galeri', 'public');
        }
        $galeri->update($data);
        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }
    /**
     * Menghapus data galeri
     */
    public function destroy($id_galeri)
    {
        $galeri = Galeri::findOrFail($id_galeri);
    
        if (
            $galeri->file &&
            Storage::disk('public')->exists($galeri->file)
        ) {
            Storage::disk('public')->delete($galeri->file);
        }
        $galeri->delete();
        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}