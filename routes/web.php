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

Route::post('create', 'UserController@create');
Route::post('edit/{id}', 'UserController@edit')->name('edit');
Route::post('update/{id}', 'UserController@update')->name('update');
Route::post('delete/{id}', 'UserController@delete')->name('destroy');

Route::post('comment/show', 'CommentController@show')->name('c_show');
Route::post('comment/create', 'CommentController@create')->name('c_create');
Route::post('comment/delete/{id}', 'CommentController@delete')->name('c_destroy');

Route::post('search/', 'UserController@search')->name('search');

Route::post('like/{id}', 'UserController@like')->name('like');
Route::post('unlike/{id}', 'UserController@unlike')->name('unlike');

Route::post('/test1/create', 'ProjectController@create');
Route::post('/test1/update', 'ProjectController@update');