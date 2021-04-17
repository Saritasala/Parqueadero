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

Route::get('/productos', 'ProductController@index')->name('product.index');

Route::get('profile', 'ProfileController@edit')->name('profile.edit');
Route::put('profile', 'ProfileController@update')->name('profile.update');
Route::put('profile/password', 'ProfileController@password')->name('profile.password');