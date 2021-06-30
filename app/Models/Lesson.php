<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    protected $fillable = [
        'lesson_name',
        'group_id',
    ];

    public function lessons()
    {
        return $this->belongsTo(Group::class,'lessons','group_id');
    }

    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'lesson_grades');
    }
}
