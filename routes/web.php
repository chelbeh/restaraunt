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

Route::get('/', 'HomeController@index')->name('home');
Route::post('feedback/store', 'FeedbackController@store')->name('feedback.store');


// Administrative panel

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\AppController@index')->name('admin');
    Route::get('exchange', 'Admin\ExchangeController@index')->name('exchange');

    Route::resource('apps', 'Admin\AppController');
    Route::resource('importcsv', 'Admin\ImportCsvController');
    Route::resource('products', 'Admin\ProductController');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('pages', 'Admin\PageController');
    Route::delete('apps/mass_destroy', 'Admin\AppController@massDestroy')->name('apps.mass_destroy');
    Route::delete('pages/mass_destroy', 'Admin\PageController@massDestroy')->name('pages.mass_destroy');
    Route::delete('products/mass_destroy', 'Admin\ProductsController@massDestroy')->name('products.mass_destroy');
});


