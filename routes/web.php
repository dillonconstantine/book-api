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

Route::namespace('Web')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('create');
    });
    
    Route::get('/create', 'GifController@create')->name('create');
    Route::post('/create', 'GifController@processCreate')->name('processCreate');

    Route::get('/edit', 'GifController@edit')->name('edit');
    Route::post('/edit', 'GifController@processEdit')->name('processEdit');

    Route::get('/delete', 'GifController@delete')->name('delete');
    Route::post('/delete', 'GifController@processDelete')->name('processDelete');
});

Route::namespace('Auth')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
});
