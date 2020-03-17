<?php

namespace App\Http\Resources;

use App\Course;
use Illuminate\Http\Resources\Json\JsonResource;

class MCQResource extends JsonResource
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
            'mcq_id' => $this->id,
            'question' => $this->question,
            'chapter_no' => $this->chapter_no,
            'mcq_mark' => $this->mark,
            'correct_answer' => $this->correct_answer,
            'option1' => $this->option1,
            'option2' => $this->option2,
            'option3' => $this->option3,
        ];
    }
}
