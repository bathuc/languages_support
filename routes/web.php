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

Route::match(['get', 'post'], '/words', 'EnglishController@words')->name('words');
Route::post('/random-word', 'EnglishController@getRandomWord')->name('word.random');
Route::get('/phrases', 'EnglishController@phrases')->name('phrases');
Route::post('/random-phrases', 'EnglishController@getRandomPhrase')->name('phrases.random');

Route::get('/tenses', 'EnglishController@tenses')->name('tenses');
Route::post('/tenses', 'EnglishController@tenses')->name('tenses');
Route::post('/grammarRandom', 'EnglishController@grammarRandom')->name('tenses.grammar.random');
Route::get('/tenses/detail/{id}', 'EnglishController@tenseDetail')->name('tense.detail');


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
        Route::match(['get', 'post'], '/', 'AdminController@words')->name('admin.words');
        Route::match(['get', 'post'], '/new', 'AdminController@wordNew')->name('admin.words.new');
        Route::post('/coundword', 'AdminController@coundWord')->name('admin.words.coundWord');

        Route::match(['get', 'post'], '/edit/{id}', 'AdminController@wordEdit')->name('admin.words.edit');
    });

    Route::group(['prefix' => 'phrases'], function () {
        Route::get('/', 'AdminController@phrases')->name('admin.phrases');
        Route::get('/new', 'AdminController@phrasesNew')->name('admin.phrases.new');
        Route::post('/new', 'AdminController@phrasesNew')->name('admin.phrases.new');
        Route::post('/coundword', 'AdminController@coundPhrase')->name('admin.phrases.coundPhrase');

        Route::get('/edit/{id}', 'AdminController@phrasesEdit')->name('admin.phrases.edit');
        Route::post('/edit/{id}', 'AdminController@phrasesEdit')->name('admin.phrases.edit');
    });

    Route::group(['prefix' => 'subject'], function () {
        Route::get('/', 'AdminController@subject')->name('admin.subject');
        Route::get('/new', 'AdminController@subjectNew')->name('admin.subject.new');
        Route::post('/new', 'AdminController@subjectNew')->name('admin.subject.new');
        Route::post('/coundsubject', 'AdminController@coundSubject')->name('admin.subject.coundsubject');

        Route::get('/edit/{id}', 'AdminController@subjectEdit')->name('admin.subject.edit');
        Route::post('/edit/{id}', 'AdminController@subjectEdit')->name('admin.subject.edit');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'AdminController@user')->name('admin.user');
        Route::get('/new', 'AdminController@userNew')->name('admin.user.new');
        Route::post('/new', 'AdminController@userNew')->name('admin.user.new');
        Route::post('/counduser', 'AdminController@coundUser')->name('admin.user.counduser');
        Route::post('/lockuser', 'AdminController@lockUser')->name('admin.user.lock.user');

        Route::get('/edit/{id}', 'AdminController@userEdit')->name('admin.user.edit');
        Route::post('/edit/{id}', 'AdminController@userEdit')->name('admin.user.edit');
    });

});
