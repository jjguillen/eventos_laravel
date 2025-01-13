<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "Usuarios - admin";
    })->name('users');

    Route::get('/users/{id}', function ($id) {
        return "Id: ".$id. " - admin";
    })->whereNumber('id')->name("miruta");

    //Todas las rutas del recurso eventos
    Route::resource('eventos', EventoController::class);
    Route::get('/eventos/delete/{evento}', [EventoController::class, 'delete'])->name('eventos.delete');
});

Route::prefix('web')->group(function () {
    Route::get('/users', function () {
        return "Usuarios - web";
    })->name('users');

    Route::get('/users/{id}', function ($id) {
        return "Id: ".$id. " - web";
    })->whereNumber('id')->name("miruta");

    //Solo añadimos las rutas de eventos de ver todos y ver uno solo
    Route::get('/eventos', [EventoController::class, 'index']);
    Route::get('/eventos/{evento}', [EventoController::class, 'show']);
    Route::get('/eventos/id/{id}', [EventoController::class, 'ver']);

});



