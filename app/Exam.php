<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name','mark','date'
    ];

    public function mcqs(){
        return $this->belongsToMany(MCQ::class,'exam_mcq','exam_id','mcq_id');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function students(){
        return $this->belongsToMany(User::class,'exam_student');
    }
}
