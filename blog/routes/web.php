<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/post/{slug}', 'App\Http\Controllers\HomeController@show')->name('post.show');

Route::get('/admin' , 'App\Http\Controllers\Admin\DashboardController@index');
Route::resource('/admin/categories' , 'App\Http\Controllers\Admin\CategoriesController');
Route::resource('/admin/tags' , 'App\Http\Controllers\Admin\TagsController');
Route::resource('/admin/posts', 'App\Http\Controllers\Admin\PostsController');


