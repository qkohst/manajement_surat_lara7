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
