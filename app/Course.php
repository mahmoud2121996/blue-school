<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    protected $fillable = [
        'name', 'credit_hours', 'description'
    ];

    public function students (){
        return $this->belongsToMany(User::class,'enrollments','course_id','user_id')->withTimestamps();
    }
}
