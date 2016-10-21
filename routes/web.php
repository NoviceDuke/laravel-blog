<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

// hchs trace Route
Route::get('trace', 'Blog\BlogHomeController@getTrace');

// Facebook Auth Routes
Route::group(['namespace' => 'Auth'], function () {
    Route::get('redirect_to_fb', 'AuthController@redirectToFacebookProvider');
    Route::get('callback_from_fb', 'AuthController@handleFacebookProviderCallback');
});

// Controllers Within The "App\Http\Controllers\Blog" Namespace
Route::group(['namespace' => 'Blog'], function () {
    Route::get('/', function(){ return redirect('/blog');});
    Route::get('/filter', 'BlogHomeController@filter');
    Route::resource('blog', 'BlogHomeController');
    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
});

//backend Management
Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'backend'], 'namespace' => 'Backend'], function () {


    // logs Viewer
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    // home
    Route::get('/', 'BackendController@index');
    Route::resource('article', 'ArticleController', ["as"=>"backend"]);
    Route::resource('category', 'CategoryController',  ["as"=>"backend"]);
    Route::resource('tag', 'TagController', ["as"=>"backend"]);
    Route::resource('user', 'UserController', ["as"=>"backend"]);
    Route::patch('user/update_roles/{id}', 'UserController@updateRoles')->name('backend.user.update_roles');
    Route::patch('user/detach_root/{id}', 'UserController@detachRoot')->name('backend.user.detach_root');
    Route::resource('role', 'RoleController', ["as"=>"backend"]);
});


// duke's route
Route::get('about', 'PagesController@getAbout');

// default auth and home route
