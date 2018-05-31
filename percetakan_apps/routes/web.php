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

Route::get('/', "IndexController@index");

Auth::routes();

Route::get('/pemesanan', 'PemesananController@index');
Route::get('/pemesanan/tambah', 'PemesananController@add');
Route::post('/pemesanan', 'PemesananController@buatNota');
Route::post('/pemesanan/update', 'PemesananController@editNota');
Route::get('/pemesanan/{nota_id}', 'PemesananController@detail');
Route::post('/tambah-item', 'PemesananController@tambahItem');
Route::post('/update-item', 'PemesananController@updateItem');
