<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\EstadoLoteController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ClimaController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\LoteInsumoController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\VentaController;

// Ruta principal -> Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// CRUDs
Route::resource('roles', RolController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('lotes', LoteController::class);
Route::resource('estadolotes', EstadoLoteController::class);
Route::resource('actividades', ActividadController::class);
Route::resource('climas', ClimaController::class);
Route::resource('insumos', InsumoController::class);
Route::resource('loteinsumos', LoteInsumoController::class);
Route::resource('producciones', ProduccionController::class);
Route::resource('ventas', VentaController::class);