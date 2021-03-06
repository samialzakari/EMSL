<?php

namespace App\Http\Controllers;

use App\Course;
use App\Exam;
use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class StudentController extends Controller
{
    public function index($id){
        $section = Section::findOrFail($id);
        $students = DB::table('section_student')->where('section_id',$section->id)->get();
        return view('section.student.index',[
            'students' => $students,
            'section' => $section,
            'course' => $section->course->name,
        ]);
    }

    public function show($id, $student_id){
        $section = Section::findOrFail($id);
        $course = Course::findOrFail($section->course_id);
        $student = User::findOrFail($student_id);
        $exams = $student->exams;
        $marks = null;
        if($exams){
            $exm = array();
            foreach ($exams as $exam){
                if($course->exams->contains($exam)){
                    $exm = Arr::add($exm,$exam->id,$exam->id);
                }
            }
            $exm = Arr::flatten($exm);
            $marks = DB::table('exam_student')->where('student_id',$student_id)
                ->whereIn('exam_id',$exm)->get();
        }

        $totMarks = DB::table('section_student')->where('section_id',$id)->where('student_id',$student_id)->value('mark');

        return view('section.student.show',[
            'course' => $course->name,
            'section' => $id,
            'student' => $student,
            'marks' => $marks,
            'totMarks' => $totMarks,
        ]);
    }

    public function export($id){
        $section = Section::findOrFail($id);
        $course = $section->course;
        $students = $section->students;
        $data = collect();
        $marks = null;
        foreach ($students as $student){
            $exams = $student->exams;
            $marks = null;
            if($exams){
                $exm = array();
                foreach ($exams as $exam){
                    if($course->exams->contains($exam)){
                        $exm = Arr::add($exm,$exam->id,$exam->id);
                    }
                }
                $exm = Arr::flatten($exm);
                $marks = DB::table('exam_student')->where('student_id',$student->id)
                    ->whereIn('exam_id',$exm)->get();
            }
            $totMarks = DB::table('section_student')->where('section_id',$id)->where('student_id',$student->id)->value('mark');

            $arr = [
                'id' => $student->id,
                'name' => $student->name,
            ];
            foreach ($marks as $mark){
                $examName = Exam::findOrFail($mark->exam_id)->name;
                $arr = Arr::add($arr,$examName,$mark->student_mark);
            }
            $arr = Arr::add($arr,'Total',$totMarks);
            $data->add($arr);
        }
        return (new FastExcel($data))->download('section'.$id.'.xlsx');
    }
}
