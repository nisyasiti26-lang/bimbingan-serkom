<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
// Kalau model berita/ekskul/galeri sudah ada, bisa ditambahkan nanti

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // JUMLAH DATA
        // =========================

        $jumlahGuru = Guru::count();

        $jumlahSiswa = Siswa::count();

        // Sementara 0 jika CRUD berita belum dibuat
        $jumlahBerita = 0;

        // Sementara 0 jika CRUD ekskul belum dibuat
        $jumlahEkskul = 0;

        // Sementara 0 jika CRUD galeri belum dibuat
        $jumlahGaleri = 0;


        // =========================
        // DATA GURU TERBARU
        // =========================

        $guruTerbaru = Guru::orderBy('id_guru', 'desc')
            ->take(5)
            ->get();


        // =========================
        // DATA SISWA TERBARU
        // =========================

        $siswaTerbaru = Siswa::orderBy('id_siswa', 'desc')
            ->take(5)
            ->get();


        // =========================
        // KIRIM KE DASHBOARD
        // =========================

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