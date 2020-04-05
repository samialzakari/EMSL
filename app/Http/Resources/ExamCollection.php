<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'exam_id' => $this->id,
            'exam_name' => $this->name,
            'exam_mark' => $this->mark,
            'exam_date' => $this->date,
            'exam_course' => $this->course->name,
        ];
    }
}
