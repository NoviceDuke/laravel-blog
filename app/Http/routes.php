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
// blog RESTful route

// Controllers Within The "App\Http\Controllers\Blog" Namespace
// Bomb : 'middleware' => 'web' 拔掉了還能作用驗證等功能，加了反而不能動
Route::group(['namespace' => 'Blog'], function () {
	Route::resource('blog', 'BlogHomeController');
	Route::resource('post', 'PostController');
	Route::resource('categories', 'CategoryController', ['except' => ['create']]);
});
// Controllers Within The "App\Http\Controllers\Backend" Namespace
Route::group(['namespace' => 'backend'], function () {
	// backen RESTful route
	Route::resource('/backend', 'BackendController');
});

// duke's route
Route::get('about', 'PagesController@getAbout');

// default auth and home route
Route::auth();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
