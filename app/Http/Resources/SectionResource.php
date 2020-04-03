<?php

namespace App\Http\Resources;

use App\Course;
use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
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
            'section_id' => $this->id,
            'section_fm' => User::find($this->fm_id),
            'section_course' => Course::find($this->course_id),
        ];
    }
}
