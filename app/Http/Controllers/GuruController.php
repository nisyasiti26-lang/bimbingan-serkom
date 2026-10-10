<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('admin.guru.index', compact('gurus'));
    }
    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_guru' => 'required|string|max:40',
                'nip' => 'nullable|string|max:15',
                'mapel' => 'nullable|string|max:40',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'nama_guru.required' => 'Nama guru wajib diisi.',
                'nama_guru.string' => 'Nama guru harus berupa teks.',
                'nama_guru.max' => 'Nama guru maksimal 40 karakter.',

                'nip.string' => 'NIP harus berupa teks.',
                'nip.max' => 'NIP maksimal 15 karakter.',

                'mapel.string' => 'Mata pelajaran harus berupa teks.',
                'mapel.max' => 'Mata pelajaran maksimal 40 karakter.',

                'foto.image' => 'File foto harus berupa gambar.',
                'foto.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
                'foto.max' => 'Ukuran foto maksimal 2 MB.',
            ]
        );

        $guru = new Guru();

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
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($nama_guru)
    {
        $guru = Guru::where('nama_guru', $nama_guru)->firstOrFail();

        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id_guru)
    {
        $request->validate(
            [
                'nama_guru' => 'required|string|max:40',
                'nip' => 'nullable|string|max:15',
                'mapel' => 'nullable|string|max:40',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'nama_guru.required' => 'Nama guru wajib diisi.',
                'nama_guru.string' => 'Nama guru harus berupa teks.',
                'nama_guru.max' => 'Nama guru maksimal 40 karakter.',

                'nip.string' => 'NIP harus berupa teks.',
                'nip.max' => 'NIP maksimal 15 karakter.',

                'mapel.string' => 'Mata pelajaran harus berupa teks.',
                'mapel.max' => 'Mata pelajaran maksimal 40 karakter.',

                'foto.image' => 'File foto harus berupa gambar.',
                'foto.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
                'foto.max' => 'Ukuran foto maksimal 2 MB.',
            ]
        );

        $guru = Guru::findOrFail($id_guru);
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

    public function delete($id_guru)
    {
        $guru = Guru::findOrFail($id_guru);
        $guru->delete();
        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data guru berhasil dihapus.');
    }

    public function show($encryptedId)
    {
        try {
            $id_guru = Crypt::decrypt($encryptedId);
        } catch (DecryptException $e) {
            abort(404);
        }

        $guru = Guru::findOrFail($id_guru);

        return view('public.guru.show', compact('guru'));
    }
}