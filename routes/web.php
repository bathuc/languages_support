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

Route::get('/', 'JapanController@index')->name('index');
Route::get('/hiragana', 'JapanController@hiragana')->name('hiragana');
Route::post('/hiragana', 'JapanController@hiragana')->name('hiragana');
Route::post('/hiraRandom', 'JapanController@getHiraganaRandom')->name('hiragana.random');

Route::get('/katakana', 'JapanController@katakana')->name('katakana');
Route::post('/katakana', 'JapanController@katakana')->name('katakana');
Route::post('/kanaRandom', 'JapanController@getKatakanaRandom')->name('katakana.random');

Route::get('/words', 'EnglishController@words')->name('words');
Route::post('/words', 'EnglishController@words')->name('words');
Route::get('/phrases', 'EnglishController@phrases')->name('phrases');

Route::get('/tenses', 'EnglishController@tenses')->name('tenses');
Route::post('/tenses', 'EnglishController@tenses')->name('tenses');
Route::post('/grammarRandom', 'EnglishController@grammarRandom')->name('tenses.grammar.random');
Route::get('/tenses/detail/{id}', 'EnglishController@tenseDetail')->name('tense.detail');

Route::post('/phrases', 'EnglishController@phrases')->name('phrases');

Route::get('/generatejs', 'CodeController@generateJs')->name('code.generate.js');
Route::post('/generatejs', 'CodeController@generateJs')->name('code.generate.js');
Route::post('/insert-row-js', 'CodeController@insertRowJs')->name('code.insert.row.js');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('/login', 'AdminController@login')->name('admin.login');
    Route::post('/login', 'AdminController@login')->name('admin.login');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::group(['prefix' => 'words'], function () {
        Route::get('/', 'AdminController@words')->name('admin.words');
        Route::get('/new', 'AdminController@wordNew')->name('admin.words.new');
        Route::post('/new', 'AdminController@wordNew')->name('admin.words.new');
        Route::post('/coundword', 'AdminController@coundWord')->name('admin.words.coundWord');

        Route::get('/edit/{id}', 'AdminController@wordEdit')->name('admin.words.edit');
        Route::post('/edit/{id}', 'AdminController@wordEdit')->name('admin.words.edit');
    });


    Route::get('/phrases', 'AdminController@phrases')->name('admin.phrases');

});
