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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/employee','Api\employeeCont@index');
Route::get('/employee/{id}','Api\employeeCont@show');
Route::post('/employee','Api\employeeCont@store');
Route::put('/employee/{id}','Api\employeeCont@update');
Route::delete('/employee/{id}','Api\employeeCont@destroy');
