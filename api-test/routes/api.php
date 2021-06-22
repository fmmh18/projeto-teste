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

Route::post('login','Api\AuthController@login');


Route::group(['middleware' => ['apiJwt']],function(){

    Route::post('logout','Api\AuthController@logout');

    Route::get('usuario','Api\userController@index');
    Route::get('usuario/{id}','Api\userController@show');
    Route::post('usuario','Api\userController@store');
    Route::put('usuario/{id}','Api\userController@update');
    Route::delete('usuario/{id}','Api\userController@destroy');


    Route::get('tarefa','Api\taskController@index');
    Route::get('tarefa/{id}','Api\taskController@show');
    Route::post('tarefa','Api\taskController@store');
    Route::put('tarefa/{id}','Api\taskController@update');
    Route::delete('tarefa/{id}','Api\taskController@destroy');

});
