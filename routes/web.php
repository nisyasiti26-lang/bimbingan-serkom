<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Ekstrakurikuler;
use App\Models\ProfilSekolah;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| PUBLIC GURU
|--------------------------------------------------------------------------
*/

Route::get('/guru', function () {
    $guru = Guru::orderBy('id_guru', 'desc')->get();
    $profil = ProfilSekolah::first();

    return view('public.guru.guru', compact('guru', 'profil'));
})->name('guru.public');

Route::get('/guru/{encryptedId}', [GuruController::class, 'show'])
    ->name('guru.show');

/*
|--------------------------------------------------------------------------
| PUBLIC BERITA
|--------------------------------------------------------------------------
*/

Route::get('/berita', function () {
    $berita = Berita::where('status', 'publikasi')
        ->orderBy('tanggal', 'desc')
        ->get();

    $profil = ProfilSekolah::first();

    return view('public.berita.index', compact('berita', 'profil'));
})->name('berita.public');

Route::get('/berita/{slug}', function ($slug) {
    $berita = Berita::where('slug', $slug)
        ->where('status', 'publikasi')
        ->firstOrFail();

    $profil = ProfilSekolah::first();

    return view('public.berita.show', compact('berita', 'profil'));
})->name('berita.show');

/*
|--------------------------------------------------------------------------
| PUBLIC GALERI
|--------------------------------------------------------------------------
*/

Route::get('/galeri', function () {
    $galeri = Galeri::orderBy('id', 'desc')->get();
    $profil = ProfilSekolah::first();

    return view('public.galeri.index', compact('galeri', 'profil'));
})->name('galeri.public');

Route::get('/galeri/{id}', function ($id) {
    $galeri = Galeri::findOrFail($id);
    $profil = ProfilSekolah::first();

    return view('public.galeri.show', compact('galeri', 'profil'));
})->name('galeri.show');

/*
|--------------------------------------------------------------------------
| PUBLIC EKSTRAKURIKULER
|--------------------------------------------------------------------------
*/

Route::get('/ekstrakurikuler', function () {
    $ekstrakurikuler = Ekstrakurikuler::all();
    $profil = ProfilSekolah::first();

    return view(
        'public.ekstrakurikuler.index',
        compact('ekstrakurikuler', 'profil')
    );
})->name('ekstrakurikuler.public');

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
| ADMIN & OPERATOR
|--------------------------------------------------------------------------
*/

Route::middleware('role:admin,operator')->group(function () {

    /*
    | DASHBOARD
    */

    Route::get('/admin/dashboard', function () {
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();
        $jumlahBerita = Berita::count();
        $jumlahEkskul = Ekstrakurikuler::count();

        $guruTerbaru = Guru::orderBy('id_guru', 'desc')
            ->take(5)
            ->get();

        $siswaTerbaru = Siswa::orderBy('id', 'desc')
            ->take(5)
            ->get();

        $profil = ProfilSekolah::first();

        return view(
            'admin.dashboard.index',
            compact(
                'jumlahGuru',
                'jumlahSiswa',
                'jumlahBerita',
                'jumlahEkskul',
                'guruTerbaru',
                'siswaTerbaru',
                'profil'
            )
        );
    })->name('dashboard');

    /*
    | PROFIL SEKOLAH
    */

    Route::get(
        '/profile-sekolah',
        [ProfilSekolahController::class, 'index']
    )->name('profile.sekolah');

    Route::get(
        '/profile-sekolah/edit',
        [ProfilSekolahController::class, 'edit']
    )->name('profile.sekolah.edit');

    Route::put(
        '/profile-sekolah/update',
        [ProfilSekolahController::class, 'update']
    )->name('profile.sekolah.update');

    /*
    | GURU ADMIN
    */

    Route::get('/admin/guru', [GuruController::class, 'index'])
        ->name('admin.guru');

    Route::get('/admin/guru/create', [GuruController::class, 'create'])
        ->name('admin.guru.create');

    Route::post('/admin/guru/store', [GuruController::class, 'store'])
        ->name('admin.guru.store');

    Route::get('/admin/guru/edit/{nama_guru}', [GuruController::class, 'edit'])
        ->name('admin.guru.edit');

    Route::put('/admin/guru/update/{id_guru}', [GuruController::class, 'update'])
        ->name('admin.guru.update');

    Route::delete('/admin/guru/delete/{id_guru}', [GuruController::class, 'delete'])
        ->name('admin.guru.delete');

    /*
    | SISWA ADMIN
    */

    Route::get('/admin/siswa', [SiswaController::class, 'index'])
        ->name('admin.siswa.index');

    Route::get('/admin/siswa/create', [SiswaController::class, 'create'])
        ->name('admin.siswa.create');

    Route::post('/admin/siswa/store', [SiswaController::class, 'store'])
        ->name('admin.siswa.store');

    Route::get('/admin/siswa/edit/{nama_siswa}', [SiswaController::class, 'edit'])
        ->name('admin.siswa.edit');

    Route::put('/admin/siswa/update/{id_siswa}', [SiswaController::class, 'update'])
        ->name('admin.siswa.update');

    Route::delete('/admin/siswa/delete/{id_siswa}', [SiswaController::class, 'destroy'])
        ->name('admin.siswa.delete');

    /*
    | BERITA ADMIN
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

    Route::get('/admin/berita/detail/{id_berita}', [BeritaController::class, 'show'])
        ->name('admin.berita.show');

    /*
    | GALERI ADMIN
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

    /*
    | EKSTRAKURIKULER ADMIN
    */

    Route::get(
        '/admin/ekstrakurikuler',
        [EkstrakurikulerController::class, 'index']
    )->name('admin.ekstrakurikuler.index');

    Route::get(
        '/admin/ekstrakurikuler/create',
        [EkstrakurikulerController::class, 'create']
    )->name('admin.ekstrakurikuler.create');

    Route::post(
        '/admin/ekstrakurikuler/store',
        [EkstrakurikulerController::class, 'store']
    )->name('admin.ekstrakurikuler.store');

    Route::get(
        '/admin/ekstrakurikuler/edit/{id_ekskul}',
        [EkstrakurikulerController::class, 'edit']
    )->name('admin.ekstrakurikuler.edit');

    Route::put(
        '/admin/ekstrakurikuler/update/{id_ekskul}',
        [EkstrakurikulerController::class, 'update']
    )->name('admin.ekstrakurikuler.update');

    Route::delete(
        '/admin/ekstrakurikuler/delete/{id_ekskul}',
        [EkstrakurikulerController::class, 'destroy']
    )->name('admin.ekstrakurikuler.delete');
});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware('role:admin')->group(function () {

    Route::get('/admin/user', [UserController::class, 'index'])
        ->name('admin.user.index');

    Route::get('/admin/user/create', [UserController::class, 'create'])
        ->name('admin.user.create');

    Route::post('/admin/user/store', [UserController::class, 'store'])
        ->name('admin.user.store');

    Route::get('/admin/user/edit/{id_user}', [UserController::class, 'edit'])
        ->name('admin.user.edit');

    Route::put('/admin/user/update/{id_user}', [UserController::class, 'update'])
        ->name('admin.user.update');

    Route::delete('/admin/user/delete/{id_user}', [UserController::class, 'destroy'])
        ->name('admin.user.delete');
});

/*
|--------------------------------------------------------------------------
| PROFIL PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/profil', function () {
    $profil = ProfilSekolah::first();

    return view('public.profil.index', compact('profil'));
})->name('profil.public');
