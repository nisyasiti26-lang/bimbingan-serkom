<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


// =========================
// DASHBOARD
// =========================

Route::get('/', function () {
    return view('index');
});


// =========================
// LOGIN
// =========================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

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