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



Route::post('/login','PeopleController@store');

Route::post('/buylogs','BuylogController@store');
Route::get('/buylogs','BuylogController@index');

Route::post('/pools','PoolController@store');
Route::put('/pools','PoolController@update');
Route::get('/pools','PoolController@index');

Route::get('/pools/text','PoolController@text');

Route::put('/pools/logout','PoolController@leavepool');