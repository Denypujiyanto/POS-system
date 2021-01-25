<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

// Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::get('penjualan/receipt/{id}', 'PenjualanController@receipt')->name('receipt');
	Route::get('laporan/pembelian', 'PembelianController@laporan')->name('laporanpembelian');
	Route::get('laporan/pembelian/cetak', 'PembelianController@cetakLaporan');
	Route::get('laporan/penjualan', 'PenjualanController@laporan')->name('laporanpenjualan');
	Route::get('laporan/penjualan/cetak', 'PenjualanController@cetakLaporan');

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::resource('supplier', 'SupplierController');
	Route::resource('customer', 'CustomerController');
	Route::resource('sukucadang', 'SukucadangController');
	Route::resource('pembelian', 'PembelianController');
	Route::resource('penjualan', 'PenjualanController');
	Route::resource('returpembelian', 'ReturPembelianController');
	Route::resource('returpenjualan', 'ReturPenjualanController');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
