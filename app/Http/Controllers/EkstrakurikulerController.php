<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view(
            'admin.ekstrakurikuler.index',
            compact('ekstrakurikuler')
        );
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul'     => 'required|string|max:40',
            'pembina'         => 'required|string|max:40',
            'jadwal_latihan'  => 'required|string|max:40',
            'deskripsi'       => 'nullable|string',
            'gambar'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_ekskul.required' => 'Nama ekstrakurikuler wajib diisi.',
            'pembina.required' => 'Pembina wajib diisi.',
            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $ekstrakurikuler = new Ekstrakurikuler();

        $ekstrakurikuler->nama_ekskul = $request->nama_ekskul;
        $ekstrakurikuler->pembina = $request->pembina;
        $ekstrakurikuler->jadwal_latihan = $request->jadwal_latihan;
        $ekstrakurikuler->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $ekstrakurikuler->gambar =
                $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->save();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit($id_ekskul)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id_ekskul);
        return view(
            'admin.ekstrakurikuler.edit',
            compact('ekstrakurikuler')
        );
    }

    public function update(Request $request, $id_ekskul)
    {
        $request->validate([
            'nama_ekskul'     => 'required|string|max:40',
            'pembina'         => 'required|string|max:40',
            'jadwal_latihan'  => 'required|string|max:40',
            'deskripsi'       => 'nullable|string',
            'gambar'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id_ekskul);

        $ekstrakurikuler->nama_ekskul = $request->nama_ekskul;
        $ekstrakurikuler->pembina = $request->pembina;
        $ekstrakurikuler->jadwal_latihan = $request->jadwal_latihan;
        $ekstrakurikuler->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $ekstrakurikuler->gambar =
                $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->save();
        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($id_ekskul)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id_ekskul);
        $ekstrakurikuler->delete();
        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}