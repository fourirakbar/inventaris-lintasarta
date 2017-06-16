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


Route::get('/', 'LoginController@index');
#user request barang
Route::get('request', 'PermintaanController@index');
Route::post('request2', 'PermintaanController@input');

#user monitoring
Route::get('monitoring', 'PermintaanController@monitoring');
Route::get('monitoring2', 'PermintaanController@minputMonitoring');

Route::get('dashboard','PermintaanController@dashboard');

#karyawan cek semua permintaan
Route::get('/semua', 'PermintaanController@lihatSemua');
Route::get('/semuaSudah', 'PermintaanController@lihatSemuaSudah');
Route::get('/semua/lihat/{ID_PERMINTAAN}', 'PermintaanController@details');
Route::get('/semua/lihat/edit/{ID_PERMINTAAN}', 'PermintaanController@doEdit');
Route::put('/semua/lihat/edit/{a}', 'PermintaanController@doUpdate');

Route::get('login', 'LoginController@index');
Route::post('login2', 'LoginController@login');

Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@create');

Route::get('logout', 'LoginController@logout');

// Auth::routes();

Route::get('/home', 'HomeController@index');

#coba CRUD manual
Route::get('/barang', 'BarangController@index');

Route::get('edittikpro', 'TikproController@index');
Route::put('edittikpro', 'TikproController@update');