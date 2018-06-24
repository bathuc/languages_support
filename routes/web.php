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

Route::get('/hiragana', 'JapanController@hiragana');
Route::post('/hiragana', 'JapanController@hiragana');
Route::get('/katakana', 'JapanController@katakana');
Route::post('/katakana', 'JapanController@katakana');
