<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\StaticController@index')->name('index');
Route::get('/articles/add', 'App\Http\Controllers\ArticleController@create')->name('add_article');
Route::post('/articles/add', 'App\Http\Controllers\ArticleController@store')->name('add_article_store');
Route::get('/articles/{id}', 'App\Http\Controllers\ArticleController@show')->name('show_article');
Route::get('/articles/{id}/edit', 'App\Http\Controllers\ArticleController@edit')->name('edit_article');
Route::put('/articles/{id}/edit', 'App\Http\Controllers\ArticleController@update')->name('update_article');
Route::delete('/articles/{id}/delete', 'App\Http\Controllers\ArticleController@destroy')->name('delete_article');

Route::post('/comment/add/{id}', 'App\Http\Controllers\CommentController@store')->name('add_comment');
Route::delete('{article_id}/comment/{id}/delete', 'App\Http\Controllers\CommentController@destroy')->name('delete_comment');

Route::get('/about-us', 'App\Http\Controllers\StaticController@about')->name('about');
Route::get('/blog', 'App\Http\Controllers\BlogController@showPage')->name('blog');
Route::get('/public/shop', 'App\Http\Controllers\ShopController@index')->name('shop');
Route::get('/public/shop/{id}', 'App\Http\Controllers\ShopController@show')->name('show_product');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
