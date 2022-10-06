<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('administrador');
});

//Administrador
Route::get('administrador/persona', [PersonaController::class, 'index'])->name('persona.index');
Route::get('administrador/persona/create', [PersonaController::class, 'create'])->name('persona.create');
Route::get('administrador/persona/{id}/edit', [PersonaController::class, 'edit'])->name('persona.edit');

Route::get('administrador/proyectos', [ProyectoController::class, 'index'])->name('proyecto.index');
Route::get('administrador/proyectos/create', [ProyectoController::class, 'create'])->name('proyecto.create');
Route::get('administrador/proyectos/{id}/edit', [ProyectoController::class, 'edit'])->name('proyecto.edit');
Route::get('administrador/participantes/{id}/edit', [ProyectoController::class, 'participant'])->name('participante.edit');
