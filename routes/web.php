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

Route::get('/articles', 'ArticleController@show')->name('article_list');
Route::get('/addArticle', 'ArticleController@addArticle')->name('article_add');
Route::post('/addArticle', 'ArticleController@saveArticle')->name('article_save');
Route::get('/article/edit/{id}', 'ArticleController@editArticle')->name('article_edit');
Route::post('/article/edit/{id}', 'ArticleController@updateArticle')->name('article_update');
Route::get('/article/delete/{id}', 'ArticleController@deleteArticle')->name('article_delete');

Route::get('/', function () {
    return view('welcome');
});