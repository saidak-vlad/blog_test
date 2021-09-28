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
Route::get('/tag/{slug}', 'App\Http\Controllers\HomeController@tag')->name('tag.show');
Route::get('/category/{slug}', 'App\Http\Controllers\HomeController@category')->name('category.show');

Route::get('/register', 'App\Http\Controllers\AuthController@registerForm');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::get('/login', 'App\Http\Controllers\AuthController@loginForm');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

Route::get('/admin' , 'App\Http\Controllers\Admin\DashboardController@index');
Route::resource('/admin/categories' , 'App\Http\Controllers\Admin\CategoriesController');
Route::resource('/admin/tags' , 'App\Http\Controllers\Admin\TagsController');
Route::resource('/admin/posts', 'App\Http\Controllers\Admin\PostsController');


