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


Route::get('/', 'LoginController@index')->middleware('guest');
#user request barang
Route::get('request', 'PermintaanController@index')->middleware('user');
Route::post('request2', 'PermintaanController@input')->middleware('user');

#user monitoring
Route::get('monitoring', 'PermintaanController@monitoring')->middleware('user');
Route::get('monitoring2', 'PermintaanController@minputMonitoring')->middleware('user');

Route::get('/home', function() {
	return view('home');
})->middleware('user');

#karyawan cek semua permintaan
Route::get('/semua', 'PermintaanController@lihatSemua')->middleware('user');
Route::get('/semuabelum', 'PermintaanController@lihatSemuaBelum')->middleware('user');
Route::get('/semuasudah', 'PermintaanController@lihatSemuaSudah')->middleware('user');
Route::get('/semua/lihat/{ID_PERMINTAAN}', 'PermintaanController@details')->middleware('user');
Route::get('/semua/lihat/edit/{ID_PERMINTAAN}', 'PermintaanController@doEdit')->middleware('user');
Route::put('/semua/lihat/edit/{ID_PERMINTAAN}', 'PermintaanController@doUpdate')->middleware('user');

Route::get('login', 'LoginController@index')->middleware('guest');;
Route::post('login2', 'LoginController@login');

Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@create');

Route::get('logout', 'LoginController@logout');

// Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('user');

Route::get('showtikpro', 'TikproController@index')->middleware('user');
Route::put('edittikpro', 'TikproController@update')->middleware('user');

Route::get('edittikpro', 'TikproController@edit')->middleware('user');

Route::get('/semua/hapus/{ID_PERMINTAAN}', 'PermintaanController@hapus')->middleware('user');
Route::post('/semua/hapus/{ID_PERMINTAAN}', 'PermintaanController@delete')->middleware('user');
Route::get('adminhapus', 'PermintaanController@showpembatalan')->middleware('user');
Route::get('adminhapus/request', 'PermintaanController@showpembatalanbelum')->middleware('user');
Route::get('adminhapus/lihat/{ID_PERMINTAAN}', 'PermintaanController@detailpembatalan')->middleware('user');
Route::put('adminhapus/lihat/{ID_PERMINTAAN}', 'PermintaanController@execpembatalan')->middleware('user');

Route::get('/barang', 'BarangController@index')->middleware('user');
Route::post('/barang2', 'BarangController@input')->middleware('user');
Route::get('/showbarang', 'BarangController@show')->middleware('user');

Route::get('/rack', 'RackController@index')->middleware('user');
Route::post('/rack2', 'RackController@input')->middleware('user');
Route::get('/showrack', 'RackController@show')->middleware('user');
Route::get('/rack/edit/{ID_RACK}', 'RackController@edit')->middleware('user');
Route::put('/rack/edit/{ID_RACK}', 'RackController@update')->middleware('user');
Route::get('/deleterack/{ID_RACK}', 'RackController@delete')->middleware('user');