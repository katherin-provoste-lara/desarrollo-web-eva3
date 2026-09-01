<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;

Route::apiResource('proyectos', ProyectoController::class);
