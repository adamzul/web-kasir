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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('makanan-minuman', 'MakananMinumanController')->middleware('auth');
Route::get('pesanan/bayar/{id}', 'PesananController@bayar')->middleware('auth', 'kasir');
Route::get('pesanan/{id}', 'PesananController@pesananDariAnda')->middleware('auth', 'pelayan');
Route::resource('pesanan', 'PesananController')->middleware('auth');
Route::get('detail-pesanan/{id}', 'DetailPesananController@index')->name('detail_pesanan_index')->middleware('auth');
Route::get('detail-pesanan/create/{id}', 'DetailPesananController@create')->middleware('auth');
Route::post('detail-pesanan/{id}', 'DetailPesananController@store')->middleware('auth');
Route::delete('detail-pesanan/{id_pesanan}/{id}', 'DetailPesananController@destroy')->middleware('auth');
Route::get('detail-pesanan/{id_pesanan}/{id}', 'DetailPesananController@edit')->middleware('auth');
Route::post('detail-pesanan/{id_pesanan}/{id}', 'DetailPesananController@update')->middleware('auth');
Route::resource('detail-pesanan', 'DetailPesananController')->middleware('auth');