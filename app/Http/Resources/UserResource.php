<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ExamCollection;

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
            'student_schedule' => $this->schedule(),
            'student_exams' => ExamResource::collection($this->exams),
        ];
    }
}
