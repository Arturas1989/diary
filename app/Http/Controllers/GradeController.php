<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\LessonGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function __construct(){
        $this->lessonGrade = new LessonGrade;
        $this->lessonGradeController = new LessonGradeController;
        $this->studentGradeController = new StudentGradeController;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allGrades()
    {
        return Grade::all();
    }
    public function allLessons()
    {
        return Lesson::all();
    }
    public function allStudents()
    {
        return Student::all();
    }

    public function index()
    {
        return view('grade.index',
        [
        'grades'=>$this->allGrades(),
        'lessons'=>$this->allLessons(),
        'students'=>$this->allStudents()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade.create',[
            'grades'=>$this->allGrades(),
            'lessons'=>$this->allLessons(),
            'students'=>$this->allStudents()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = Grade::create([
            'grade'=>$request->grade,
        ]);

        $this->lessonGradeController->store($request,$grade);
        $this->studentGradeController->store($request,$grade);
        
            // return redirect()->route('grade.index');
            return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('grade.edit',['grade'=>$grade, 'museums'=>$this->museums]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $this->deleteForeignIds($grade);
        $this->gradeMuseum->store($request,$grade);

        $grade->title = $request->title;
        $grade->description = $request->description;
        $grade->price = $request->price;
        $grade->save();
        return redirect()->route('grade.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $this->gradeMuseumController->destroy($this->gradeMuseum, $grade);
        $grade->delete();

        return redirect()->route('grade.index');

    }
}
