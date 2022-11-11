<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::controller(App\Http\Controllers\DocenteController::class)->group(function () {

    Route::get('/docentes', 'index');
    Route::get('/add-docente', 'create');
    Route::post('/add-docente', 'store');
    Route::get('/edit-docente/{docente_id}','edit');
    Route::put('/update-docente/.{docente_id}', 'update');
    Route::delete('/delete-docente/{docente_id}','destroy');
});

Route::controller(App\Http\Controllers\FormacionController::class)->group(function () {

    Route::get('/formaciones', 'index');
    Route::post('/add-titulo', 'storeTitulo');
    Route::post('/add-grado', 'storeGrado');
    Route::post('/add-diplomado', 'storeDiplomado');
    Route::post('/add-capacitacion', 'storeCapacitacion');
    /*Route::get('/add-docente', 'create');
    Route::get('/edit-docente/{docente_id}','edit');
    Route::put('/update-docente/.{docente_id}', 'update');
    Route::delete('/delete-docente/{docente_id}','destroy');*/
});



