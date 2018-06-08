<?php
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::middleware("auth")->group(function(){
	// $user = \Auth::id();
	// dd(Auth::user());
	Route::get('/', "IndexController@index");
	// if($user->type == 'cs'){
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
	// }

		Route::get("/pelanggan", "PelangganController@index");
		Route::get("/tambah-pelanggan", "PelangganController@baru");
		Route::post("/tambah-pelanggan", "PelangganController@simpan");
		Route::post("/update-pelanggan", "PelangganController@update");
		Route::get("/hapus-pelanggan/{id}", "PelangganController@hapus");

		Route::get("/bahan-baku", "BahanBakuController@index");
		Route::get("/tambah-bahan-baku", "BahanBakuController@baru");
		Route::post("/tambah-bahan-baku", "BahanBakuController@simpan");
		Route::post("/update-bahan-baku", "BahanBakuController@update");
		Route::get("/hapus-bahan-baku/{id}", "BahanBakuController@hapus");

});


