<?php

use App\product;
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
Auth::routes();

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'Auth\LoginController@showLogin');

Route::post('/login', 'Auth\LoginController@login')->name('login.login');

Route::get('/home', 'HomeController@index')->name('home');

//Productos
Route::get('/productos', 'ProductController@index')->name('product.index');
Route::get('/productos/crear', 'ProductController@create')->name('product.create');
Route::post('/productos', 'ProductController@store')->name('product.store');
Route::get('/productos/editar/{id}', 'ProductController@edit')->name('product.edit');
Route::post('/productos/editar/{id}', 'ProductController@update')->name('product.update');
Route::delete('/productos/eliminar/{id}', 'ProductController@funDestroy');

//Ordenes
Route::get('/ordenes', 'OrderController@index')->name('order.index');
Route::get('/ordenes/crear', 'OrderController@create')->name('order.create');
Route::post('/productos/crear', 'OrderController@store')->name('order.store');
Route::get('/ordenes/editar', 'OrderController@edit')->name('order.edit');

//Comercios
Route::get('/comercio', 'ComercioController@index')->name('comercio.index');
Route::get('/comercio/crear', 'ComercioController@create')->name('comercio.create');
Route::get('/comercio/editar', 'ComercioController@edit')->name('comercio.edit');

//Usuarios
Route::get('/usuarios', 'UsuariosController@index')->name('usuarios.index');
Route::get('/usuarios/crear', 'UsuariosController@create')->name('usuarios.create');
Route::get('/usuarios/editar', 'UsuariosController@edit')->name('usuarios.edit');

//Listado de ordenes
Route::get('/Lista', 'ListOrderController@index')->name('listado.index');

Route::get('profile', 'ProfileController@edit')->name('profile.edit');
Route::put('profile', 'ProfileController@update')->name('profile.update');
Route::put('profile/password', 'ProfileController@password')->name('profile.password');