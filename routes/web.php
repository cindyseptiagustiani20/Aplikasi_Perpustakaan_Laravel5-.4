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

Route::get('/', 'AuthController@home')->name('login');
Route::get('/login', 'AuthController@index');
Route::post('/postlogin', 'AuthController@postlogin');

Route::get('/admin', 'AuthController@index2');
Route::post('/postlogin2', 'AuthController@postlogin2');

Route::get('/logout', 'AuthController@logout');
Route::get('/logout2', 'AuthController@logout2');

Route::group(['middleware' => ['auth', 'checklevel:0']], function(){
	//user
	Route::get('/user', 'UserController@index');
	Route::post('/user/create', 'UserController@create');
	Route::get('/user/{id}/edit', 'UserController@uvedit');
	Route::post('/user/update', 'UserController@update');
	Route::get('/user/{id}/pass', 'UserController@uvpass');
	Route::post('/user/{id}/passupdate', 'UserController@passupdate');
	Route::get('/user/{id}/delete', 'UserController@delete');

	//siswa
	Route::get('/siswa', 'SiswaController@index');
	Route::post('/siswa/create', 'SiswaController@create');
	Route::get('/siswa/{id}/edit', 'SiswaController@uvedit');
	Route::post('/siswa/update', 'SiswaController@update');
	Route::get('/siswa/{id}/pass', 'SiswaController@uvpass');
	Route::post('/siswa/{id}/passupdate', 'SiswaController@passupdate');
	Route::get('/siswa/{id}/delete', 'SiswaController@delete');

	//ruang
	Route::get('/ruang', 'RuangController@index');
	Route::post('/ruang/create', 'RuangController@create');
	Route::get('/ruang/{id}/edit', 'RuangController@uvedit');
	Route::post('/ruang/update', 'RuangController@update');
	Route::get('/ruang/{id}/delete', 'RuangController@delete');
});

Route::group(['middleware' => ['auth', 'checklevel:0,1']], function() {
	//kategori
	Route::get('/kategori', 'KategoriController@index');
	Route::post('/kategori/create', 'KategoriController@create');
	Route::get('/kategori/{id}/edit', 'KategoriController@uvedit');
	Route::post('/kategori/update', 'KategoriController@update');

	//buku
	Route::get('/buku', 'BukuController@index');
	Route::post('/buku/create', 'BukuController@create');
	Route::get('/buku/{id}/edit', 'BukuController@uvedit');
	Route::post('/buku/update', 'BukuController@update');
});

Route::group(['middleware' => ['auth', 'checklevel:0,1,2']], function(){
	Route::get('/dashboard', 'DashboardController@index');


	//profile
	Route::get('/profile', 'UserController@profile');
	Route::get('/profile/{id}/edit', 'UserController@uvprofile');
	Route::post('/profile/update', 'UserController@updateprofile');
	Route::get('/profile/{id}/editp', 'UserController@uvpassprofile');
	Route::post('/profile/{id}/passupdate', 'UserController@updatepassprofile');

	//peminjaman
	Route::get('/peminjaman', 'PeminjamanController@index');
	Route::post('/peminjaman/create', 'PeminjamanController@create');
	Route::get('/peminjaman/{id}/delete', 'PeminjamanController@delete');

	//peminjaman->detail
	Route::get('/peminjaman/{id}/detail_pinjam', 'DetailPinjamController@index');
	Route::post('/detail_pinjam/create', 'DetailPinjamController@create');
	Route::get('/detail_pinjam/{id}/delete', 'DetailPinjamController@delete');

	//pengembalian
	Route::get('/pengembalian', 'PengembalianController@index');
	Route::get('/pengembalian/{id}/edit', 'PengembalianController@uvedit');
	Route::post('/pengembalian/update', 'PengembalianController@update');
});
