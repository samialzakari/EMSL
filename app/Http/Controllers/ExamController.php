<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = new Exam(request(['name','date']));
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
     * @return \Illuminate\Http\Response
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
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }

    public function select(Request $request){
        $exam = Exam::findOrFail(request('exam'));
        $mcqs = request('questions');
        foreach ($mcqs as $mcq){
            $exam->mcqs()->attach($mcq);
            $exam->save();
        }
        $exam->calculateMarks();
        return redirect('/exam');
    }


}
