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
    Route::get('/gigs/create', 'GigsController@create')->name('gigs.create');
    Route::post('/gigs/create', 'GigsController@store')->name('gigs.store');
    Route::get('/gigs/{id}/edit', 'GigsController@edit')->name('gigs.edit');
    Route::post('/gigs/{id}/edit', 'GigsController@update')->name('gigs.update');
});

Route::get('/', 'HomeController@upcomings')->name('home');
