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

/* News */

// Mostra lista di risorse
Route::get('admin/news', 'Admin\NewController@index')->name('admin.news.index');
// Mostra form per creare nuova risorsa
Route::get('admin/news/create', 'Admin\NewController@create')->name('admin.news.create');
// Salvo nel database la risorsa
Route::post('admin/news', 'Admin\NewController@store')->name('admin.news.store');
// Mostra la singlola risorsa
Route::get('admin/news/{new}', 'Admin\NewController@show')->name('admin.news.show');
// Mostra un form per modificare la risorsa
Route::get('admin/news/{new}/edit', 'Admin\NewController@edit')->name('admin.news.edit');
// Aggiorniamo la risorda nel database
Route::put('admin/news/{new}', 'Admin\NewController@update')->name('admin.news.update');
// Cancello la risorsa
Route::delete('admin/news/{new}', 'Admin\NewController@destroy')->name('admin.news.destroy');

Route::get('/characters', function () {
    return view('characters');
})->name('characters');

Route::get('/comics', function () {
    return view('comics');
})->name('comics');

Route::get('/movies', function () {
    return view('movies');
})->name('movies');

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
