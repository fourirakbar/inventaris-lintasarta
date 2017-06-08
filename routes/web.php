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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/request', 'PermintaanController@requestPage');	
// Route::put('/request', array('uses' => 'PermintaanController@create'));
Route::get('request', 'PermintaanController@index');
Route::post('request2', 'PermintaanController@input');

Route::get('login', 'LoginController@index');
Route::post('login2', 'LoginController@login');

Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@create');

// Auth::routes();

Route::get('/home', 'HomeController@index');

#coba CRUD manual
Route::resource('/barang', 'BarangController');