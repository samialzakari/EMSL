<?php

use App\Http\Resources\CourseCollection;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Api\UserApiController@login');

Route::get('/Student', 'StudentController@index')->name('Student')->middleware('Student');

Route::middleware(['auth:api', 'Student'])->group( function (){
    Route::post('logout','Api\UserApiController@logout');

});

Route::get('course', 'Api\CourseApiController@index');
Route::get('course/{id}','Api\CourseApiController@show');
Route::get('course/{id}/exams','Api\ExamApiController@index');
Route::get('exam/{id}','Api\ExamApiController@show');
Route::get('exam/{id}/questions','Api\MCQApiController@index');
//Route::get('section', 'Api\SectionApiController@index');
Route::get('section/{id}', 'Api\SectionApiController@show');
