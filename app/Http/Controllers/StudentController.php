<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentGrade;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($this->data());
        $student = Student::find(3);
        return view('students.index',['student'=>$student]);
    }
    public function data()
    {
        $student = Student::all();
        // $grades = Student::find(3)->grades()->get();
        // $gradesList = [];
        // foreach ($grades as  $grade) {
        //     $gradesList[] = $grade->grade;
        // }
        // return response()->json($gradesList);
        // return view('students.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputList = $request->all();

        for($i=1;$i<count($inputList)/2-1;++$i){
            $name = $inputList['student_name'.$i];
            $last_name = $inputList['student_last_name'.$i];

            if(Student::where([
                ['student_name', '=', $name],
                ['student_last_name', '=', $last_name],
                ])->count() > 0){
                continue;
            }
            else if($name!=null&&$last_name!=null){
                $student = new Student;
                $group = Group::where('group_name','=',$request->group_name)->get();
                // dd($group);

                // dd($group);

                $student->student_name = $name;
                $student->student_last_name = $last_name;
                $student->group_id = $group[0]->id;
                $student->save();
            }
        }
    
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student, Request $request)
    {
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $studentList = $request->all();
        for ($i=0;$i<(count($studentList)-2)/3;++$i) {
            $student = Student::find($studentList['student_id'.$i]);
            $student->student_name = $studentList['student_name'.$i];
            $student->student_last_name = $studentList['student_last_name'.$i];
            $student->save();
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('group.index')->with('success_message','sėkmingai ištrynėte studentą');
    }
}
