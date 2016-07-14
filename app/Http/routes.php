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
Route::get('/blog','BlogHomeController@index');
Route::get('/trace','BlogHomeController@trace');


Route::get('about', 'PagesController@getAbout');


Route::auth();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
