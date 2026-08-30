<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('proyectos.index')
        : redirect()->route('login');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.authenticate');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');
});

Route::middleware('auth')->group(function () {

    Route::get('/proyectos/{proyecto}/eliminar', [ProyectoController::class, 'confirmarEliminar'])
        ->name('proyectos.confirmarEliminar');

    # Resource route permite crear todas las rutas necesarias para un CRUD de manera automática.
    Route::resource('proyectos', ProyectoController::class);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
