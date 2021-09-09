<?php

use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;

Route::get('/comments', [PostCommentsController::class, 'index'])->name('comments.index');
Route::post('/comments/store', [PostCommentsController::class, 'store'])->name('comments.store');
Route::get('/comments/{comment}/edit', [PostCommentsController::class, 'edit'])->name('comments.edit');
Route::patch('/comments/{comment}/update', [PostCommentsController::class, 'update'])->name('comments.update');

Route::delete('/comments/{comment}/delete', [PostCommentsController::class, 'destroy'])->name('comments.destroy');

Route::post('/replies/store', [PostCommentsController::class, 'store'])->name('reply.store');
