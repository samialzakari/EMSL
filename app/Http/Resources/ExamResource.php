<?php

namespace App\Http\Resources;

use App\Course;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'exam_id' => $this->id,
            'exam_name' => $this->name,
            'exam_date' => $this->date,
            'exam_mark' => $this->mark,
            'student_mark' => DB::table('exam_student')->where([
                ['exam_id',$this->id],
                ['student_id', Auth::id()]
            ])->value('student_mark'),
            'exam_course' => Course::find($this->course_id)->name,
        ];
    }
}
