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
    return view('welcome');
});

Auth::routes();

Route::get('users/notifications','UsersController@notifications')->name('users.notifications');
Route::post('discussions/{discussion}/replies/{reply}/mark-as-a-best-reply','DiscussionController@reply')->name('disccussion.bets-reply');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('discussions','DiscussionController');
Route::resource('discussions/{discussion}/replies','RepliesController');

