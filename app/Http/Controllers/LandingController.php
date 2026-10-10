<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Ekstrakurikuler;

class LandingController extends Controller
{
    
public function index()
{
    return view('landing page.index', [
        'profil' => \App\Models\ProfilSekolah::first(),

        'guru' => \App\Models\Guru::orderBy('id_guru', 'desc')
            ->take(4)
            ->get(),

        'siswa' => \App\Models\Siswa::all(),

        'berita' => \App\Models\Berita::where('status', 'publikasi')
            ->orderBy('tanggal', 'desc')
            ->take(6)
            ->get(),

        // Ambil data galeri terbaru dari database
        
// Ambil data galeri terbaru untuk landing page
'galeri' => \App\Models\Galeri::orderBy('id', 'desc')
    ->take(3)
    ->get(),


        'ekstrakurikuler' => \App\Models\Ekstrakurikuler::orderBy('id', 'desc')
            ->take(3)
            ->get(),
    ]);
}

}