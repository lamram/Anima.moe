<?php

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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'UserController@showProfile');

Route::get('/download/{anime}', 'AnimeController@insertAnime');

Route::get('list', 'ListController@getAnimeList');
Route::get('watch/{anime}/{episode}', 'EpisodeController@getEpisode');
Route::get('anime/{anime}', 'AnimeController@getEpisodeList');

Auth::routes();

