<?php

namespace App\Http\Controllers;

use App\Course;
use App\Exam;
use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $exams= Exam::all();
        $exams = Exam::where('course_id', Auth::user()->coordinate->id)->get();
        return view('/exam.index')->with('exams', $exams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $num_chapters = Auth::user()->coordinate->num_chapters;
        return view('exam.create',[
            'num_chapters' => $num_chapters
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $exam = new Exam(request(['name','date','duration']));
        $exam->mark = 0;
        $exam->course_id = Auth::user()->coordinate->id;
        $exam->save();

        $chapters = request('num_chapters');

        $mcqs = DB::table('m_c_q_s')->where('course_id',$exam->course_id)
            ->whereIn('chapter_no',$chapters)->get();

        return view('exam.questions',[
            'mcqs' => $mcqs,
            'exam' => $exam
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        return view('exam.show',[
            'exam' => $exam
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update(request(['name','date','duration']));
        $mcqs = $request->get('questions');
        if($mcqs !== null){
            foreach ($mcqs as $mcq){
                $exam->mcqs()->detach($mcq);
                $exam->save();
            }
            $exam->calculateMarks();
        }

        return redirect('/exam/'.$id);
    }

    public function addMCQS($id){
        $exam = Exam::findOrFail($id);
        $course = $exam->course;
        $mcqs = $course->mcqs->diff($exam->mcqs);
        return view('exam.add',compact(['exam','mcqs']));
    }

    public function add(Request $request, $id){
        $exam = Exam::findOrFail($id);
        $mcqs = request('questions');
        foreach ($mcqs as $mcq){
            $exam->mcqs()->attach($mcq);
            $exam->save();
        }
        $exam->calculateMarks();
        return redirect('/exam/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return redirect('/exam');
    }

    public function select(Request $request){
        $exam = Exam::findOrFail(request('exam'));
        $mcqs = request('questions');
        foreach ($mcqs as $mcq){
            $exam->mcqs()->attach($mcq);
            $exam->save();
        }
        $exam->calculateMarks();
        return redirect('/exam/'.$exam->id);
    }

    public function section_index($id){
        $section = Section::findOrFail($id);
        $course = Course::findOrFail($section->course->id);
        return view('section.exam.index',[
            'section' => $section,
            'course' => $course->name,
            'exams' => $course->exams->sortByDesc('date'),
        ]);
    }

    public function section_show($id, $exam_id){
        $exam = Exam::findOrFail($exam_id);
        $section = Section::findOrFail($id);
        $students = $section->students;
        $marks = null;
        if($students){
            $stu = array();
            foreach ($students as $student){
                if($exam->students->contains($student)) {$stu = Arr::add($stu,$student->id,$student->id);}
            }
            $stu = Arr::flatten($stu);
            $marks = DB::table('exam_student')->where('exam_id',$exam_id)->whereIn('student_id',$stu)->get();
        }
        $isTaken = ($marks->isEmpty()) ? false : true;
        $avg = 0; $max = 0; $min = 0;
        if($isTaken){
            $avg = $marks->avg('student_mark');
            $max = $marks->max('student_mark');
            $min = $marks->min('student_mark');
        }
        return view('section.exam.show', [
            'isTaken' => $isTaken,
            'section' => $section->id,
            'exam' => $exam,
            'avg' => $avg,
            'max' => $max,
            'min' => $min,
        ]);
    }

    public function open($id,$exam_id){
        $url = '/section/'.$id.'/exam/'.$exam_id;
        return view('section.exam.open',['exam' => $exam_id, 'url' => $url]);
    }


}
