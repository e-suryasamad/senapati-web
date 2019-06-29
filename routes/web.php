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

/*
Route::get('home', function () {
    return view('home');
});
*/

Route::get('', function () {
    return view('index');
});
// Route::get('/index', function () {
//     return view('index');
// });
// Route::get('search','contPemakalah@search');

Route::get('pmk','contPemakalah@search');
Route::get('pmk/konfirmasi/{artikel_id}','contPemakalah@viewKonfirmasi');
Route::post('pmk/prosesKonfirmasi','contPemakalah@prosesKonfirmasi');
Route::get('npmk','contNonPemakalah@daftarNama');
Route::get('npmk/reg','contNonPemakalah@regNpmk');
Route::post('npmk/prosesReg','contNonPemakalah@prosesTambahReq');

Route::prefix('/admin')->group(function(){
    Route::get('masterArtikel','HomeController@masterArtikel');
    Route::get('tambahArtikel','HomeController@tambahArtikel');
    Route::post('prosesTambahArtikel','HomeController@prosesTambahArtikel');
    Route::get('detailArtikel/{artikel_id}','HomeController@detailArtikel');
    Route::get('editArtikel/{artikel_id}','HomeController@editArtikel');
    Route::post('prosesEditArtikel','HomeController@prosesEditArtikel');
    Route::get('deleteArtikel/{artikel_id}','HomeController@deleteArtikel');
    Route::get('daftarPemakalah','HomeController@daftarPemakalah');
    Route::get('detailPemakalah/{artikel_id}','HomeController@detailPemakalah');
    Route::post('validasiPemakalah','HomeController@validasiPemakalah');
    Route::get('daftarNonPemakalah','HomeController@daftarNonPemakalah');
    Route::get('detailNonPemakalah/{peserta_id}','HomeController@detailNonPemakalah');
    Route::post('prosesKonfirmNoPmk','HomeController@prosesKonfirmNoPmk');
});
// Route::get('/admin', 'contAdmin@masterArtikel')->name('admin');

// Route::get('registrasi','contAdmin@registrasi');
// Route::get('login','contAdmin@login');


Auth::routes();

// Route::get('/admin', 'HomeController@index')->name('admin');
Route::get('/admin', 'HomeController@masterArtikel')->name('home');