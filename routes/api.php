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
Route::middleware('api')->group(function(){
    Route::get('notifications', 'Api\NotificationsController@getNewNotifications');
    Route::post('followings', 'Api\FollowingsController@follow');
    Route::post('attendances', 'Api\AttendancesController@attend');
    Route::post('comments', 'Api\CommentsController@store');
});

