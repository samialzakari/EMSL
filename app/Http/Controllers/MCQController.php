<?php

namespace App\Http\Controllers;

use App\MCQ;
use Illuminate\Http\Request;

class MCQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mcqs= MCQ::all();
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
        $mcq = new MCQ(request(['question','chapter_no','mark','correct_answer','option1','option2','option3']));
        $mcq->save();
       
        return redirect('/question/index');

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
    public function edit(MCQ $mCQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MCQ  $mCQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MCQ $mCQ)
    {
        //
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
