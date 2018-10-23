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

//Route::middleware('auth:api')->get('/user', function (Reqest $request) {
//    return $request->user();
//});
Route::post('/client', 'UserManipulateController@signup'); //registration
Route::post('/login', 'Auth\LoginController@login'); //login
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/users', 'UserManipulateController@all'); //list of users
    //images
    Route::post('/image', 'ImageController@create');//create imagee
    Route::get('/images/admin', 'ImageController@all'); //all image by all user
    Route::put('/image/{image}', 'ImageController@updateImage'); //change image
    Route::delete('/image/{image}', 'ImageController@deleteImage'); // delete
    Route::get('/images', 'ImageController@imagesForCurrent');
    Route::group(['prefix' => 'auth'], function () {
//    Route::get('/client/{id}', 'UserManipulateController@profile');
        Route::get('/client/{id}', 'UserManipulateController@profile'); //data by id user's
    });
    Route::group(['prefix' => 'tasks'], function () {
//        Route::post('/create', '');
    });
    Route::group(['prefix' => 'musics'], function () {
        Route::post('/song', 'SongController@add_music');
        Route::get('/song', 'SongController@paginated_music');
    });
    Route::group(['prefix' => 'albums'], function () {
        Route::post('/album', 'AlbumController@add');
    });
});

