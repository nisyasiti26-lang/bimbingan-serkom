<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('id', 'desc')->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        $users = User::orderBy('username', 'asc')->get();

        return view('admin.berita.create', compact('users'));
    }

    /*
    |--------------------------------------------------------------------------
    | TAMBAH BERITA
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'id_user' => 'required|exists:user,id_user',
            'status' => 'required|in:draft,publikasi',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'judul.max' => 'Judul berita maksimal 50 karakter.',
            'isi.required' => 'Isi berita wajib diisi.',
            'tanggal.required' => 'Tanggal berita wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'id_user.required' => 'User wajib dipilih.',
            'id_user.exists' => 'User tidak ditemukan.',
            'status.required' => 'Status berita wajib dipilih.',
            'status.in' => 'Status berita tidak valid.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => $this->generateUniqueSlug($request->judul),
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'id_user' => $request->id_user,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT BERITA
    |--------------------------------------------------------------------------
    */

  public function edit($id)
{
    $berita = Berita::findOrFail($id);
    $users = User::all();

    return view('admin.berita.edit', compact('berita', 'users'));
}

    /*
    |--------------------------------------------------------------------------
    | UPDATE BERITA
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $encryptedId)
    {
        $id_berita = $this->decryptId($encryptedId);

        $berita = Berita::findOrFail($id_berita);

        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'id_user' => 'required|exists:user,id_user',
            'status' => 'required|in:draft,publikasi',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'judul.max' => 'Judul berita maksimal 50 karakter.',
            'isi.required' => 'Isi berita wajib diisi.',
            'tanggal.required' => 'Tanggal berita wajib diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'id_user.required' => 'User wajib dipilih.',
            'id_user.exists' => 'User tidak ditemukan.',
            'status.required' => 'Status berita wajib dipilih.',
            'status.in' => 'Status berita tidak valid.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => $this->generateUniqueSlug(
                $request->judul,
                $berita->id
            ),
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'id_user' => $request->id_user,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            if (
                $berita->gambar &&
                Storage::disk('public')->exists($berita->gambar)
            ) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS BERITA
    |--------------------------------------------------------------------------
    */

    public function destroy($encryptedId)
    {
        $id_berita = $this->decryptId($encryptedId);

        $berita = Berita::findOrFail($id_berita);

        if (
            $berita->gambar &&
            Storage::disk('public')->exists($berita->gambar)
        ) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL BERITA ADMIN
    |--------------------------------------------------------------------------
    */

    public function show($encryptedId)
    {
        $id_berita = $this->decryptId($encryptedId);

        $berita = Berita::with('user')->findOrFail($id_berita);

        return view('admin.berita.show', compact('berita'));
    }

    /*
    |--------------------------------------------------------------------------
    | GENERATE SLUG UNIK
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug($judul, $exceptId = null)
    {
        $slugDasar = Str::slug($judul);

        // Antisipasi judul yang tidak menghasilkan slug.
        if (empty($slugDasar)) {
            $slugDasar = 'berita';
        }

        $slug = $slugDasar;
        $nomor = 2;

        while (
            Berita::where('slug', $slug)
                ->when($exceptId !== null, function ($query) use ($exceptId) {
                    $query->where('id', '!=', $exceptId);
                })
                ->exists()
        ) {
            $slug = $slugDasar . '-' . $nomor;
            $nomor++;
        }

        return $slug;
    }

    /*
    |--------------------------------------------------------------------------
    | DEKRIPSI ID BERITA ADMIN
    |--------------------------------------------------------------------------
    */

    private function decryptId($encryptedId)
    {
        try {
            return Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            abort(404);
        }
    }
}
