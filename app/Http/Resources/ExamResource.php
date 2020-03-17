<?php

namespace App\Http\Resources;

use App\Course;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'exam_mark' => $this->mark,
            'exam_mcqs' => MCQResource::collection( $this->mcqs ),
            'exam_course' => Course::find($this->course_id),
        ];
    }
}
