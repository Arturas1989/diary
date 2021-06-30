<?php

namespace App\Http\Controllers;

use App\Models\LessonGrade;
use App\Models\Grade;
use Illuminate\Http\Request;

class LessonGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Grade $grade)
    {
        LessonGrade::create([
            'lesson_id'=>$request->lesson_id,
            'grade_id'=>$grade->id,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LessonGrade  $lessonGrade
     * @return \Illuminate\Http\Response
     */
    public function show(LessonGrade $lessonGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LessonGrade  $lessonGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(LessonGrade $lessonGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LessonGrade  $lessonGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LessonGrade $lessonGrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LessonGrade  $lessonGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(LessonGrade $lessonGrade)
    {
        //
    }
}
