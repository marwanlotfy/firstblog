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
    return redirect('/login');
})->name('home');
Route::resource('post','PostController');
Route::resource('user','UserController');
Route::post('/comment/create/{id}','CommentController@store')->middleware('auth');
Route::post('/like/{id}','LikeController@store')->middleware('auth');
Route::post('/login','UserController@login')->middleware('guest');
Route::get('/login',function(){
    return view('user.login');
})->name('login')->middleware('guest');
Route::get('/logout','UserController@logout')->middleware('auth');