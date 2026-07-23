<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\UsersController;

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




// 1. Mostrar formulario para ingresar el correo
Route::get('/solicitar-correo', [UsersController::class, 'showLinkRequestForm'])
    ->middleware('guest')
    ->name('usuarios.solicitarcorreo');

// 2. Procesar el envío del correo con el token
Route::post('/forgot-password', [UsersController::class, 'sendResetLinkEmail'])
    ->middleware('guest')
    ->name('password.email');

// 3. Mostrar formulario para ingresar la nueva contraseña (desde el enlace del correo)
Route::get('/reset-password/{token}', [UsersController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');

// 4. Guardar la nueva contraseña
Route::post('/reset-password', [UsersController::class, 'reset'])
    ->middleware('guest')
    ->name('password.update');