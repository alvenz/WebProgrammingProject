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

//Route::get('/', 'HomeController@viewHomePage');
Route::get('/login', 'HomeController@viewLoginPage');
Route::get('/register', 'HomeController@viewRegisterPage');
Route::get('/insertGame', 'HomeController@viewInsertGamePage');
Route::get('/updateGame/{id}', 'ProductController@viewUpdateData');
Route::get('/insertUser', 'HomeController@viewInsertUserPage');
Route::get('/updateUser/{id}', 'UserController@viewUpdateUserData');
Route::get('/insertGenre', 'HomeController@viewInsertGenrePage');
Route::get('/updateGenre', 'HomeController@viewUpdateGenrePage');

Route::get('/store', 'ProductController@viewProduct');
Route::get('/profile', 'HomeController@viewProfilePage');
Route::get('/myGames', 'HomeController@viewMyGames');

Route::post('/doEditProfile', 'UserController@doEditProfile');

Route::get('/', 'ProductController@viewLowestPriceGame');
Route::get('/manageGame', 'ProductController@viewAllGames');
Route::get('/manageUser', 'UserController@viewAllUser');

Route::post('/doUpdateUser', 'UserController@doUpdateUser');
Route::post('/doInsertUser', 'UserController@doInsertUser');
Route::get('/doDeleteUser/{id}', 'UserController@doDeleteUser');

Route::post('/doUpdateGame', 'ProductController@doUpdateGame');
Route::post('/doInsertGame', 'ProductController@doInsertGame');
Route::get('/doDeleteGame/{id}', 'ProductController@doDeleteGame');

Route::post('/doRegister', 'UserController@doRegister');
Route::post('/doLogin', 'UserController@doLogin');
Route::get('/doLogout', 'UserController@doLogout');