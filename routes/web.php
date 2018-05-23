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

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/upcomings', 'GigsController@index')->name('gigs.index');
    Route::resource('gigs', 'GigsController');
    Route::get('following', 'FollowingsController@following')->name('following');
    Route::get('/gigs/upcom/mine', 'GigsController@mine')->name('gigs.mine');

});

Route::middleware('auth')->namespace('Admin')->prefix('admin')->group(function(){
    Route::get('/dashboard', 'HomeController@dashboard')->name('admin.dashboard');
});

Route::get('/upcoms/{q?}', 'HomeController@upcomings')->name('home');
Route::get('/', 'HomeController@upcomings')->name('home');
Route::get('/', 'HomeController@upcomings')->name('home');
Route::post('comment', 'CommentsController@store')->name('comments.store');
Route::get('/gig/{id}', 'HomeController@show')->name('home.showgig');
