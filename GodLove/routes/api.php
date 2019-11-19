<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/athenas','AnthenaController@store');
Route::get('/athenas','AnthenaController@index');

Route::post('/items','ItermController@store');
Route::get('/items','ItermController@index');
Route::put('/items/{iterm}','ItermController@update');
