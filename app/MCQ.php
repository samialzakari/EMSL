<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCQ extends Model
{
    protected $fillable = ['question', 'chapter_no', 'mark','correct_answer','option1','option2','option3'];

}
