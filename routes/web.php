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
    return view('welcome');
});

Route::get('langues', 'LangueController@index');
Route::get('langues/create', 'LangueController@create');
Route::post('langues', 'LangueController@store');
Route::get('langues/{id}/edit', 'LangueController@edit');
Route::put('langues/{id}', 'LangueController@update');
Route::delete('langues/{id}', 'LangueController@destroy');

Route::resource('types', 'TypeController');

Route::resource('auteurs', 'AuteurController');

/*Route::get('auteurs', 'AuteurController@index');
Route::get('auteurs/create', 'AuteurController@create');
Route::post('auteurs', 'AuteurController@store');
Route::get('auteurs/{id}/edit', 'AuteurController@edit');
Route::put('auteurs/{id}', 'AuteurController@update');
Route::delete('auteurs/{id}', 'AuteurController@destroy');*/

//Route::get('auteurs/search', 'AuteurController@search');

Route::resource('editions', 'editionController');

Route::resource('ouvrages', 'ouvrageController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
