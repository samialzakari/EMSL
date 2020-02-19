<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function students(){
        return $this->belongsToMany(User::class,'section_student');
    }

    public function facultyMember(){
        return $this->belongsTo(User::class,'fm_id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
