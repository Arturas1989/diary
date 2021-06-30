<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLesson extends Model
{
    use HasFactory;

    protected $table = 'student_lessons';

    public function lessons()
    {
        return $this->belongsToMany(Student::class,'student_lessons');
    }
}
