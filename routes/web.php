<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\GuruController;


Route::get('/', function () {
    return view('admin.dashboard.index');
})->name('dashboard');



Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


Route::get('/admin/user', [UserController::class, 'index']);

Route::get('/admin/user/create', [UserController::class, 'create']);

Route::post('/admin/user/store', [UserController::class, 'store']);

Route::get('/admin/user/edit/{id_user}', [UserController::class, 'edit']);

Route::put('/admin/user/update/{id_user}', [UserController::class, 'update']);

Route::delete('/admin/user/delete/{id_user}', [UserController::class, 'destroy']);


Route::get('/profile-sekolah', [ProfilSekolahController::class, 'index'])->name('admin.profile');

Route::get('/profile-sekolah/edit', [ProfilSekolahController::class, 'edit'])->name('admin.profil.edit');

Route::put('/profile-sekolah', [ProfilSekolahController::class, 'update'])->name('admin.profile.update');


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