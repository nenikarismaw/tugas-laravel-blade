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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/master', function () {
//     return view('layout.master');
// });

// Route::get('/items', function () {
//     return view('items.index');
// });

// Route::get('/items/create', function () {
//     return view('items.create');
// });

Route::get('/', 'DataController@index');
Route::get('/data-tables', 'DataController@tables');

// Route::get('/pertanyaan', 'PertanyaanController@index');
// Route::get('/pertanyaan/create', 'PertanyaanController@create');
// Route::post('/pertanyaan', 'PertanyaanController@store');
// Route::get('/pertanyaan/{id}', 'PertanyaanController@show');
// Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');
// Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
// Route::delete('pertanyaan/{id}', 'PertanyaanController@destroy');

Route::resource('pertanyaan', 'PertanyaanController'); 