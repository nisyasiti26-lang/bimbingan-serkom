<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

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
            'nisn' => 'required|max:10|unique:siswa,nisn',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk' => 'required|digits:4',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect('/admin/siswa')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);

        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);

        $request->validate([
            'nisn' => 'required|max:10|unique:siswa,nisn,' . $siswa->id_siswa . ',id_siswa',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk' => 'required|digits:4',
        ]);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect('/admin/siswa')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);

        $siswa->delete();

        return redirect('/admin/siswa')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}