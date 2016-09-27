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
Route::group(['namespace' => 'Blog'], function () {
    Route::resource('blog', 'BlogHomeController');
    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
});

//backend Management
Route::group(['prefix' => 'backend', 'middleware' => 'auth', 'namespace' => 'Backend'], function () {

    // logs Viewer
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    // home
    Route::get('/', 'BackendController@index');
    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController', ['except' => ['create']]);
    Route::resource('tag', 'TagController');
    Route::resource('user', 'UserController');
    Route::patch('user/update_roles/{id}', 'UserController@updateRoles')->name('backend.user.update_roles');
    Route::patch('user/detach_root/{id}', 'UserController@detachRoot')->name('backend.user.detach_root');
    Route::resource('role', 'RoleController');
});

// duke's route
Route::get('about', 'PagesController@getAbout');

// default auth and home route
Route::auth();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
