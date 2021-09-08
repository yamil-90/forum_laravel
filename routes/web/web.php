<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::get('/api/hi',  'hello@hello')->name('hello');

Route::middleware('auth')->group(function(){
	Route::get('/admin', [\App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index'); // this will change the name of the route acordingly if we decide to change the endpoint
     //the name is used with blade, we add {{route('the.name.of.route')}} to go to that specific route in html
});
