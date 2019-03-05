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

Route::get('/users/password', 'UsersController@password')->name('PasswordChange');

Route::post('/users/password', 'UsersController@passwordupdate')->name('PasswordChanged');

Route::get('/users/{id}/delete', 'UsersController@destroy')->name('UserDelete');

Route::get('/inventarios', 'InventariosController@index')->name('InventariosList');

Route::get('/inventarios/register', 'InventariosController@ShowForm')->name('InventariosRegister');

Route::post('/inventarios/register', 'InventariosController@create')->name('InventarioRegistered');

Route::get('/inventarios/{id}/show', 'InventariosController@show')->name('InventariosShow');

Route::get('/inventarios/pdf', 'InventariosController@pdf')->name('inventario.pdf');

Route::get('/inventarios/{id}/edit', 'InventariosController@edit')->name('InventariosEdit');

Route::post('/inventarios/{id}/update', 'InventariosController@update')->name('InventariosUpdate');

Route::get('/inventarios/{id}/delete', 'InventariosController@destroy')->name('InventariosDelete');

Route::get('/inventarios/delete', 'InventariosController@destroyMany')->name('InventariosMultipleDelete');

Route::get('/marcas', 'MarcasController@index')->name('MarcasList');

Route::get('/marcas/register', 'MarcasController@ShowForm')->name('MarcasRegister');

Route::post('/marcas/register', 'MarcasController@create')->name('MarcasRegistered');

Route::get('/marcas/{id}/edit', 'MarcasController@edit')->name('MarcasEdit');

Route::post('/marcas/{id}/update', 'MarcasController@update')->name('MarcasUpdate');

Route::get('/marcas/{id}/delete', 'MarcasController@destroy')->name('MarcasDelete');

Route::get('/marcas/delete', 'MarcasController@destroyMany')->name('MarcasMultipleDelete');

Route::get('/tipos', 'TiposController@index')->name('TiposList');

Route::get('/tipos/register', 'TiposController@ShowForm')->name('TiposRegister');

Route::post('/tipos/register', 'TiposController@create')->name('TiposRegistered');

Route::get('/tipos/{id}/edit', 'TiposController@edit')->name('TiposEdit');

Route::post('/tipos/{id}/update', 'TiposController@update')->name('TiposUpdate');

Route::get('/tipos/{id}/delete', 'TiposController@destroy')->name('TiposDelete');

Route::get('/tipos/delete', 'TiposController@destroyMany')->name('TiposMultipleDelete');

Route::get('/ubicaciones', 'UbicacionesController@index')->name('UbicacionesList');

Route::get('/ubicaciones/register', 'UbicacionesController@ShowForm')->name('UbicacionesRegister');

Route::post('/ubicaciones/register', 'UbicacionesController@create')->name('UbicacionesRegistered');

Route::get('/ubicaciones/{id}/edit', 'UbicacionesController@edit')->name('UbicacionesEdit');

Route::post('/ubicaciones/{id}/update', 'UbicacionesController@update')->name('UbicacionesUpdate');

Route::get('/ubicaciones/{id}/delete', 'UbicacionesController@destroy')->name('UbicacionesDelete');

Route::get('/ubicaciones/delete', 'UbicacionesController@destroyMany')->name('UbicacionesMultipleDelete');