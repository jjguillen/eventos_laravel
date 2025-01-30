<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/eventos/inscritos/{evento}', [EventoController::class, 'inscritos'])->name('eventos.inscritos');

    //Rutas para ver usuarios
    Route::get('/users', [UserController::class, 'index'])->name('usuarios.index');

    //Ruta pruebas Eloquent
    Route::get("/users/consulta", [UserController::class, 'consulta'])->name('usuarios.consulta');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
