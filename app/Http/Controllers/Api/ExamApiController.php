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
    public function exam($id){
        $exam = Exam::findOrFail($id);
//        return MCQResource::collection($exam->mcqs);
        $courses = array();
        foreach (Auth::user()->enroll as $section){
            $courses = Arr::add($courses,$section->course->id,$section->course->id);
            $courses = Arr::flatten();
        }
        if( array_key_exists($exam->course_id,$courses)){
            return response()->json([
                'exam_id' => $exam->id,
                'exam_name' => $exam->name,
                'exam_mark' => $exam->mark,
                'exam_duration' => $exam->duration,
                'exam_mcqs' => MCQResource::collection($exam->mcqs),
            ]);
        }else{
            return response()->json('Sorry the student could not enter the exam', 401 );
        }

    }

    public function submit(Request $request){

    }
}
