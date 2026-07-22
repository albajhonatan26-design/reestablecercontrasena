<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentosController;

Route::get('/', function () {
    return view('index');
});


Route::get('rutadehistoriasena', function () {
    return view('nosotros');
});


// DEPARTAMENTOS

Route::get('/listardepartamentos', [DepartamentosController::class, 'index'])
    ->name('departamentos.index');


    Route::get('/frmdepartamentos', [DepartamentosController::class, 'create'])
    ->name('departamentos.create');


    Route::post('/creardepartamentos', [DepartamentosController::class, 'store'])
    ->name('departamentos.store');

    Route::get('/cargardepartamentos/{id}', [DepartamentosController::class, 'edit'])
    ->name('departamentos.edit');

    Route::put('/editardepartamentos/{id}', [DepartamentosController::class, 'update'])
    ->name('departamentos.update'); 

    Route::delete('/eliminardepartamentos/{id}', [DepartamentosController::class, 'destroy'])
    ->name('departamentos.destroy');