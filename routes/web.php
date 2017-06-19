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
Route::get('request', 'PermintaanController@index')->middleware('user');
Route::post('request2', 'PermintaanController@input')->middleware('user');

#user monitoring
Route::get('monitoring', 'PermintaanController@monitoring')->middleware('user');
Route::get('monitoring2', 'PermintaanController@minputMonitoring')->middleware('user');

Route::get('dashboard','PermintaanController@dashboard')->middleware('user');

#karyawan cek semua permintaan
Route::get('/semua', 'PermintaanController@lihatSemua')->middleware('user');
Route::get('/semuabelum', 'PermintaanController@lihatSemuaBelum')->middleware('user');
Route::get('/semuasudah', 'PermintaanController@lihatSemuaSudah')->middleware('user');
Route::get('/semua/lihat/{ID_PERMINTAAN}', 'PermintaanController@details')->middleware('user');
Route::get('/semua/lihat/edit/{ID_PERMINTAAN}', 'PermintaanController@doEdit')->middleware('user');
Route::put('/semua/lihat/edit/{a}', 'PermintaanController@doUpdate')->middleware('user');

Route::get('login', 'LoginController@index');
Route::post('login2', 'LoginController@login');

Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@create');

Route::get('logout', 'LoginController@logout');

// Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('user');

#coba CRUD manual
Route::get('/barang', 'BarangController@index')->middleware('user');

Route::get('edittikpro', 'TikproController@index')->middleware('user');
Route::put('edittikpro', 'TikproController@update')->middleware('user');