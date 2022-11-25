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

Route::controller(App\Http\Controllers\ExperienciaController::class)->group(function () {

    Route::get('/experiencias', 'index');
    Route::post('/add-expDocente', 'storeDocente');
    Route::post('/add-superior', 'storeSuperior');
    Route::post('/add-conferencista', 'storeConferencista');
    Route::post('/add-otro', 'storeOtro');
    /*Route::get('/add-docente', 'create');
    Route::get('/edit-docente/{docente_id}','edit');
    Route::put('/update-docente/.{docente_id}', 'update');
    Route::delete('/delete-docente/{docente_id}','destroy');*/
});

Route::controller(App\Http\Controllers\ProduccionController::class)->group(function () {

    Route::get('/producciones', 'index');
    Route::post('/add-investigacion', 'storeInvestigacion');
    Route::post('/add-exposicion', 'storeExposicion');
    /*Route::get('/add-docente', 'create');
    Route::get('/edit-docente/{docente_id}','edit');
    Route::put('/update-docente/.{docente_id}', 'update');
    Route::delete('/delete-docente/{docente_id}','destroy');*/
});

Route::controller(App\Http\Controllers\MeritoController::class)->group(function () {

    Route::get('/meritos', 'index');
    Route::post('/add-merito', 'store');
});


Route::controller(App\Http\Controllers\PrintController::class)->group(function () {

    Route::get('/impresion', 'print');
});
