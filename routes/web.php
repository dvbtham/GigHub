<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/upcomings', 'GigsController@index')->name('gigs.index');
    Route::resource('gigs', 'GigsController');
    Route::get('following', 'FollowingsController@following')->name('following');
    Route::get('/gigs/upcom/mine', 'GigsController@mine')->name('gigs.mine');

});

Route::get('/', 'HomeController@upcomings')->name('home');
