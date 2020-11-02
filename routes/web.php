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

Route::get('/', function () {
    return view('layouts.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio', function ()
{
    return view('layouts.index');
})->name('inicio');


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

//------------------------------------------------------PARTICIPACIONES-------------------------------------------------------
Route::resource('participaciones', 'ParticipacionController');
