<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/news', 'PagesController@news')->middleware('verified');
Route::post('/check_email', 'AjaxController@index');
Auth::routes(['verify' => True]);

Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
