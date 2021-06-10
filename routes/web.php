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
    session()->forget('alumno_id');
    return view('inicio');
})->name('inicio')->middleware('profe');

Auth::routes();

//------------------------------------------------------USERS---------------------------------------------------------------
Route::resource('users', 'UserController');
Route::get('users/{id}/edit/contrasena', 'UserController@editPsw')->name('users.editPsw');
Route::PATCH('users/cambiar-contrasena/{id}', 'UserController@updatePsw')->name('users.updatePsw');
Route::get('/logout', 'UserController@logout')->name('logout');

//------------------------------------------------------ALUMNOS-------------------------------------------------------------
Route::resource('alumnos', 'AlumnoController');
Route::get('alumnos/create/{grupo?}', 'AlumnoController@create')->name('alumnos.create');

//------------------------------------------------------ASIGNATURAS---------------------------------------------------------
Route::resource('asignaturas', 'AsignaturaController')->middleware('profe');

//------------------------------------------------------DINAMICAS-----------------------------------------------------------
Route::resource('dinamicas', 'DinamicaController')->middleware('profe');

//------------------------------------------------------GRUPOS--------------------------------------------------------------
Route::resource('grupos', 'GrupoController');
Route::get('entrar', 'GrupoController@entrar')->name('grupos.entrar');
Route::POST('entrar/autenticando', 'GrupoController@autenticar')->name('grupos.autenticar');

//------------------------------------------------------PARTICIPACIONES-----------------------------------------------------
Route::resource('participaciones', 'ParticipacionController');
Route::post('participacion', 'ParticipacionController@cambiarPuntuacion')->name('participacion.cambiarPuntuacion');
Route::post('participacion/nueva', 'ParticipacionController@agregar')->name('participacion.agregar');