<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'fm_id','course_id'
    ];

    public function students(){
        return $this->belongsToMany(User::class,'section_student','section_id','student_id');
    }

    public function facultyMember(){
        return $this->belongsTo(User::class,'fm_id');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
