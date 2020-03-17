<?php

namespace App\Http\Controllers\Api;

use App\Exam;
use App\Http\Resources\MCQCollection;
use App\MCQ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MCQApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $exam = Exam::findOrFail($id);
        $mcqs= $exam->mcqs;
        return new MCQCollection($mcqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MCQ  $mCQ
     * @return \Illuminate\Http\Response
     */
    public function show(MCQ $mCQ)
    {
        //
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
    public function destroy(MCQ $mCQ)
    {
        //
    }
}
