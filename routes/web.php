<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

// Redirección inicial
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas públicas
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rutas protegidas - Solo usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('roles', RolController::class);
    
    // Rutas específicas de usuarios (ANTES del resource)
    Route::patch('usuarios/{id}/desactivar', function($id) {
    $usuario = \App\Models\Usuario::findOrFail($id);
    $usuario->activo = false;
    $usuario->save();
    return redirect()->route('usuarios.index')->with('success', 'Usuario desactivado correctamente');
})->name('usuarios.desactivar');

Route::patch('usuarios/{id}/activar', function($id) {
    $usuario = \App\Models\Usuario::findOrFail($id);
    $usuario->activo = true;
    $usuario->save();
    
    if (request()->ajax()) {
        return response()->json(['success' => true, 'message' => 'Usuario activado correctamente']);
    }
    
    return redirect()->route('usuarios.index')->with('success', 'Usuario activado correctamente');
})->name('usuarios.activar');
    
    // Resource de usuarios
    Route::resource('usuarios', UsuarioController::class);
    
    Route::resource('lotes', LoteController::class);
    Route::resource('estadolotes', EstadoLoteController::class);
    Route::resource('actividades', ActividadController::class);
    Route::resource('climas', ClimaController::class);
    Route::resource('insumos', InsumoController::class);
    Route::resource('loteinsumos', LoteInsumoController::class);
    Route::resource('producciones', ProduccionController::class);
    Route::resource('ventas', VentaController::class);
});