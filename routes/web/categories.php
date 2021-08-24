<?php
use Illuminate\Support\Facades\Route;

Route::get('/categories', 'CategoriesController@index')->name('categories.index');
Route::post('/categories/create', 'CategoriesController@create')->name('categories.create');
Route::get('/categories/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
Route::delete('/categories/{category}/delete', 'CategoriesController@destroy')->name('categories.destroy');
