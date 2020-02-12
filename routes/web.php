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

// Route::get('/grade', function(){
//     return view('/grade');
// })->name('grade');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/grade', 'ExamController@index');

// Route::get('/question/addQuestion', 'MCQController@index');




Route::get('/schedule', function(){
         return view('/schedule'); });




Route::get('/question/index', 'MCQController@index');
Route::post('/question/addQuestion', 'MCQController@store');
Route::get('/question/addQuestion', 'MCQController@create'); 
Route::get('/question/{id}', 'MCQController@show');
Route::delete('/question/{id}/delete', 'MCQController@destroy');





