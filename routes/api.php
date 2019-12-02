<?php

use App\Gif;
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

Route::namespace('API')->middleware('auth:api')->group(function () {
    Route::get('gifs', 'GifController@index');
    Route::get('gifs/{gif}', 'GifController@show');
    Route::post('gifs', 'GifController@store');
    Route::put('gifs/{gif}', 'GifController@update');
    Route::delete('gifs/{gif}', 'GifController@destroy');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
