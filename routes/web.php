<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function ()
{
    return view('inicio');
})->name('inicio');

Auth::routes();

//--------------------------------------------------------USERS--------------------------------------------------------
Route::resource('users', 'UserController');
//Route::get('users/contrasena/{user}', 'UserController@editPass')
//->name('users.editPass');
//Route::PATCH('users/cambiar-contraseña/{user}', 'UserController@updatePass')
//->name('users.updatePass');

//------------------------------------------------------ASIGNATURAS-------------------------------------------------------
Route::resource('asignaturas', 'AsignaturaController');

//------------------------------------------------------DINAMICAS-------------------------------------------------------
Route::resource('dinamicas', 'DinamicaController');

//------------------------------------------------------GRUPOS-------------------------------------------------------
Route::resource('grupos', 'GrupoController');
Route::get('entrar', 'GrupoController@entrar')->name('grupos.entrar');
Route::POST('entrar/autenticando', 'GrupoController@autenticar')->name('grupos.autenticar');

//------------------------------------------------------PARTICIPACIONES-------------------------------------------------------
Route::resource('participaciones', 'ParticipacionController');
