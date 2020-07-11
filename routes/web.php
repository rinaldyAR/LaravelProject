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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/question', 'QuestionController@index'); // menampilkan semua
Route::post('question', 'QuestionController@store'); // menyimpan data
Route::get('/question/create', 'QuestionController@create'); // menampilkan halaman form
Route::get('/question/{id}', 'QuestionController@show'); // menampilkan pertanyaan dan jawaban
Route::get('/question/{id}/edit', 'QuestionController@edit'); // menampilkan form untuk edit pertanyaan
Route::put('/question/{id}', 'QuestionController@update'); // menyimpan perubahan dari form edit
Route::delete('/question/{id}', 'QuestionController@destroy'); // menghapus data dengan id

Route::get('/answer/{question_id}', 'AnswerController@index'); // menampilkan form jawaban
Route::post('/answer/{question_id}', 'AnswerController@store'); // menyimpan jawaban

Route::resource('categories', 'CategoryController'); 



