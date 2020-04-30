<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Exam;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExamCollection;
use App\Http\Resources\ExamResource;
use App\Http\Resources\MCQResource;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ExamApiController extends Controller
{
    /**
     * return the exam to the student
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function exam($id){
        $exam = Exam::findOrFail($id);

        return response()->json([
            'exam_id' => $exam->id,
            'exam_name' => $exam->name,
            'exam_mark' => $exam->mark,
            'exam_duration' => $exam->duration,
            'exam_mcqs' => MCQResource::collection($exam->mcqs),
        ]);
    }

    public function submit(Request $request){

    }
}
