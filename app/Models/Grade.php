<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade',
    ];

    public function lesson()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_grades');
    }
}
