<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MultaController;

//Rutas públicas
Route::get('/', [WebController::class, 'inicio']);
Route::get('/devoluciones', [WebController::class, 'devolucion']);
Route::get('/prestamos', [WebController::class, 'prestamos']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/libro/{id}', [LibroController::class, 'show'])->name('libros.show');
Route::get('/generos', [GeneroController::class, 'index']);

//Rutas de usuario logueado
Route::middleware('auth')->prefix('usuario')->group(function () {
    Route::get('/cuenta', [UsuarioController::class, 'cuenta']);
    Route::get('/favoritos', [UsuarioController::class, 'favoritos']);
    Route::get('/prestamos', [PrestamoController::class, 'historial']);
    Route::get('/reservas', [ReservaController::class, 'historial']);
    Route::get('/multas', [MultaController::class, 'misMultas']);
});

// Rutas de bibliotecario logueado (solo las rutas que NO están en el resource)
Route::middleware(['auth', 'role:bibliotecario'])->prefix('bibliotecario')->group(function () {
    Route::get('/', [WebController::class, 'dashboard']);
    Route::get('/empresa', [WebController::class, 'empresa']);

    // - Rutas RESTful -
    Route::resources([
        'usuarios' => UsuarioController::class,
        'prestamos' => PrestamoController::class,
        'reservas' => ReservaController::class,
        'multas' => MultaController::class,
    ]);
});

//Control de logeo
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth'); // solo usuarios logeados


//Rutas RESTful publicas (solo lectura)
Route::resource('libros', LibroController::class);
Route::resource('generos', GeneroController::class);
