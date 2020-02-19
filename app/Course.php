<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function coordinator(){
        return $this->hasOne(User::class);
    }

    public function mcqs(){
        return $this->hasMany(MCQ::class);
    }
}
