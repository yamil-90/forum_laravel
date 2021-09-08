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


Route::get('/post/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post');
Route::get('/postbycategory/{category}', [\App\Http\Controllers\PostController::class, 'showByCategory'])->name('post.by.category');
Route::middleware('auth')->group(function(){
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
	Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');

    Route::delete('/posts/{post}/delete', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->middleware('can:view,post')->name('post.edit');//here we check if the user can see the post
    Route::patch('/posts/{post}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
});
