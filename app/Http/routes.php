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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{userId}/posts', 'UserController@posts'); 
Route::get('/users/{userId}/looks', 'UserController@looks'); 
Route::get('/users/{userId}/comments', 'UserController@comments'); 

Route::get('/users/{userId}/followers', 'UserController@followers'); 
Route::get('/users/{userId}/following', 'UserController@following'); 

Route::resource('posts', 'PostController');  