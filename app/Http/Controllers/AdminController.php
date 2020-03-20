<?php

namespace App\Http\Controllers;

use App\Course;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function course_index(){
        $courses = Course::all();
        return view('admin.course_index', ['courses' => $courses]);
    }

    public function course_create(Request $request){
        $cc = User::findOrFail(request('cc_id'));
        $cc->role = 1;
        $course = new Course($request->all());
        $course->save();

        return redirect('/admin/course');
    }

    public function section_index($id){
        $course = Course::findOrFail($id);
        $cc = User::findOrFail($course->cc_id);
        $sections = $course->sections;
        return view('admin.section_index', compact(['course','sections','cc']));
    }

    public function section_create(Request $request){
        $section = new Section($request->all());
        $section->save();
        return redirect('/admin/course/'.request('course_id'));
    }

    public function fm_index(){
        $fms = User::whereIn('role', ['1','2'])->get();
        return view('admin.fm_index', ['fms' => $fms]);
    }

    public function fm_create(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $fm = new User(request(['name','email']));
        $fm->password = Hash::make(request('password'));
        $fm->role = 2;
        $fm->save();

        return redirect('/admin/fm');
    }

    public function student_index(){
        $students = User::where('role','3')->get();
        return view('admin.student_index', compact('students'));
    }

    public function student_create(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $student = new User(request(['name','email']));
        $student->password = Hash::make(request('password'));
        $student->role = 3;
        $student->save();

        return redirect('/admin/student');
    }

    public function student_show($id){
        $student = User::findOrFail($id);
        $sections = $student->enroll;
        return view('admin.student_show', compact(['student','sections']));
    }

    public function student_section(Request $request){
        $student = User::findOrFail(request('student_id'));
        $sections = request('sections');
        foreach ($sections as $section){
            $student->enroll()->attach($section);
            $student->save();
        }
        return redirect('/admin/student/'.$student->id);
    }
}
