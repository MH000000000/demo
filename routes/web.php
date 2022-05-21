<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TipoController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('tipo', [App\Http\Controllers\TipoController::class, 'index'])->name('home');
Route::resource('tipo', TipoController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);


Route::resource('tipo', TipoController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);

Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [TipoController::class, 'index'])->name('home');

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

