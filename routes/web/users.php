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
Route::middleware('auth')->group(function(){
    Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');



    Route::delete('//users/{user}/delete', 'UserController@destroy')->name('user.destroy');
    Route::middleware(['can:view,user'])->group(function(){
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
    });
});

Route::middleware(['role:ADMIN', 'auth'])->group(function(){
    Route::get('/users', 'UserController@index')->name('users.index');
});

