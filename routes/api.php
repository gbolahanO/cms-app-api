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

Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('post', 'PostController');
    Route::resource('category', 'CategoryController');
});

Route::get('/blog', 'FrontendController@index');
Route::get('/blog/{slug}', 'FrontendController@single_post');

Route::get('/test', function() {
    $data = [
        'success' => 'yes'
    ];
    return response()->json($data);
});
