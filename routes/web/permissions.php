<?php
use Illuminate\Support\Facades\Route;

Route::get('/permissions', 'PermissionController@index')->name('permissions.index');
Route::get('/permissions/store', 'PermissionController@store')->name('permissions.store');
