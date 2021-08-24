<?php
use Illuminate\Support\Facades\Route;

Route::get('/comments', 'PostCommentsController@index')->name('comments.index');
Route::post('/comments/store', 'PostCommentsController@store')->name('comments.store');
Route::get('/comments/{comment}/edit', 'PostCommentsController@edit')->name('comments.edit');
Route::delete('/comments/{comment}/delete', 'PostCommentsController@destroy')->name('comments.destroy');

Route::post('/replies/store', 'CommentRepliesController@store')->name('reply.store');
