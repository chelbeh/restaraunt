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
Route::get('/about', 'AboutController@index')->name('О компании');
Route::get('/contact', 'ContactController@index')->name('Контакты');

// Administrative panel



Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('pages', 'PageController');
    Route::delete('pages/mass_destroy', 'PageController@massDestroy')->name('pages.mass_destroy');
    Route::resource('pages', 'PageController');
    Route::get('/', 'Admin\AppController@index');
});


