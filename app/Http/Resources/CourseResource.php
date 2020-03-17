<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'course_id' => $this->id,
            'course_name' => $this->name,
            'course_department' => $this->department,
            'course_chapters' => $this->num_chapters,
            'course_coordinator' => User::find($this->cc_id),
            'course_sections' => SectionResource::collection( $this->sections ),
            'course_exams' => ExamResource::collection( $this->exams ),
        ];
    }
}
