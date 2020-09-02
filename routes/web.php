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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');

Route::get('/dashboard', 'PagesController@index');

Route::resource('posts', 'PostsController');
Route::get('search', 'SearchController@post')->name('search.posts');
Route::get('posts/categories/{category:slug}', 'CategoriesController@show');
Route::get('posts/tags/{tag:slug}', 'TagsController@show');

Auth::routes();

