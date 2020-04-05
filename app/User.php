<?php

namespace App;

use App\Http\Resources\ExamCollection;
use App\Http\Resources\ExamResource;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function enroll(){
        return $this->belongsToMany(Section::class,'section_student','student_id','section_id');
    }

    public function teach(){
        return $this->hasMany(Section::class,'fm_id');
    }

    public function coordinate(){
        return $this->hasOne(Course::class,'cc_id');
    }

    public function exams(){
        return $this->belongsToMany(Exam::class,'exam_student','student_id','exam_id');
    }

    public function schedule(){
        $sections = $this->enroll;
        $courses = array();
        foreach ($sections as $section){
            $course = Course::find($section->course_id);
            $courses = Arr::add($courses, $course->id, $course);
        }
        $exams = array();
        foreach ($courses as $course){
            $courseExams = $course->exams;
            $exams = Arr::add($exams,$course->id, $courseExams);
        }
        $exams = Arr::flatten($exams);
        $test = array();
        foreach ($exams as $exam){
            $testexam = new ExamCollection($exam);
            $test = Arr::add($test,$exam->id,$testexam);
        }
        $test = Arr::flatten($test);
        return $test;
    }
}
