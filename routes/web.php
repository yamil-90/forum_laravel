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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');

Route::middleware('auth')->group(function(){
	Route::get('/admin', 'AdminsController@index')->name('admin.index'); // this will change the name of the route acordingly if we decide to change the endpoint

	Route::get('/admin/posts', 'PostController@index')->name('post.index');
	Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');
    Route::delete('/admin/posts/{post}/delete', 'PostController@destroy')->name('post.destroy');
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');//here we check if the user can see the post

    Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');

    Route::get('admin/users/{user}/profile', 'UserController@show')->name('user.profile.show'); //the name is used with blade, we add {{route('the.name.of.route')}} to go to that specific route in html
});
