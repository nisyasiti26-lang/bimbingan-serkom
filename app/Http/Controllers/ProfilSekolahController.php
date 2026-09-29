<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        return view('admin.profil.index', compact('profil'));
    }

     public function edit()
    {
        $profil = ProfilSekolah::first();

        return view('admin.profil.edit', compact('profil'));
    }

   public function update(Request $request)
{
    $request->validate([
        'nama_sekolah' => 'required|string|max:255',
        'kepala_sekolah' => 'nullable|string|max:255',
        'npsn' => 'nullable|string|max:50',
        'alamat' => 'nullable|string',
        'kontak' => 'nullable|string|max:100',
        'visi_misi' => 'nullable|string',
        'tahun_berdiri' => 'nullable|string|max:10',
        'deskripsi' => 'nullable|string',
    ]);

   
    $profil = ProfilSekolah::first();

    if (!$profil) {
        $profil = new ProfilSekolah();
    }

    $profil->nama_sekolah = $request->nama_sekolah;
    $profil->kepala_sekolah = $request->kepala_sekolah;
    $profil->npsn = $request->npsn;
    $profil->alamat = $request->alamat;
    $profil->kontak = $request->kontak;
    $profil->visi_misi = $request->visi_misi;
    $profil->tahun_berdiri = $request->tahun_berdiri;
    $profil->deskripsi = $request->deskripsi;

    if ($request->hasFile('foto')) {
        $profil->foto = $request->file('foto')->store('profil', 'public');
    }

    if ($request->hasFile('logo')) {
        $profil->logo = $request->file('logo')->store('profil', 'public');
    }

    $profil->save();

    return redirect()
        ->route('admin.profile')
        ->with('success', 'Profil sekolah berhasil disimpan.');
}
}