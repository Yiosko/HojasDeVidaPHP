<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EducacionController;
use App\Http\Controllers\ExperienciaController;

// Redirigir raíz al listado de usuarios
Route::get('/', function () {
    return redirect()->route('usuarios.index');
});

// CRUD completo de usuarios
Route::resource('usuarios', UsuarioController::class);

// Educación
Route::post('educacion', [EducacionController::class, 'store'])->name('educacion.store');
Route::delete('educacion/{id}', [EducacionController::class, 'destroy'])->name('educacion.destroy');

// Experiencia laboral
Route::post('experiencia', [ExperienciaController::class, 'store'])->name('experiencia.store');
Route::delete('experiencia/{id}', [ExperienciaController::class, 'destroy'])->name('experiencia.destroy');
