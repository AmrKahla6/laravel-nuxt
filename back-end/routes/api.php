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

// Route Api
Route::get('module/{module_name}', 'ApiController@index');
// Route Api id
Route::get('module/{module_name}/{id}', 'ApiController@getById');
// Route Api contacts
Route::post('contacts', 'ApiController@storeContact');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
