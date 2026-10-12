<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | HALAMAN PUBLIK EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function publicIndex()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        $profil = \App\Models\ProfilSekolah::first();


        return view('public.ekstrakurikuler.index', compact(
            'ekstrakurikuler',
            'profil'
        ));

    }

    /*
    |--------------------------------------------------------------------------
    | DAFTAR EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();

        return view(
            'admin.ekstrakurikuler.index',
            compact('ekstrakurikuler')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:100',
            'pembina' => 'required|string|max:100',
            'jadwal_latihan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $ekstrakurikuler = new Ekstrakurikuler();

        $ekstrakurikuler->nama_ekskul = $request->nama_ekskul;
        $ekstrakurikuler->slug = $this->generateUniqueSlug(
            $request->nama_ekskul
        );
        $ekstrakurikuler->pembina = $request->pembina;
        $ekstrakurikuler->jadwal_latihan = $request->jadwal_latihan;
        $ekstrakurikuler->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $ekstrakurikuler->gambar = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->save();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with(
                'success',
                'Data ekstrakurikuler berhasil ditambahkan.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id_ekskul)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id_ekskul);

        return view(
            'admin.ekstrakurikuler.edit',
            compact('ekstrakurikuler')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PERBARUI EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id_ekskul)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:100',
            'pembina' => 'required|string|max:100',
            'jadwal_latihan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id_ekskul);

        $ekstrakurikuler->nama_ekskul = $request->nama_ekskul;
        $ekstrakurikuler->slug = $this->generateUniqueSlug(
            $request->nama_ekskul,
            $ekstrakurikuler->getKey()
        );
        $ekstrakurikuler->pembina = $request->pembina;
        $ekstrakurikuler->jadwal_latihan = $request->jadwal_latihan;
        $ekstrakurikuler->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            if (
                $ekstrakurikuler->gambar &&
                Storage::disk('public')->exists($ekstrakurikuler->gambar)
            ) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }

            $ekstrakurikuler->gambar = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->save();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with(
                'success',
                'Data ekstrakurikuler berhasil diperbarui.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function destroy($id_ekskul)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id_ekskul);

        if (
            $ekstrakurikuler->gambar &&
            Storage::disk('public')->exists($ekstrakurikuler->gambar)
        ) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar);
        }

        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with(
                'success',
                'Data ekstrakurikuler berhasil dihapus.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | MEMBUAT SLUG UNIK
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug($nama, $exceptId = null)
    {
        $slugDasar = Str::slug($nama);

        if (empty($slugDasar)) {
            $slugDasar = 'ekstrakurikuler';
        }

        $slug = $slugDasar;
        $nomor = 2;

        while (
            Ekstrakurikuler::where('slug', $slug)
                ->when($exceptId !== null, function ($query) use ($exceptId) {
                    $query->where(
                        (new Ekstrakurikuler())->getKeyName(),
                        '!=',
                        $exceptId
                    );
                })
                ->exists()
        ) {
            $slug = $slugDasar . '-' . $nomor;
            $nomor++;
        }

        return $slug;
    }

    public function publicShow($id)
{
    $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
    $profil = \App\Models\ProfilSekolah::first();

    return view(
        'public.ekstrakurikuler.show',
        compact('ekstrakurikuler', 'profil')
    );
}
}
