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
        $cc->save();
        $course = new Course($request->all());
        $course->save();

        return redirect('/admin/course');
    }

    public function course_update(Request $request, $id){
        $course = Course::findOrFail($id);
        if($course->coordinator->id !== $request->get('cc_id')){
            $course->coordinator->role = 2;
            $course->coordinator->save();
            $cc = User::findOrFail(request('cc_id'));
            $cc->role = 1;
            $cc->save();
        }
        $course->update($request->all());
        return redirect('/admin/course/'.$id);
    }

    public function course_destroy($id){
        $course = Course::findOrFail($id);
        $course->coordinator->role = 2;
        $course->coordinator->save();
        $course->delete();
        return redirect('/admin/course');
    }

    public function section_index($id){
        $course = Course::findOrFail($id);
        $cc = User::findOrFail($course->cc_id);
        $sections = $course->sections;
        return view('admin.section_index', compact(['course','sections','cc']));
    }

    public function section_show($id){
        $section = Section::findOrFail($id);
        $course = $section->course;
        $fms = User::whereIn('role',['1','2'])->get();
        return view('admin.section_show',compact(['section','course','fms']));
    }

    public function section_create(Request $request){
        $section = new Section($request->all());
        $section->save();
        return redirect('/admin/course/'.request('course_id'));
    }

    public function section_update($id){
        $section = Section::findOrFail($id);
        $section->update(request()->all());
        return redirect('/admin/course/'.request('course_id'));
    }

    public function section_destroy($id){
        $section = Section::findOrFail($id);
        $course = $section->course->id;
        $section->delete();
        return redirect('/admin/course/'.$course);
    }

    public function fm_index(){
        $fms = User::whereIn('role', ['1','2'])->get();
        return view('admin.fm_index', ['fms' => $fms]);
    }

    public function fm_show($id){
        $fm = User::findOrFail($id);
        $sections = $fm->teach;
        return view('admin.fm_show',compact(['fm','sections']));
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

    public function fm_update(Request $request, $id){
        $fm = User::findOrFail($id);
        $fm->update($request->all());
        $fm->password = Hash::make(request('password'));
        $fm->save();
        return redirect('/admin/fm/'.$id);
    }

    public function fm_destroy($id){
        $fm = User::findOrFail($id);
        $fm->delete();
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
//        $success['token'] =  $student->createToken('MyApp')-> accessToken;
//        $success['name'] =  $student->name;
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
        if(! $sections == null){
            foreach ($sections as $section){
                $student->enroll()->attach($section);
                $student->save();
            }
        }
        $unroll = request('unroll');
        if(! $unroll == null){
            foreach ($unroll as $unr){
                $student->enroll()->detach($unr);
                $student->save();
            }
        }
        return redirect('/admin/student/'.$student->id);
    }

    public function student_update(Request $request, $id){
        $student = User::findOrFail($id);
        $student->update($request->all());
        $student->password = Hash::make(request('password'));
        $student->save();
        return redirect('admin/student/'.$id);
    }

    public function student_destroy($id){
        $student = User::findOrFail($id);
        $student->delete();
        return redirect('admin/student');
    }
}
