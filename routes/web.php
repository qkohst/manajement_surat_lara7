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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'AuthController@index')->name('login');
Route::post('/', 'AuthController@store')->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::resource('/klasifikasi', 'KlasifikasiController', [
        'uses' => ['index', 'store', 'update', 'destroy']
    ]);

    Route::get('/suratmasuk/agenda', 'AgendaSuratMasukController@index')->name('agendamasuk.index');
    Route::get('/suratmasuk/agenda/print', 'AgendaSuratMasukController@print')->name('agendamasuk.print');
    Route::get('/suratmasuk/agenda/export', 'AgendaSuratMasukController@export')->name('agendamasuk.export');


    Route::get('/suratkeluar/agenda', 'AgendaSuratKeluarController@index')->name('agendakeluar.index');
    Route::get('/suratkeluar/agenda/print', 'AgendaSuratKeluarController@print')->name('agendakeluar.print');
    Route::get('/suratkeluar/agenda/export', 'AgendaSuratKeluarController@export')->name('agendakeluar.export');

    Route::get('/suratmasuk/galeri', 'SuratMasukController@galeri')->name('galeri.suratmasuk');
    Route::get('/suratmasuk/galeri/{id}', 'SuratMasukController@tampil')->name('galeri.suratmasuk.tampil');
    Route::resource('/suratmasuk', 'SuratMasukController', [
        'uses' => ['index', 'store', 'update', 'destroy', 'show']
    ]);
    Route::resource('/disposisi', 'DisposisiSuratMasukController', [
        'uses' => ['store', 'update', 'show', 'destroy']
    ]);
    Route::get('/suratkeluar/galeri', 'SuratKeluarController@galeri')->name('galeri.suratkeluar');
    Route::get('/suratkeluar/galeri/{id}', 'SuratKeluarController@tampil')->name('galeri.suratkeluar.tampil');
    Route::resource('/suratkeluar', 'SuratKeluarController', [
        'uses' => ['index', 'store', 'update', 'destroy']
    ]);

    // Route Admin
    Route::group(['middleware' => 'CheckRole:1'], function () {
        Route::resource('/user', 'UserController', [
            'uses' => ['index', 'store', 'update', 'destroy']
        ]);
        Route::resource('/instansi', 'InstansiController', [
            'uses' => ['index', 'edit', 'update']
        ]);
    });
});
