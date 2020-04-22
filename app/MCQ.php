<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCQ extends Model
{
    protected $fillable = ['question', 'chapter_no', 'mark','correct_answer','option1','option2','option3','option4','course_id'];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function exams(){
        return $this->belongsToMany(Exam::class,'exam_mcq','mcq_id','exam_id');
    }

}
