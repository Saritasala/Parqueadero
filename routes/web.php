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
Route::put('/productos/editar/{id}', 'ProductController@update')->name('product.update');
Route::delete('/productos/eliminar/{id}', 'ProductController@funDestroy');
Route::get('/productos/mas/{id}', 'ProductController@show')->name('product.show');

//Ordenes
Route::get('/ordenes', 'OrderController@index')->name('order.index');
Route::get('/ordenes/crear', 'OrderController@create')->name('order.create');
Route::post('/ordenes', 'OrderController@store')->name('order.store');
Route::get('/ordenes/editar', 'OrderController@edit')->name('order.edit');
Route::get('factura/{id}', 'OrderController@factura')->name('factura');
Route::get('/ordenes/mas/{id}', 'OrderController@show')->name('order.show');
Route::get('/ordenes/eliminar/{id}', 'OrderController@funDelete');


//Pedidos

Route::get('/pedidos/crear/{id}', 'PedidosController@create')->name('pedidos.create');
Route::post('/pedidos', 'PedidosController@store')->name('pedidos.store');

//Vehiculos
Route::get('/vehiculos', 'VehiculosController@index')->name('vehiculos.index');
Route::get('/vehiculos/crear', 'VehiculosController@create')->name('vehiculos.create');
Route::get('/vehiculos/editar/{id}', 'VehiculosController@edit')->name('vehiculos.edit');
Route::post('/vehiculos', 'VehiculosController@store')->name('vehiculos.store');
Route::put('/vehiculos/editar/{id}', 'VehiculosController@update')->name('vehiculos.update');
Route::delete('/vehiculos/eliminar/{id}', 'VehiculosController@funDelete');

//Usuarios
Route::get('/usuarios', 'UsuariosController@index')->name('usuarios.index');
Route::get('/usuarios/crear', 'UsuariosController@create')->name('usuarios.create');
Route::get('/usuarios/editar/{id}', 'UsuariosController@edit')->name('usuarios.edit');
Route::put('/usuarios/editar/{id}', 'UsuariosController@update')->name('usuarios.update');
Route::post('/usuarios', 'UsuariosController@store')->name('usuarios.store');
Route::delete('/usuario/eliminar/{id}', 'ComercioController@funDelete');

//Listado de ordenes
Route::get('/Lista', 'ListOrderController@index')->name('listado.index');
Route::get('/Lista/mas/{id}', 'ListOrderController@show')->name('listado.show');

Route::get('profile', 'ProfileController@edit')->name('profile.edit');
Route::put('profile', 'ProfileController@update')->name('profile.update');
Route::put('profile/password', 'ProfileController@password')->name('profile.password');

Route::post('logout', 'LoginController@signOut')->name('logout');