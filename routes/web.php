<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

use App\Models\Guru;
use App\Models\Siswa;


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $jumlahGuru = Guru::count();
    $jumlahSiswa = Siswa::count();

    $guruTerbaru = Guru::orderBy('id_guru', 'desc')
        ->take(5)
        ->get();

    $siswaTerbaru = Siswa::orderBy('id_siswa', 'desc')
        ->take(5)
        ->get();

    return view('admin.dashboard.index', compact(
        'jumlahGuru',
        'jumlahSiswa',
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