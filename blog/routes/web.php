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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('/profile', 'App\Http\Controllers\ProfileController@store');
    Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
    Route::post('/comment', 'App\Http\Controllers\CommentsController@store');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'App\Http\Controllers\AuthController@registerForm');
    Route::post('/register', 'App\Http\Controllers\AuthController@register');
    Route::get('/login', 'App\Http\Controllers\AuthController@loginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::get('/admin.login', 'App\Http\Controllers\AuthController@loginAdminForm')->name('login.admin');
    Route::post('/admin.login', 'App\Http\Controllers\AuthController@loginAdmin');

});

Route::group(['middleware' => 'admin'], function () {


    Route::resource('/admin/categories', 'App\Http\Controllers\Admin\CategoriesController');
    Route::resource('/admin/tags', 'App\Http\Controllers\Admin\TagsController');
    Route::resource('/admin/posts', 'App\Http\Controllers\Admin\PostsController');
    Route::get('/admin/comments','App\Http\Controllers\Admin\CommentsController@index');
    Route::get('/admin/comments/toggle/{id}','App\Http\Controllers\Admin\CommentsController@toggle');
    Route::delete('/admin/comments/{id}/destroy','App\Http\Controllers\Admin\CommentsController@destroy')->name('comments.destroy');


});
