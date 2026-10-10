<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilSekolah;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        return view(
            'admin.profil.index',
            compact('profil')
        );
    }
    public function edit()
    {
        $profil = ProfilSekolah::first();

        return view(
            'admin.profil.edit',
            compact('profil')
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'kepala_sekolah' => 'nullable|string|max:255',
            'npsn' => 'nullable|string|max:255',
            'tahun_berdiri' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'visi_misi' => 'nullable|string',
            'deskripsi' => 'nullable|string',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Ambil Data Profil
        |--------------------------------------------------------------------------
        */
        $profil = ProfilSekolah::first();

        if (!$profil) {

            $profil = new ProfilSekolah();

        }

        $profil->nama_sekolah = $request->nama_sekolah;
        $profil->kepala_sekolah = $request->kepala_sekolah;
        $profil->npsn = $request->npsn;
        $profil->tahun_berdiri = $request->tahun_berdiri;
        $profil->kontak = $request->kontak;
        $profil->alamat = $request->alamat;
        $profil->visi_misi = $request->visi_misi;
        $profil->deskripsi = $request->deskripsi;

        if ($request->hasFile('logo')) {

            $logo = $request->file('logo');

            $namaLogo =
                time() .
                '_logo.' .
                $logo->getClientOriginalExtension();

            $logo->storeAs(
                'profil',
                $namaLogo,
                'public'
            );

            $profil->logo =
                'profil/' . $namaLogo;
        }

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');

            $namaFoto =
                time() .
                '_foto.' .
                $foto->getClientOriginalExtension();

            $foto->storeAs(
                'profil',
                $namaFoto,
                'public'
            );

            $profil->foto =
                'profil/' . $namaFoto;
        }
        $profil->save();
        return redirect()
            ->route('profile.sekolah')
            ->with(
                'success',
                'Profil sekolah berhasil disimpan.'
            );
    }
}