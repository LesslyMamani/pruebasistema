<?php

use App\Http\Controllers\areaController;
use App\Http\Controllers\MetricasController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/area', [areaController::class, 'index'])->name('area');
    /* Route::put('/area/{area}', [AreaController::class, 'update'])->name('area.update');
    Route::resource('area', AreaController::class)->except(['update']); */
    Route::resource('area', AreaController::class);


});


require __DIR__.'/auth.php';
