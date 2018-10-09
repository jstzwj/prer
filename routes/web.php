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

Route::get('/', function () {
    return view('home');
});

Route::post('/signin', 'UserController@signin');

Route::post('/signout', 'UserController@signout');

Route::post('/signup', 'UserController@signup');

Route::get('/list', 'VideoController@homeVideoList');

Route::get('/videoinfo', 'VideoController@videoInfo');

Route::get('/userinfo', 'UserController@userInfo');

Route::get('/signininfo', 'UserController@signinInfo');

Route::post('/upload', 'VideoController@upload');

Route::get('{path}', function () {
    return view('home');
});
