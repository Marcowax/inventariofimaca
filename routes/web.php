<?php

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

use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('UsersList');;

Route::get('/users/{id}/edit', 'UsersController@edit')->name('UsersEdit');

Route::post('/users/{id}/update', 'UsersController@update')->name('UsersUpdate');

Route::get('/users/{id}/delete', 'UsersController@destroy')->name('UserDelete');

Route::get('/inventarios', 'InventariosController@index')->name('InventariosList');

Route::get('/inventarios/register', 'InventariosController@ShowForm')->name('InventariosRegister');

Route::post('/inventarios/register', 'InventariosController@create')->name('InventarioRegistered');

Route::get('/marcas', 'MarcasController@index')->name('MarcasList');