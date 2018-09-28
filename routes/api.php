<?php

use Illuminate\Http\Request;
use App\Http\Middleware\SuperAdmin;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/client', 'UserManipulateController@signup'); //registration
Route::post('/login', 'Auth\LoginController@login'); //login
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users', 'UserManipulateController@all'); //list of users
    Route::post('/image', 'ImageController@create');
    Route::group(['prefix' => 'auth'], function () {
//    Route::get('/client/{id}', 'UserManipulateController@profile');
        Route::get('/client/{id}', 'UserManipulateController@profile'); //data by id user's
    });
    Route::group(['prefix' => 'tasks'], function () {
//        Route::post('/create', '');
    });
});

