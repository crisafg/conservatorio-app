<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\EscolaridadController;
use App\Http\Controllers\InstrumentoController;

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




// Route::get('/conservatorio/index', 'conservatorio@index')->name('conservatorio.index');
Route::resource('conservatorio', AlumnoController::class);
Route::resource('carnet', EscolaridadController::class);
// Route::resource('instrumento', InstrumentoController::class);
Route::resource('alumnos', AlumnosController::class);

Route::get('conservatorio/edit/{id}', [App\Http\Controllers\AlumnoController::class, 'edit'])->name('conservatorio.edit');
Route::patch('conservatorio/edit/{id}', [App\Http\Controllers\AlumnoController::class, 'update'])->name('conservatorio.update');
Route::get('conservatorio/{id}', [App\Http\Controllers\AlumnoController::class, 'show'])->name('conservatorio.show');

// Route::get('carnet/edit/{id}', [App\Http\Controllers\EscolaridadController::class, 'edit'])->name('carnet.edit');
// Route::patch('carnet/edit/{id}', [App\Http\Controllers\EscolaridadController::class, 'update'])->name('carnet.update');

// Route::get('alumnos/vistaGeneral', [App\Http\Controllers\AlumnosController::class, 'show'])->name('alumnos.show');
// Route::get('instrumento/index', 'instrumento@show')->name('instrumento.show');
