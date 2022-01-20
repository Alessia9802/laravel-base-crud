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

Route::get('/', function () {
    $series = config('db');
    /* var_dump($series); */
    return view('welcome', compact('series'));
})->name('welcome');

Route::get('/', 'PostController@index' )->name('welcome');

/* articles */

// Mostra lista di risorse
Route::get('admin/articles', 'Admin\ArticleController@index')->name('admin.articles.index');
// Mostra form per creare nuova risorsa
Route::get('admin/articles/create', 'Admin\ArticleController@create')->name('admin.articles.create');
// Salvo nel database la risorsa
Route::post('admin/articles', 'Admin\ArticleController@store')->name('admin.articles.store');
// Mostra la singlola risorsa
Route::get('admin/articles/{article}', 'Admin\ArticleController@show')->name('admin.articles.show');
// Mostra un form per modificare la risorsa
Route::get('admin/articles/{article}/edit', 'Admin\ArticleController@edit')->name('admin.articles.edit');
// Aggiorniamo la risorda nel database
Route::put('admin/articles/{article}', 'Admin\ArticleController@update')->name('admin.articles.update');
// Cancello la risorsa
Route::delete('admin/articles/{article}', 'Admin\ArticleController@destroy')->name('admin.articles.destroy');

Route::get('/characters', function () {
    return view('characters');
})->name('characters');

Route::get('/comics', function () {
    return view('comics');
})->name('comics');

Route::get('/movies', function () {
    return view('movies');
})->name('movies'); 

/* Route::resource('movies', 'MovieController'); */

Route::get('/tv', function () {
    return view('tv');
})->name('tv');

Route::get('/games', function () {
    return view('games');
})->name('games');

Route::get('/collectibles', function () {
    return view('collectibles');
})->name('collectibles');

Route::get('/videos', function () {
    return view('videos');
})->name('videos');

Route::get('/fans', function () {
    return view('fans');
})->name('fans');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');
