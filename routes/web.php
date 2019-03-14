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

Auth::routes();

Route::get('/', 'HomeController@index')->name('Главная');

// Administrative panel

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('pages', 'PageController');
    Route::delete('pages/mass_destroy', 'PageController@massDestroy')->name('pages.mass_destroy');
    Route::get('/', 'Admin\AppController@index')->name('admin');
});


