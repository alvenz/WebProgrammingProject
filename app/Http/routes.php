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

Route::get('/', 'HomeController@viewHomePage');
Route::get('/login', 'HomeController@viewLoginPage');
Route::get('/register', 'HomeController@viewRegisterPage');
Route::get('/insertGame', 'HomeController@viewInsertGamePage');
Route::get('/updateGame', 'HomeController@viewUpdateGamePage');
Route::get('/insertUser', 'HomeController@viewInsertUserPage');
Route::get('/updateUser', 'HomeController@viewUpdateUserPage');
Route::get('/insertGenre', 'HomeController@viewInsertGenrePage');
Route::get('/updateGenre', 'HomeController@viewUpdateGenrePage');