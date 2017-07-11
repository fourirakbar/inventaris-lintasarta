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

Route::get('/home', function() {
	return view('home');
})->middleware('user', 'admin');

#karyawan cek semua permintaan
Route::get('/semua', 'PermintaanController@lihatSemua')->middleware('admin');
Route::get('/semuabelum', 'PermintaanController@lihatSemuaBelum')->middleware('admin');
Route::get('/semuasudah', 'PermintaanController@lihatSemuaSudah')->middleware('admin');
Route::get('/semua/lihat/{ID_PERMINTAAN}', 'PermintaanController@details')->middleware('admin');
Route::get('/semua/lihat/edit/{ID_PERMINTAAN}', 'PermintaanController@doEdit')->middleware('admin');
Route::put('/semua/lihat/edit/{ID_PERMINTAAN}', 'PermintaanController@doUpdate')->middleware('admin');

Route::get('login', 'LoginController@index')->middleware('guest');;
Route::post('login2', 'LoginController@login');

Route::get('register', 'RegisterController@index')->middleware('admin');
Route::post('register', 'RegisterController@create')->middleware('admin');

Route::get('logout', 'LoginController@logout');

// Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('user');

Route::get('showtikpro', 'TikproController@index')->middleware('admin');
Route::put('edittikpro', 'TikproController@update')->middleware('admin');
Route::get('edittikpro', 'TikproController@edit')->middleware('admin');
Route::get('addtikpro/{ID_TIKPRO}', 'TikproController@add')->middleware('admin');
Route::get('removetikpro/{ID_TIKPRO}', 'TikproController@remove')->middleware('admin');


Route::get('/semua/hapus/{ID_PERMINTAAN}', 'PermintaanController@hapus')->middleware('user');
Route::post('/semua/hapus/{ID_PERMINTAAN}', 'PermintaanController@delete')->middleware('user');
Route::get('adminhapus', 'PermintaanController@showpembatalan')->middleware('admin');
Route::get('adminhapus/request', 'PermintaanController@showpembatalanbelum')->middleware('admin');
Route::get('adminhapus/lihat/{ID_PERMINTAAN}', 'PermintaanController@detailpembatalan')->middleware('admin');
Route::put('adminhapus/lihat/{ID_PERMINTAAN}', 'PermintaanController@execpembatalan')->middleware('admin');

Route::get('/barang', 'BarangController@index')->middleware('admin');
Route::post('/barang2', 'BarangController@input')->middleware('admin');
Route::get('/showbarang', 'BarangController@show')->middleware('user');

Route::get('/rack', 'RackController@index')->middleware('admin');
Route::post('/rack2', 'RackController@input')->middleware('admin');
Route::get('/rack/show', 'RackController@show')->middleware('admin');
Route::get('/rack/edit/{ID_RACK}', 'RackController@edit')->middleware('admin');
Route::put('/rack/edit/{ID_RACK}', 'RackController@update')->middleware('admin');
Route::get('/rack/delete/{ID_RACK}', 'RackController@delete')->middleware('admin');
Route::get('/rack/show/{ID_RACK}', 'RackController@showeach')->middleware('admin');

Route::get('/peminjaman', 'PinjamController@index')->middleware('user');
Route::post('peminjaman2', 'PinjamController@input')->middleware('user');
Route::get('/peminjaman/show', 'PinjamController@show')->middleware('user');
Route::get('/peminjaman/show/belum','PinjamController@showBelum')->middleware('admin');
Route::get('/peminjaman/show/sudah','PinjamController@showSudah')->middleware('admin');
Route::get('/peminjaman/edit/{ID_PEMINJAMAN}','PinjamController@edit')->middleware('admin');
Route::put('/peminjaman/edit/{ID_PEMINJAMAN}','PinjamController@update')->middleware('admin');
Route::get('/peminjaman/delete/{ID_PEMINJAMAN}','PinjamController@delete')->middleware('admin');

Route::get('repair/input', 'RepairController@index')->middleware('user');
Route::post('repair/input', 'RepairController@input')->middleware('user');
Route::get('repair/show', 'RepairController@show')->middleware('admin');
Route::get('repair/show/sudah', 'RepairController@showsudah')->middleware('admin');
Route::get('repair/show/belum', 'RepairController@showbelum')->middleware('admin');
Route::get('repair/selesai/{ID_PERBAIKAN}', 'RepairController@selesai')->middleware('admin');
Route::get('repair/show/detail/{ID_PERBAIKAN}', 'RepairController@showdetail')->middleware('admin');
Route::get('repair/show/edit/{ID_PERBAIKAN}', 'RepairController@showedit')->middleware('admin');
Route::put('repair/show/edit/{ID_PERBAIKAN}','RepairController@update')->middleware('admin');
Route::get('404', function() {
	return view('404');
});

