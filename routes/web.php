<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

use App\Http\Controllers\ComentariosController;

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
//Rutas autentificacion de GOOGLE
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


//Referenciamos todas las RUTAS de COMENTARIOS. Nos ahorramos de definir una por una
Route::resource('comentarios',ComentariosController::class);

//Insertamos los elementos en la tabla COMENTARIOS
Route::post('/dashboard',[ComentariosController::class,'store'])->name('comentarios');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

