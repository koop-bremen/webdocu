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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/places', 'PlacesController@index');
Route::post('/places', 'PlacesController@store');
Route::delete('/places/{id}', 'PlacesController@destroy');
Route::put('/places/{id}', 'PlacesController@update');

Route::get('/tags', 'TagsController@index');
Route::post('/tags', 'TagsController@store');
Route::delete('/tags/{id}', 'TagsController@destroy');
Route::put('/tags/{id}', 'TagsController@update');

Route::get('/persons', 'PersonsController@index');
Route::post('/persons', 'PersonsController@store');
Route::delete('/persons/{id}', 'PersonsController@destroy');
Route::put('/persons/{id}', 'PersonsController@update');

Route::get('/authors', 'AuthorsController@index');
Route::post('/authors', 'AuthorsController@store');
Route::delete('/authors/{id}', 'AuthorsController@destroy');
Route::put('/authors/{id}', 'AuthorsController@update');

Route::get('/audios', 'AudiosController@index');
Route::post('/audios', 'AudiosController@store');
Route::delete('/audios/{id}', 'AudiosController@destroy');
Route::put('/audios/{id}', 'AudiosController@update');