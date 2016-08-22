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

// hchs trace Route
Route::get('trace', 'Blog\BlogHomeController@getTrace');

// Facebook Auth Routes
Route::group(['namespace' => 'Auth'], function () {
    Route::get('redirect_to_fb', 'AuthController@redirectToFacebookProvider');
    Route::get('callback_from_fb', 'AuthController@handleFacebookProviderCallback');
});

// Controllers Within The "App\Http\Controllers\Blog" Namespace
Route::group(['middleware' => 'auth', 'namespace' => 'Blog'], function () {
    Route::resource('blog', 'BlogHomeController');
    Route::resource('article', 'ArticleController');
    Route::resource('categories', 'CategoryController', ['except' => ['create']]);
});
// Controllers Within The "App\Http\Controllers\Backend" Namespace

//backend Management
Route::group(['middleware' => 'auth', 'namespace' => 'Backend'], function () {
    Route::resource('backend/article', 'ArticleController');
});

// duke's route
Route::get('about', 'PagesController@getAbout');

// default auth and home route
Route::auth();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
