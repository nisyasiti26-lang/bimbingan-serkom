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
        'nama_sekolah' => 'required|max:40',
        'kepala_sekolah' => 'required|max:40',
        'npsn' => 'nullable|max:20',
        'tahun_berdiri' => 'nullable|integer',
        'kontak' => 'nullable|max:50',
        'alamat' => 'nullable',
        'visi_misi' => 'nullable',
        'deskripsi' => 'nullable',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $profil = ProfilSekolah::first();

    if (!$profil) {
        return redirect()
            ->route('admin.profile')
            ->with('error', 'Data profil sekolah tidak ditemukan.');
    }

    $data = $request->except(['logo', 'foto']);

    // Upload logo
    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $namaLogo = time() . '_logo.' . $logo->getClientOriginalExtension();

        $logo->storeAs('profil', $namaLogo, 'public');

        $data['logo'] = 'profil/' . $namaLogo;
    }

    // Upload foto
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $namaFoto = time() . '_foto.' . $foto->getClientOriginalExtension();

        $foto->storeAs('profil', $namaFoto, 'public');

        $data['foto'] = 'profil/' . $namaFoto;
    }

    $profil->update($data);

    return redirect()
        ->route('admin.profile')
        ->with('success', 'Profil sekolah berhasil diperbarui.');
}
}