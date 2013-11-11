<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showIndex');
Route::get('login', 'HomeController@showLogin');
Route::get('register', 'HomeController@showRegister');
Route::get('logout', 'HomeController@logout');

Route::post('login', 'HomeController@postLogin');
Route::post('register', 'HomeController@postRegister');


Route::group(array('before' => 'auth'), function()
{
	Route::resource('posts', 'PostsController');
	Route::resource('comments', 'CommentsController');
	Route::resource('users', 'UsersController');
	Route::resource('tags', 'TagsController');	
});



