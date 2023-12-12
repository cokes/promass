<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/entradas','App\Http\Controllers\EntradasController@index');
Route::post('/entradas','App\Http\Controllers\EntradasController@store');
Route::get('/entradas/{id}','App\Http\Controllers\EntradasController@show');
Route::put('/entradas/{id}','App\Http\Controllers\EntradasController@update');
Route::delete('/entradas/{id}','App\Http\Controllers\EntradasController@destroy');

Route::post('/search','App\Http\Controllers\EntradasController@search');
