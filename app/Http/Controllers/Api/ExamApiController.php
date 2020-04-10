<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Exam;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExamCollection;
use App\Http\Resources\ExamResource;
use App\Http\Resources\MCQResource;
use Illuminate\Http\Request;

class ExamApiController extends Controller
{
    public function exam($id){
        $exam = Exam::findOrFail($id);
        return MCQResource::collection($exam->mcqs);
    }

    public function submit(Request $request){
        //
    }
}
