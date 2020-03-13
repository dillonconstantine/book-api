<?php

use App\Books;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'API\Auth', 'prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
  
    Route::group(['middleware' => 'auth:api'], function() {

        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

    });

});

Route::group(['namespace' => 'API', 'middleware' => 'auth:api'], function () {

    Route::get('books', 'BookController@index');
    Route::get('books/{book}', 'BookController@show');

    Route::group(['middleware' => ['check.accept.header']], function () {

        Route::delete('books/{book}', 'BookController@destroy');

        Route::group(['middleware' => ['check.content.type.header']], function () {

            Route::post('books', 'BookController@store');
            Route::patch('books/{book}', 'BookController@update');

        });

    });

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
