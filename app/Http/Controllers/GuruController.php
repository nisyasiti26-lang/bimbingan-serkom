<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    // =========================
    // DATA GURU ADMIN
    // =========================
    public function index()
    {
        $gurus = Guru::all();

        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    // =========================
    // TAMBAH GURU
    // =========================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:15',
            'mapel' => 'nullable|string|max:255',
            'kategori' => 'required|in:guru,staf',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('guru', 'public');
        }

        Guru::create($validated);

        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data pembina berhasil ditambahkan.');
    }
    // =========================
    // EDIT GURU
    // =========================
    public function edit($nama_guru)
    {
        $guru = Guru::where('nama_guru', $nama_guru)
            ->firstOrFail();

        return view('admin.guru.edit', compact('guru'));
    }

    // =========================
    // UPDATE GURU
    // =========================

    public function update(Request $request, $id_guru)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'nullable|string|max:15',
            'mapel' => 'nullable|string|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nama_guru.max' => 'Nama guru maksimal 40 karakter.',
            'nip.max' => 'NIP maksimal 15 karakter.',
            'mapel.max' => 'Mata pelajaran maksimal 40 karakter.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $guru = Guru::findOrFail($id_guru);

        // Periksa nama sebelum diubah.
        $namaBerubah = $guru->nama_guru !== $request->nama_guru;

        if ($namaBerubah) {
            $guru->slug = $this->generateUniqueSlug(
                $request->nama_guru,
                $guru->id_guru
            );
        }

        $guru->nama_guru = $request->nama_guru;
        $guru->nip = $request->nip;
        $guru->mapel = $request->mapel;

        if ($request->hasFile('foto')) {
            $guru->foto = $request->file('foto')
                ->store('guru', 'public');
        }

        $guru->save();

        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    // =========================
    // MEMBUAT SLUG UNIK
    // =========================
    private function generateUniqueSlug($nama, $exceptId = null)
    {
        $slugDasar = Str::slug($nama);

        if (empty($slugDasar)) {
            $slugDasar = 'guru';
        }

        $slug = $slugDasar;
        $nomor = 2;

        while (
            Guru::where('slug', $slug)
                ->when($exceptId !== null, function ($query) use ($exceptId) {
                    $query->where('id_guru', '!=', $exceptId);
                })
                ->exists()
        ) {
            $slug = $slugDasar . '-' . $nomor;
            $nomor++;
        }

        return $slug;
    }

    // =========================
    // DETAIL GURU PUBLIK
    // =========================
   public function show($id_guru)
{
    $guru = Guru::where('id_guru', $id_guru)->firstOrFail();
    $profil = ProfilSekolah::first();

    return view('public.guru.show', compact('guru', 'profil'));
}
}