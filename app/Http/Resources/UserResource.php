<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserResource extends JsonResource
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
            'student_id' => $this->id,
            'student_name' => $this->name,
            'student_email' => $this->email,
            'student_sections' => SectionResource::collection(DB::table('section_student')->where('student_id',Auth::user()->id)),
            'student_exams' => ExamResource::collection(DB::table('exam_student')->where('student_id',Auth::user()->id)),
        ];
    }
}
