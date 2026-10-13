<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('nama_siswa', 'asc')->get();

        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|max:10|unique:siswas,nisn',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk' => 'required|integer|min:2000|max:2100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $siswa = new Siswa();

        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tahun_masuk = $request->tahun_masuk;

        // SIMPAN FOTO
        if ($request->hasFile('foto')) {
            $siswa->foto = $request->file('foto')->store('siswa', 'public');
        }

        $siswa->save();

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit($nisn)
    {
        $siswa = Siswa::where('nisn', $nisn)->firstOrFail();

        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);

        $request->validate([
            'nisn' => 'required|max:10|unique:siswas,nisn,' . $siswa->id . ',id',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk' => 'required|integer|min:2000|max:2100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tahun_masuk = $request->tahun_masuk;

        // GANTI FOTO
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }

            // simpan foto baru
            $siswa->foto = $request->file('foto')->store('siswa', 'public');
        }

        $siswa->save();

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);

        // hapus foto siswa
        if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
            Storage::disk('public')->delete($siswa->foto);
        }

        $siswa->delete();

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }

    public function publicShow($id_siswa)
{
    $siswa = Siswa::where('id', $id_siswa)->firstOrFail();

    $profil = \App\Models\ProfilSekolah::first();

    return view('public.siswa.show', compact('siswa', 'profil'));
}
}