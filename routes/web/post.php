<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes checking save
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/post/{post}', 'PostController@show')->name('post');
Route::middleware('auth')->group(function(){
    Route::get('/posts', 'PostController@index')->name('post.index');
	Route::get('/posts/create', 'PostController@create')->name('post.create');
    Route::post('/posts', 'PostController@store')->name('post.store');

    Route::delete('/posts/{post}/delete', 'PostController@destroy')->name('post.destroy');
    Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');//here we check if the user can see the post
    Route::patch('/posts/{post}/update', 'PostController@update')->name('post.update');
});
