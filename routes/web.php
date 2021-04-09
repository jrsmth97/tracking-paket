<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'AdminController@index');

    Route::get('data-agen', 'AgenController@dataAgen');
    Route::get('tambah-agen', 'AgenController@createAgen');
    Route::post('tambah-agen', 'AgenController@storeAgen');
    Route::get('data-agen/{id}', 'AgenController@editAgen');
    Route::put('data-agen/{id}', 'AgenController@updateAgen');
    Route::delete('data-agen/delete/{id}', 'AgenController@deleteAgen');

    Route::get('harga-agen', 'AgenController@hargaAgen');
    Route::get('tambah-harga/{kodeAgen}', 'AgenController@createHargaAgen');
    Route::post('tambah-harga/{kodeAgen}', 'AgenController@storeHargaAgen');
    Route::get('detail-harga-agen/{kodeAgen}', 'AgenController@detailHargaAgen');
    Route::get('harga-agen/{kodeAgen}/{id}', 'AgenController@editHargaAgen');
    Route::put('harga-agen/{kodeAgen}/{id}', 'AgenController@updateHargaAgen');
    Route::delete('delete-harga-agen/{kodeAgen}/{id}', 'AgenController@deleteHargaAgen');

    Route::get('data-kurir', 'KurirController@dataKurir');
    Route::get('tambah-kurir', 'KurirController@createKurir');
    Route::post('tambah-kurir', 'KurirController@storeKurir');
    Route::get('data-kurir/{id}', 'KurirController@editKurir');
    Route::put('data-kurir/{id}', 'KurirController@updateKurir');
    Route::delete('data-kurir/delete/{id}', 'KurirController@deleteKurir');

    Route::get('data-kustomer', 'KustomerController@dataKustomer');
    Route::get('tambah-kustomer', 'KustomerController@createKustomer');
    Route::post('tambah-kustomer', 'KustomerController@storeKustomer');
    Route::get('edit-kustomer/{id}', 'KustomerController@editKustomer');
    Route::put('data-kustomer/{id}', 'KustomerController@updateKustomer');
    Route::delete('data-kustomer/delete/{id}', 'KustomerController@deleteKustomer');

    Route::get('harga-kustomer', 'KustomerController@hargaKustomer');
    Route::get('tambah-harga-kustomer/{kodeKustomer}', 'KustomerController@createHargaKustomer');
    Route::post('tambah-harga-kustomer/{kodeKustomer}', 'KustomerController@storeHargaKustomer');
    Route::get('edit-harga-kustomer/{kodeKustomer}/{id}', 'KustomerController@editHargaKustomer');
    Route::put('edit-harga-kustomer/{kodeKustomer}/{id}', 'KustomerController@updateHargaKustomer');
    Route::get('detail-harga-kustomer/{kodeKustomer}', 'KustomerController@detailHargaKustomer');
    Route::delete('delete-harga-kustomer/{kodeKustomer}/{id}', 'KustomerController@deleteHargaKustomer');

    Route::get('harga-general', 'AdminController@hargaGeneral');
    Route::get('tambah-harga-general', 'AdminController@createHargaGeneral');
    Route::post('tambah-harga-general', 'AdminController@storeHargaGeneral');
    Route::get('edit-harga-general/{id}', 'AdminController@editHargaGeneral');
    Route::put('edit-harga-general/{id}', 'AdminController@updateHargaGeneral');
    Route::delete('delete-harga-general/{id}', 'AdminController@deleteHargaGeneral');

    Route::get('daftar-paket', 'PaketController@daftarPaket');
    Route::get('tambah-paket', 'PaketController@addPaket');
    Route::post('tambah-paket', 'PaketController@storePaket');
    Route::get('edit-paket/{stt}', 'PaketController@editPaket');
    Route::get('track-input/{stt}', 'PaketController@trackInput');
    Route::post('track-input/{stt}', 'PaketController@storeTrack');
    Route::put('edit-paket/{id}', 'PaketController@updatePaket');
    Route::delete('delete-paket/{id}', 'PaketController@deletePaket');

    Route::get('/admin', 'AdminController@admin');
    Route::get('/users', 'AdminController@user');
    Route::delete('admin/delete/{id}', 'AdminController@deleteAdmin');

    Route::get('getCity/ajax/{id}', 'AdminController@ajax');
    Route::get('getCost/ajax/{tujuan}/{tipe}/{kode}', 'AdminController@ajaxHarga');
    Route::get('getSik/ajax/{kustomer}', 'PaketController@ajaxSik');

    Route::get('notifications', 'NotifController@index');
    Route::get('remove-notif/ajax', 'NotifController@nonActive');
    Route::delete('clean-notif', 'NotifController@cleanNotif');

    Route::post('import_paket', 'PaketController@import');

    Route::post('import_agen', 'AgenController@import_agen');
    Route::post('import_harga_agen/{kode}', 'AgenController@import_harga_agen');

    Route::post('import_kustomer', 'KustomerController@import_kustomer');
    Route::post('import_harga_kustomer/{kode}', 'KustomerController@import_harga_kustomer');

    Route::post('import_kurir', 'AdminController@import_kurir');
    Route::post('import_harga_general', 'AdminController@import_harga_general');
});

Route::get('export_paket/', 'PaketController@export');
Route::get('export_kurir/', 'AdminController@export_kurir');
Route::get('export_agen/', 'AgenController@export_agen');
Route::get('export_kustomer/', 'KustomerController@export_kustomer');
Route::get('export_harga_agen/{kode}', 'AgenController@export_harga');
Route::get('export_harga_kustomer/{kode}', 'KustomerController@export_harga');
Route::get('export_harga_general', 'AdminController@export_harga_general');

Route::get('track-paket/', 'TrackController@inputTrackPaket');
Route::post('track-paket/', 'TrackController@getTrackPaket');
Route::get('track-paket/{stt}', 'TrackController@trackPaket');
Route::get('print-paket/{stt}', 'TrackController@printPaket');
Route::get('/404', 'ErrorController@notFound')->name('404');
