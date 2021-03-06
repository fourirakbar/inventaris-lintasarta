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


Route::get('/', 'UserController@index')->middleware('guest');
#user request barang
Route::get('request', 'PermintaanController@index')->middleware('admin');
Route::post('request2', 'PermintaanController@input')->middleware('admin');

Route::get('home', 'HomeController@showminta')->middleware('admin');
Route::post('getmsg1', 'HomeController@showbatal')->middleware('admin');
Route::post('getmsg2', 'HomeController@showminta')->middleware('admin');
Route::post('getmsg3', 'HomeController@showpinjam')->middleware('admin');
Route::post('getmsg4', 'HomeController@showrepair')->middleware('admin');
Route::post('getmsg5', 'HomeController@showminta3')->middleware('admin');
Route::post('getmsg6', 'HomeController@showpinjam3')->middleware('admin');
Route::post('getmsg7', 'HomeController@showrepair3')->middleware('admin');
Route::get('monitoring2', 'HomeController@showminta2')->middleware('admin');
Route::get('monitoring3', 'HomeController@showpinjam2')->middleware('admin');
Route::get('monitoring4', 'HomeController@showrepair2')->middleware('admin');

#karyawan cek semua permintaan
Route::get('/semua', 'PermintaanController@lihatSemua')->middleware('admin');
Route::get('/semuabelum', 'PermintaanController@lihatSemuaBelum')->middleware('admin');
Route::get('/semuasudah', 'PermintaanController@lihatSemuaSudah')->middleware('admin');
Route::get('/semua/lihat/{ID_PERMINTAAN}', 'PermintaanController@details')->middleware('admin');
Route::get('/semua/lihat/edit/{ID_PERMINTAAN}', 'PermintaanController@doEdit')->middleware('admin');
Route::put('/semua/lihat/edit/{ID_PERMINTAAN}', 'PermintaanController@doUpdate')->middleware('admin');

Route::get('login', 'LoginController@index');
Route::post('login2', 'LoginController@login');

Route::get('register', 'RegisterController@index')->middleware('superadmin');
Route::post('register', 'RegisterController@create')->middleware('superadmin');

Route::get('/editprofile/{ID_REQUESTER}','EditProfileController@index');
Route::put('/editprofile/edit/{ID_REQUESTER}','EditProfileController@input');

Route::get('logout', 'LoginController@logout');

// Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('admin');

Route::get('showtikpro', 'TikproController@index')->middleware('admin');
Route::get('showtikproo', 'TikproController@indexo')->middleware('admin');
Route::put('edittikpro', 'TikproController@update')->middleware('superadmin');
Route::get('edittikpro', 'TikproController@edit')->middleware('superadmin');
Route::get('addtikpro/{ID_TIKPRO}', 'TikproController@add')->middleware('admin');
Route::get('removetikpro/{ID_TIKPRO}', 'TikproController@remove')->middleware('admin');
Route::get('log_click', 'TikproController@logClick')->middleware('admin');
Route::get('/log_click/details/{ID_LOG}', 'TikproController@detailLogClick')->middleware('admin');

Route::get('/semua/hapus/{ID_PERMINTAAN}', 'PermintaanController@hapus')->middleware('admin');
Route::post('/semua/hapus/{ID_PERMINTAAN}', 'PermintaanController@delete');
Route::post('/semua/reject/{ID_PERMINTAAN}', 'PermintaanController@reject')->middleware('admin');;
Route::get('adminhapus', 'PermintaanController@showpembatalan')->middleware('admin');
Route::get('adminhapus/request', 'PermintaanController@showpembatalanbelum')->middleware('admin');
Route::get('adminhapus/lihat/{ID_PERMINTAAN}', 'PermintaanController@detailpembatalan')->middleware('admin');
Route::put('adminhapus/lihat/{ID_PERMINTAAN}', 'PermintaanController@execpembatalan')->middleware('admin');

Route::get('/barang', 'BarangController@index')->middleware('admin');
Route::post('/barang2', 'BarangController@input')->middleware('admin');
Route::get('/showbarang', 'BarangController@show')->middleware('admin');
Route::get('/showbarang2', 'BarangController@show2')->middleware('admin');
Route::get('/showbarang/edit/{ID_BARANG}', 'BarangController@editBarang')->middleware('admin');
Route::put('/showbarang/edit/{ID_BARANG}', 'BarangController@updateBarang')->middleware('admin');

Route::get('/rack', 'RackController@index')->middleware('admin');
Route::post('/rack2', 'RackController@input')->middleware('admin');
Route::get('/rack/show', 'RackController@show')->middleware('admin');
Route::get('/rack/edit/{ID_RACK}', 'RackController@edit')->middleware('admin');
Route::put('/rack/edit/{ID_RACK}', 'RackController@update')->middleware('admin');
Route::get('/rack/delete/{ID_RACK}', 'RackController@delete')->middleware('admin');
Route::get('/rack/show/{ID_RACK}', 'RackController@showeach')->middleware('admin');

Route::get('/peminjaman', 'PinjamController@index')->middleware('admin');
Route::post('peminjaman2', 'PinjamController@input')->middleware('admin');
Route::get('/peminjaman/show', 'PinjamController@show')->middleware('admin');
Route::get('/peminjaman/show/belum','PinjamController@showBelum')->middleware('admin');
Route::get('/peminjaman/show/sudah','PinjamController@showSudah')->middleware('admin');
Route::get('/peminjaman/edit/{ID_PEMINJAMAN}','PinjamController@edit')->middleware('admin');
Route::put('/peminjaman/edit/{ID_PEMINJAMAN}','PinjamController@update')->middleware('admin');
Route::get('/peminjaman/delete/{ID_PEMINJAMAN}','PinjamController@delete')->middleware('admin');

Route::get('repair/input', 'RepairController@index')->middleware('admin');
Route::post('repair/input', 'RepairController@input')->middleware('admin');
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

//user section
Route::get('caripermintaan', 'PermintaanController@caripermintaan')->middleware('admin');
Route::post('caripermintaan', 'PermintaanController@showpermintaan')->middleware('admin');

Route::get('caripeminjaman', 'PinjamController@caripeminjaman')->middleware('admin');
Route::post('caripeminjaman', 'PinjamController@showpeminjaman')->middleware('admin');

Route::get('user-search', 'UserController@index');
Route::post('user-search', 'UserController@show');
Route::get('user-search/cancel', 'UserController@showCancel');
Route::post('user-search/cancel', 'UserController@cancel');

Route::get('export/permintaan', 'PermintaanController@exporttoexcel')->middleware('admin');
Route::get('export/barangkeluar', 'BarangKeluarController@exporttoexcel')->middleware('admin');
Route::get('export/peminjaman', 'PinjamController@exporttoexcel')->middleware('admin');
Route::get('export/perbaikan', 'RepairController@exporttoexcel')->middleware('admin');
Route::get('export/barang', 'BarangController@exporttoexcel')->middleware('admin');
Route::get('export/rack', 'RackController@exporttoexcel')->middleware('admin');

Route::get('/barangkeluar', 'BarangKeluarController@index');
Route::post('/barangkeluar', 'BarangKeluarController@input');
Route::get('/barangkeluar/show', 'BarangKeluarController@show');
