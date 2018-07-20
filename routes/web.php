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

Route::get('/', 'CurrenciesController@main')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('currencies', 'CurrenciesController')->names([
        'index' => 'Currencies',
        'create' => 'Add',
        'store' => 'store',
        'show' => 'show-currency',
        'edit' => 'edit-currency',
        'destroy' => 'delete-currency',
        'update' => 'update'
    ]);
});

Auth::routes();

