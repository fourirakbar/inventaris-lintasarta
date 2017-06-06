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

Route::get('/request', 'PermintaanController@requestPage');
Route::post('/request', array('uses' => 'PermintaanController@create'))

Route::get('/login', 'LoginController@loginPage');
Route::post('/login', 'LoginController@doLogin');

Route::get('/register', 'RegisterController@index');

// Auth::routes();

Route::get('/home', 'HomeController@index');


