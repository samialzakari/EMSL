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
