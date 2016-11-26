<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'bookController@showBooks');

Route::get('/addbook', 'bookController@addBook');
Route::post('/addbook','bookController@insertBook');
Route::get('/book/{url_slug}','bookController@showBook');
Route::get('book/download/{url_slug}','bookController@download');

Route::auth();

Route::get('/home', 'bookController@showBooks');
Route::get('/profile', "bookController@profile");
Route::get('/profile/{id}',"bookController@pubprofile");

Route::post('/follow','bookController@follow');
Route::post('/unfollow','bookController@unfollow');
Route::get('profile/{id}/follower','bookController@follower');
Route::get('profile/{id}/following','bookController@following');


//api routes 
Route::get('/apis/list','apisapiController@allBooks');