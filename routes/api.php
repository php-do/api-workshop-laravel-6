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

Route::prefix('v1')->group(function(){
  Route::post('login', 'ApiAuthController@login');
  Route::post('register', 'ApiAuthController@register');
  Route::group(['middleware' => 'auth:api'], function(){
  	Route::post('getUser', 'ApiAuthController@getUser');
  	Route::get('employee', 'EmployeeController@index');

  });
});

Route::prefix('v1.1')->group(function(){
  Route::post('login', 'ApiAuthController@login');
  Route::post('register', 'ApiAuthController@register');
  Route::group(['middleware' => 'auth:api'], function(){
  	Route::post('getUser', 'ApiAuthController@getUserMayor');
 	Route::get('employee', 'EmployeeController@index');

  });
});

Route::prefix('v1.1.1')->group(function(){
  Route::post('login', 'ApiAuthController@login');
  Route::post('register', 'ApiAuthController@register');
  Route::group(['middleware' => 'auth:api'], function(){
  	Route::post('getUser', 'ApiAuthController@getUserMinor');
	Route::post('version', 'ApiAuthController@version');
 	Route::get('employee', 'EmployeeController@index');
  });
});

