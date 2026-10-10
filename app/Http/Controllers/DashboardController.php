<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();

        $jumlahBerita = 0;
        $jumlahEkskul = 0;
        $jumlahGaleri = 0;

        $guruTerbaru = Guru::orderBy('id_guru', 'desc')
            ->take(5)
            ->get();

        $siswaTerbaru = Siswa::orderBy('id_siswa', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahBerita',
            'jumlahEkskul',
            'jumlahGaleri',
            'guruTerbaru',
            'siswaTerbaru'
        ));
    }
}