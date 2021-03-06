<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'grade_id',
    ];
}
