<?php

use App\Http\Controllers\areaController;
use App\Http\Controllers\MetricasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cursoController;
use App\Http\Controllers\expositorController;
use App\Http\Controllers\InscripcionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [MetricasController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/prueba', [MetricasController::class, 'prueba'])->name('prueba');
  // Route::resource('usuarios', UsuarioController::class);

  // Listar usuarios
  Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
  // Editar usuario
  Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
  Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
  // Crear usuario
  Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
  Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
  // Ver detalles de un usuario
  Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
  // Eliminar usuario
  Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

  Route::get('/inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
  Route::resource('inscripciones', InscripcionController::class);
  Route::get('/inscripciones/create', [InscripcionController::class, 'create']);
   /*  // Listar inscripcion
    Route::get('/inscripciones', [UsuarioController::class, 'index'])->name('usuarios.index');
    // Editar usuario
    Route::get('/inscripciones/{id}/edit', [InscripcionController::class, 'edit'])->name('inscripciones.edit');
    Route::put('/inscripciones/{id}', [InscripcionController::class, 'update'])->name('inscripciones.update');
    // Crear usuario
    Route::get('/inscripciones/create', [InscripcionController::class, 'create'])->name('inscripciones.create');
    Route::post('/inscripciones', [InscripcionController::class, 'store'])->name('inscripciones.store');
    // Ver detalles de un usuario
    Route::get('/inscripciones/{id}', [InscripcionController::class, 'show'])->name('inscripciones.show');
    // Eliminar usuario
    Route::delete('/inscripciones/{id}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');
 */

  Route::get('/area', [areaController::class, 'index'])->name('area');
  Route::resource('area', AreaController::class);
  Route::resource('curso', cursoController::class);
  Route::get('/curso', [cursoController::class, 'index'])->name('curso');
  Route::resource('expositor', expositorController::class);
  Route::get('/expositor', [expositorController::class, 'index'])->name('expositor');




});
require __DIR__ . '/auth.php';
