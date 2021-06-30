<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
// use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $groups = Group::all();
        $group_details = Group::with('students.group')->get();
        return view('group.index',['group_details'=>$group_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $group = Group::find($request->group_id);
        // dd($group);
        return view('group.create',['group'=>$group]);
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
        $validStudentsCount = 0;

        for($i=1;$i<count($inputList)/2-1;++$i){
            $name = $inputList['student_name'.$i];
            $last_name = $inputList['student_last_name'.$i];

            if(Student::where([
                ['student_name', '=', $name],
                ['student_last_name', '=', $last_name],
                ])->count() > 0 
                || $name==null||$last_name==null){
                continue;
            }
            $validStudentsCount++;
        }
        if(Group::where('group_name', '=', $request->group_name)->count() == 0 
        && $validStudentsCount>0)
        {
            $group = new Group;
            $group->group_name = $request->group_name;
            $group->save();
        }
        
        $student = new StudentController;
        $student->store($request);
        // dd($inputList);
        return redirect()->route('group.index')->with('success_message','sėkmingai sukurta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group, Request $request)
    {
        $students = $group->students;
        return view('group.edit',['group'=>$group,'students'=>$students]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group, Student $student)
    {
        $students = new StudentController;
        $students->update($request, $student);
        
        $group->group_name = $request->group_name;
        $group->save();

        
        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('group.index')->with('success_message','sėkmingai ištrynėte grupę');
    }
}
