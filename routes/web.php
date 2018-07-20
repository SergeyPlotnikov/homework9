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

Route::get('/', 'CurrenciesController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/currencies', 'CurrenciesController@list')->name('Currencies');
    Route::get('/currencies/add/', 'CurrenciesController@add')->name('Add');

    Route::post('/currencies', 'CurrenciesController@store')->name('store');
    Route::get('/currencies/{id}', 'CurrenciesController@show')->name('show-currency');
    Route::get('/currencies/{id}/edit', 'CurrenciesController@edit')->name('edit-currency');
    Route::get('/currencies/{id}/delete', 'CurrenciesController@delete')->name('delete-currency');
    Route::post('/currencies/update/{id}', 'CurrenciesController@update')->name('update');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
