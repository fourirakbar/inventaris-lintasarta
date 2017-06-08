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

#user request barang
Route::get('request', 'PermintaanController@index');
Route::post('request2', 'PermintaanController@input');

#user monitoring
Route::get('monitoring', 'PermintaanController@monitoring');
Route::get('monitoring2', 'PermintaanController@minputMonitoring');

#karyawan cek semua permintaan
Route::get('semua', 'PermintaanController@lihatSemua');
Route::get('semoga/lihat/{ID_PERMINTAAN', 'PermintaanController@show');
Route::get('/semua/{ID_PERMINTAAN}/tindakLanjut', 'PermintaanController@tindakLanjut');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/register', 'RegisterController@index');

// Auth::routes();

Route::get('/home', 'HomeController@index');

#coba CRUD manual
Route::resource('/barang', 'BarangController');