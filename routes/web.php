<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilSekolahController;


// =========================
// DASHBOARD
// =========================

Route::get('/', function () {
    return view('admin.dashboard.index');
})->name('dashboard');


// ===============================
// LOGIN
// ===============================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// =========================
// USER
// =========================

Route::get('/admin/user', [UserController::class, 'index']);

Route::get('/admin/user/create', [UserController::class, 'create']);

Route::post('/admin/user/store', [UserController::class, 'store']);

Route::get('/admin/user/edit/{id_user}', [UserController::class, 'edit']);

Route::put('/admin/user/update/{id_user}', [UserController::class, 'update']);

Route::delete('/admin/user/delete/{id_user}', [UserController::class, 'destroy']);


// ===============================
// PROFIL SEKOLAH
// ===============================

// Menampilkan profil
Route::get('/profile-sekolah', [ProfilSekolahController::class, 'index'])
    ->name('admin.profile');

// Menampilkan halaman edit
Route::get('/profile-sekolah/edit', [ProfilSekolahController::class, 'edit'])
    ->name('admin.profil.edit');

// Menyimpan perubahan
Route::put('/profile-sekolah', [ProfilSekolahController::class, 'update'])
    ->name('admin.profile.update');