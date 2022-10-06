<?php

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

Route::get('/administrador', [App\Http\Controllers\AdministradorController::class, 'index'])->middleware('auth')->name('administrador');

