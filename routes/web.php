<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    // =========================
    // JUMLAH DATA
    // =========================

    $jumlahGuru = Guru::count();

    $jumlahSiswa = Siswa::count();

    $jumlahBerita = Berita::count();

    $jumlahEkskul = Ekstrakurikuler::count();


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


    return view('admin.dashboard.index', compact(
        'jumlahGuru',
        'jumlahSiswa',
        'jumlahBerita',
        'jumlahEkskul',
        'guruTerbaru',
        'siswaTerbaru'
    ));

})->name('dashboard');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::get('/admin/user', [UserController::class, 'index']);

Route::get('/admin/user/create', [UserController::class, 'create']);

Route::post('/admin/user/store', [UserController::class, 'store']);

Route::get('/admin/user/edit/{id_user}', [UserController::class, 'edit']);

Route::put('/admin/user/update/{id_user}', [UserController::class, 'update']);

Route::delete('/admin/user/delete/{id_user}', [UserController::class, 'destroy']);


/*
|--------------------------------------------------------------------------
| PROFIL SEKOLAH
|--------------------------------------------------------------------------
*/

Route::get('/profile-sekolah', [ProfilSekolahController::class, 'index'])
    ->name('admin.profile');

Route::get('/profile-sekolah/edit', [ProfilSekolahController::class, 'edit'])
    ->name('admin.profil.edit');

Route::put('/profile-sekolah', [ProfilSekolahController::class, 'update'])
    ->name('admin.profile.update');


/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/

Route::get('/admin/guru', [GuruController::class, 'index'])
    ->name('admin.guru');

Route::get('/admin/guru/create', [GuruController::class, 'create'])
    ->name('admin.guru.create');

Route::post('/admin/guru/store', [GuruController::class, 'store'])
    ->name('admin.guru.store');

Route::get('/admin/guru/edit/{id_guru}', [GuruController::class, 'edit'])
    ->name('admin.guru.edit');

Route::put('/admin/guru/update/{id_guru}', [GuruController::class, 'update'])
    ->name('admin.guru.update');

Route::delete('/admin/guru/delete/{id_guru}', [GuruController::class, 'delete'])
    ->name('admin.guru.delete');


/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/

Route::get('/admin/siswa', [SiswaController::class, 'index'])
    ->name('admin.siswa.index');

Route::get('/admin/siswa/create', [SiswaController::class, 'create'])
    ->name('admin.siswa.create');

Route::post('/admin/siswa/store', [SiswaController::class, 'store'])
    ->name('admin.siswa.store');

Route::get('/admin/siswa/edit/{id_siswa}', [SiswaController::class, 'edit'])
    ->name('admin.siswa.edit');

Route::put('/admin/siswa/update/{id_siswa}', [SiswaController::class, 'update'])
    ->name('admin.siswa.update');

Route::delete('/admin/siswa/delete/{id_siswa}', [SiswaController::class, 'destroy'])
    ->name('admin.siswa.delete');


/*
|--------------------------------------------------------------------------
| EKSTRAKURIKULER
|--------------------------------------------------------------------------
*/

Route::get('/admin/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])
    ->name('admin.ekstrakurikuler.index');

Route::get('/admin/ekstrakurikuler/create', [EkstrakurikulerController::class, 'create'])
    ->name('admin.ekstrakurikuler.create');

Route::post('/admin/ekstrakurikuler/store', [EkstrakurikulerController::class, 'store'])
    ->name('admin.ekstrakurikuler.store');

Route::get('/admin/ekstrakurikuler/edit/{id_ekskul}', [EkstrakurikulerController::class, 'edit'])
    ->name('admin.ekstrakurikuler.edit');

Route::put('/admin/ekstrakurikuler/update/{id_ekskul}', [EkstrakurikulerController::class, 'update'])
    ->name('admin.ekstrakurikuler.update');

Route::delete('/admin/ekstrakurikuler/delete/{id_ekskul}', [EkstrakurikulerController::class, 'destroy'])
    ->name('admin.ekstrakurikuler.delete');


/*
|--------------------------------------------------------------------------
| BERITA
|--------------------------------------------------------------------------
*/

Route::get('/admin/berita', [BeritaController::class, 'index'])
    ->name('admin.berita.index');

Route::get('/admin/berita/create', [BeritaController::class, 'create'])
    ->name('admin.berita.create');

Route::post('/admin/berita/store', [BeritaController::class, 'store'])
    ->name('admin.berita.store');

Route::get('/admin/berita/edit/{id_berita}', [BeritaController::class, 'edit'])
    ->name('admin.berita.edit');

Route::put('/admin/berita/update/{id_berita}', [BeritaController::class, 'update'])
    ->name('admin.berita.update');

Route::delete('/admin/berita/delete/{id_berita}', [BeritaController::class, 'destroy'])
    ->name('admin.berita.delete');


/*
|--------------------------------------------------------------------------
| GALERI
|--------------------------------------------------------------------------
*/

Route::get('/admin/galeri', [GaleriController::class, 'index'])
    ->name('admin.galeri.index');

Route::get('/admin/galeri/create', [GaleriController::class, 'create'])
    ->name('admin.galeri.create');

Route::post('/admin/galeri/store', [GaleriController::class, 'store'])
    ->name('admin.galeri.store');

Route::get('/admin/galeri/edit/{id_galeri}', [GaleriController::class, 'edit'])
    ->name('admin.galeri.edit');

Route::put('/admin/galeri/update/{id_galeri}', [GaleriController::class, 'update'])
    ->name('admin.galeri.update');

Route::delete('/admin/galeri/delete/{id_galeri}', [GaleriController::class, 'destroy'])
    ->name('admin.galeri.delete');