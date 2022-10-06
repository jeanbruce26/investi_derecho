<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('administrador');
})->middleware('auth');

Auth::routes();

Route::get('administrador', [App\Http\Controllers\AdministradorController::class, 'index'])->middleware('auth')->name('administrador');


//Administrador
Route::get('administrador/persona', [PersonaController::class, 'index'])->middleware('auth')->name('persona.index');
Route::get('administrador/persona/create', [PersonaController::class, 'create'])->middleware('auth')->name('persona.create');
Route::get('administrador/persona/{id}/edit', [PersonaController::class, 'edit'])->middleware('auth')->name('persona.edit');

Route::get('administrador/proyectos', [ProyectoController::class, 'index'])->middleware('auth')->name('proyecto.index');
Route::get('administrador/proyectos/create', [ProyectoController::class, 'create'])->middleware('auth')->name('proyecto.create');
Route::get('administrador/proyectos/{id}/edit', [ProyectoController::class, 'edit'])->middleware('auth')->name('proyecto.edit');
Route::get('administrador/participantes/{id}/edit', [ProyectoController::class, 'participant'])->middleware('auth')->name('participante.edit');
