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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// blog routes
Route::get('/blog/new', 'BlogController@new');
Route::post('/blog/create', 'BlogController@create');
Route::get('/blog/{name}/edit', 'BlogController@edit');
Route::post('/blog/{blog}/update', 'BlogController@update');

// post routes
Route::get('/{name}', 'PostController@index');
Route::get('/blog/{blog}/post/new', 'PostController@new');
Route::post('/blog/{blog}/post/create', 'PostController@create');
Route::get('/{name}/{title}', 'PostController@show');
Route::get('/{name}/{title}/test', 'PostController@test');
Route::get('/{name}/{title}/edit', 'PostController@edit');
Route::post('/{blog}/{post}/update', 'PostController@update');

//comment routes
Route::post('/post/{post}/comment', 'CommentController@create');