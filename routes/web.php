<?php

use App\Http\Controllers\areaController;
use App\Http\Controllers\MetricasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard',[MetricasController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/metricas', [MetricasController::class, 'index'])->name('metricas.index');
    Route::get('/prueba', [MetricasController::class, 'prueba'])->name('prueba');


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

    Route::get('/area', [areaController::class, 'index'])->name('area');
    /* Route::put('/area/{area}', [AreaController::class, 'update'])->name('area.update');
    Route::resource('area', AreaController::class)->except(['update']); */
    Route::resource('area', AreaController::class);


});


require __DIR__.'/auth.php';
