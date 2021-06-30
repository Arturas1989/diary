<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class,'student_lessons');
    }
    public function group()
    {
        return $this->belongsTo(Group::class,'students','group_id');
    }
    public function grades()
    {
        return $this->belongsToMany(Grade::class,'student_grades');
    }
}
