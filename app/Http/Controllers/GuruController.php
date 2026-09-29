<?php

namespace App\Http\Controllers;
use App\Models\Guru;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function index(){
        $gurus = Guru::all();

        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validat([
            'nama_guru' => 'required|max:40',
            'nip' => 'nullable|max:15',
            'mapel' => 'nullable|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

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
        ->with('succes', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id_guru)
    {
        $guru = Guru::findOrFail($id_guru);

        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id_guru)
    {
        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip' => 'nullable|max:15',
            'mapel' => 'nullable|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

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
}
