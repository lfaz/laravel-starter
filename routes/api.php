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

Route::prefix('news')->group(function () {
  Route::get('/', 'NewsController@index');
  Route::get('/all', 'NewsController@showAll');
  Route::get('/{id}', 'NewsController@show');
  Route::post('/', 'NewsController@store');
  Route::put('/{id}', 'NewsController@update');
  Route::delete('/{id}', 'NewsController@delete');
});

