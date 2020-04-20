<?php

namespace App\Http\Controllers;

use App\MCQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MCQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $mcqs= MCQ::all();
        $mcqs = MCQ::where('course_id', Auth::user()->coordinate->id)->get();
        return view('/question.index')->with('mcqs', $mcqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.addQuestion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mcq = new MCQ(request(['question','chapter_no','mark','correct_answer','option1','option2','option3','course_id']));
        $mcq->save();

        return redirect('/question/index',201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MCQ  $mCQ
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // return view('question.show', ['mcq' => $mcq]);
        return view('question.show', ['mcq' => MCQ::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MCQ  $mCQ
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('question.edit',['mcq' => MCQ::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MCQ  $mCQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mcq = MCQ::findOrFail($id);

        $mcq->update(request()->validate([
            'question'=> 'required',
            'chapter_no' => 'required',
            'mark' => 'required',
            'correct_answer' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'course_id' => 'required'
        ]));

        return redirect('/question/'.$mcq->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MCQ  $mCQ
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mcq= MCQ::findOrFail($id);
        $mcq->delete();
        return redirect('/question/index');

    }
}
