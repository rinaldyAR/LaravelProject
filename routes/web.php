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

Route::get('/question', 'QuestionController@index'); // menampilkan semua
Route::post('question', 'QuestionController@store'); // menyimpan data
Route::get('/question/create', 'QuestionController@create'); // menampilkan halaman form

Route::get('/question/{answer_id}', 'answerController@index'); // menampilkan form jawaban