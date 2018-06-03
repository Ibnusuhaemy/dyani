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
Route::get('/invoice/{nota_id}', 'PemesananController@invoice');
Route::get('/invoice/{nota_id}/{is_cetak}', 'PemesananController@invoice');
Route::post('/tambah-item', 'PemesananController@tambahItem');
Route::get('/hapus-item/{id}', 'PemesananController@hapusItem');
Route::post('/update-item', 'PemesananController@updateItem');
Route::post('/upload-file', 'PemesananController@uploadFile');
Route::post('/hapus-nota', 'PemesananController@hapusNota');
Route::post('/update-desain', 'PemesananController@updateDesain');
Route::post('/update-finishing', 'PemesananController@updateFinishing');
Route::post('/update-catatan', 'PemesananController@updateCatatan');
