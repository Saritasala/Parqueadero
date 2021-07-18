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

//Clientes
Route::get('/clientes', 'ClientesController@index')->name('clientes.index');
Route::get('/clientes/crear', 'ClientesController@create')->name('clientes.create');
Route::post('/clientes', 'ClientesController@store')->name('clientes.store');
Route::get('/clientes/editar/{id}', 'ClientesController@edit')->name('clientes.edit');
Route::put('/clientes/editar/{id}', 'ClientesController@update')->name('clientes.update');
Route::delete('/clientes/eliminar/{id}', 'ClientesController@funDestroy');
Route::get('/clientes/mas/{id}', 'ClientesController@show')->name('clientes.show');

//Parqueadero
Route::get('/parqueadero', 'ParqueaderoController@index')->name('parqueadero.index');
Route::get('/parqueadero/crear', 'ParqueaderoController@create')->name('parqueadero.create');
Route::post('/parqueadero', 'ParqueaderoController@store')->name('parqueadero.store');
Route::get('/parqueadero/editar/{id}', 'ParqueaderoController@edit')->name('parqueadero.edit');
Route::put('/parqueadero/editar/{id}', 'ParqueaderoController@update')->name('parqueadero.update');
Route::get('factura/{id}', 'ParqueaderoController@factura')->name('factura');
Route::delete('/parqueadero/eliminar/{id}', 'ParqueaderoController@funDelete');

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

//Tarifas
Route::get('/tarifas', 'TarifasController@index')->name('tarifas.index');
Route::get('/tarifas/crear', 'TarifasController@create')->name('tarifas.create');
Route::post('/tarifas', 'TarifasController@store')->name('tarifas.store');

Route::get('profile', 'ProfileController@edit')->name('profile.edit');
Route::put('profile', 'ProfileController@update')->name('profile.update');
Route::put('profile/password', 'ProfileController@password')->name('profile.password');

Route::post('logout', 'LoginController@signOut')->name('logout');