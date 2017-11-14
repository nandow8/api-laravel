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

Route::post('login', 'Api\AuthController@login');
Route::post('refresh', 'Api\AuthController@refresh');
Route::get('logout', 'Api\AuthController@logout');

//Route::resource('user', 'Api\UsersController');   //pega tudo que estiver no controller
Route::post('user', 'Api\UsersController@store');

Route::group(['middleware' => 'jwt.auth', 'namespace' => 'Api\\'], function() {

    Route::get('me', 'AuthController@me');
});
