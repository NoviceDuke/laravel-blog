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
Route::resource('blog', 'BlogHomeController@index');
// Controllers Within The "App\Http\Controllers\Admin" Namespace
Route::group(['namespace' => 'Blog'], function () {
    Route::resource('post', 'PostController');
});
Route::get('/trace', 'BlogHomeController@trace');

// backen RESTful route
Route::resource('backend', 'BackendController');

// duke's route
Route::get('about', 'PagesController@getAbout');
Route::get('article-backend','ArticleController@show');
// default auth and home route
Route::auth();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
