<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name','department','num_chapters','cc_id'
    ];

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function coordinator(){
        return $this->hasOne(User::class,'cc_id');
    }

    public function mcqs(){
        return $this->hasMany(MCQ::class);
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }
}
