<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
        return $this->belongsToMany(Section::class,'section_student');
    }

    public function teach(){
        return $this->hasMany(Section::class,'fm_id');
    }

    public function coordinate(){
        return $this->hasOne(Course::class,'cc_id');
    }

    public function exams(){
        return $this->belongsToMany(Exam::class,'exam_student');
    }
}
