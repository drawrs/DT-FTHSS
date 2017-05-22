<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@beranda');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/data-sekolah', [
        'uses' => 'MainController@data_sekolah',
        'as' => 'data_sekolah']);
    Route::get('/data-mutasi', [
        'uses' => 'MainController@mutasi',
        'as' => 'data_mutasi']);
    Route::post('/data-mutasi', [
        'uses' => 'UpdateController@updateMutasi',
        'as' => 'ubah_mutasi']);
    // Guru

    Route::get('/data-guru', [
        'uses' => 'MainController@data_guru',
        'as' => 'data_guru']);

    Route::get('/detail-guru/{guru_id?}', [
        'uses' => 'MainController@detail_guru',
        'as' => 'detail_guru']);
    Route::get('/ubah-guru/{guru_id?}', [
        'uses' => 'MainController@ubah_guru',
        'as' => 'ubah_guru']);

    Route::get('/rekap-data-sekolah', [
        'uses' => 'MainController@rekap_sekolah',
        'as' => 'rekap_sekolah']);
    Route::post('/rekap-data-sekolah', [
        'uses' => 'UpdateController@updateRekap',
        'as' => 'update.rekap_sekolah']);
   Route::get('/hapus-data-sekolah/{tahun}', [
        'uses' => 'MainController@deleteRekap',
        'as' => 'delete.rekap_sekolah']);
    // update 
    Route::post('/update-guru', [
        'uses' => 'UpdateController@updateGuru',
        'as' => 'post.update_guru']);
    // add
    Route::post('/add-guru', [
        'uses' => 'InsertController@insertGuru',
        'as' => 'post.insert_guru']);
    // add
    Route::get('/tambah-guru', [
        'uses' => 'MainController@tambah_guru',
        'as' => 'tambah_guru']);
    Route::get('/hapus-guru/{id}', [
        'uses' => 'MainController@hapus_guru',
        'as' => 'hapus_guru']);

    // ubah sekolah
    Route::get('/ubah-sekolah/{id}', [
        'uses' => 'MainController@ubah_sekolah',
        'as' => 'ubah_sekolah']);
    Route::get('/tambah-sekolah', [
        'uses' => 'MainController@tambah_sekolah',
        'as' => 'tambah_sekolah']);

    Route::post('/update-sekolah', [
        'uses' => 'UpdateController@updateSekolah',
        'as' => 'post.ubah_sekolah']);
    Route::post('/tambah-sekolah', [
        'uses' => 'InsertController@insertSekolah',
        'as' => 'post.tambah_sekolah']);
    // hapus sekolah
    Route::get('/hapus-sekolah/{id}', [
        'uses' => 'MainController@hapus_sekolah',
        'as' => 'hapus_sekolah']);

    Route::get('/tambah-rekap-sekolah', [
        'uses' => 'MainController@tambah_rekap_sekolah',
        'as' => 'rekap_data_sekolah']);

    Route::post('/tambah-rekap-sekolah', [
        'uses' => 'InsertController@insertRekapSekolah',
        'as' => 'post.simpan_rekap_sk']);

    Route::get('/print', [
        'uses' => 'PrintController@pilihPrint',
        'as' => 'print']);

    Route::get('/print-data', [
        'uses' => 'PrintController@printPage',
        'as' => 'print.data']);
});
 Route::auth();

Route::get('/home', 'HomeController@index');
