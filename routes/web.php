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

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/CC', 'CourseCoordinatorController@index')->name('CC')->middleware('CourseCoordinator');
Route::get('/FM', 'SectionController@index')->name('FM')->middleware('FacultyMember');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/schedule', function(){
         return view('/schedule'); });


Route::middleware('CourseCoordinator')->group( function (){
    Route::get('/question/index', 'MCQController@index');
    Route::post('/question/addQuestion', 'MCQController@store');
    Route::get('/question/addQuestion', 'MCQController@create');
    Route::get('/question/{id}', 'MCQController@show');
    Route::delete('/question/{id}', 'MCQController@destroy');
    Route::get('/question/{id}/edit', 'MCQController@edit');
    Route::put('/question/{id}/edit', 'MCQController@update');


    Route::get('/exam', 'ExamController@index');
    Route::post('/exam', 'ExamController@select');
    Route::get('/exam/create', 'ExamController@create');
    Route::post('/exam/create', 'ExamController@store');
    Route::get('/exam/{id}', 'ExamController@show');
    Route::get('/exam/{id}/edit', function ($id){
        return view('exam.edit',['exam' => \App\Exam::findOrFail($id)]);
    });
    Route::put('/exam/{id}','ExamController@update');
    Route::delete('/exam/{id}', 'ExamController@destroy');
    Route::get('/exam/{id}/add', 'ExamController@addMCQS');
    Route::post('/exam/{id}','ExamController@add');
});


Route::middleware('admin')->group( function (){
    Route::get('/admin', 'AdminController@index');

    Route::get('/admin/course','AdminController@course_index');
    Route::view('/admin/course/create','admin.course_create',['fms' => User::where('role','2')->get()]);
    Route::post('/admin/course','AdminController@course_create');

    Route::get('/admin/course/{id}', 'AdminController@section_index');
    Route::get('/admin/course/{id}/create', function ($id){
        return view('admin.section_create',[
            'course' => \App\Course::find($id),
            'fms' => User::whereIn('role',['1','2'])->get(),
        ]);
    });
    Route::post('/admin/course/{id}', 'AdminController@section_create');
    Route::get('/admin/course/{id}/edit', function ($id){
        return view('admin.course_edit', ['fms' => User::where('role','2')->get(),'course' => \App\Course::find($id)]);
    });
    Route::put('/admin/course/{id}','AdminController@course_update');
    Route::delete('/admin/course/{id}','AdminController@course_destroy');

    Route::get('/admin/fm','AdminController@fm_index');
    Route::view('/admin/fm/create','admin.fm_create');
    Route::post('/admin/fm','AdminController@fm_create');
    Route::get('/admin/fm/{id}','AdminController@fm_show');
    Route::get('/admin/fm/{id}/edit', function ($id){
       return view('admin.fm_edit',['fm' => User::findOrFail($id)]);
    });
    Route::put('/admin/fm/{id}','AdminController@fm_update');
    Route::delete('/admin/fm/{id}','AdminController@fm_destroy');

    Route::get('/admin/student','AdminController@student_index');
    Route::view('/admin/student/create','admin.student_create');
    Route::post('/admin/student','AdminController@student_create');
    Route::get('/admin/student/{id}', 'AdminController@student_show');
    Route::get('/admin/student/{id}/section', function ($id){
        $student = User::findOrFail($id);
        return view('admin.student_section',[
            'student' => $student,
            'sections' => \App\Section::all()->sortBy('course_id')->diff($student->enroll)
        ]);
    });
    Route::post('/admin/student/{id}', 'AdminController@student_section');
    Route::get('/admin/student/{id}/edit', function ($id){
        return view('admin.student_edit',['student' => User::findOrFail($id)]);
    });
    Route::put('/admin/student/{id}','AdminController@student_update');
    Route::delete('/admin/student/{id}', 'AdminController@student_destroy');

    Route::get('/admin/section/{id}','AdminController@section_show');
    Route::post('/admin/section/{id}','AdminController@section_update');
    Route::delete('/admin/section/{id}','AdminController@section_destroy');
});


//Route::get('/section', 'SectionController@index');
Route::get('/section/{id}', 'SectionController@show');
Route::get('/section/{id}/exam', 'ExamController@section_index');
Route::get('/section/{id}/exam/{exam_id}', 'ExamController@section_show');
Route::get('/section/{id}/exam/{exam_id}/qrcode', 'ExamController@open');
Route::get('/section/{id}/student', 'StudentController@index');
Route::get('/section/{id}/student/{student_id}','StudentController@show');
