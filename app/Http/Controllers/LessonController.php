<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Group;
use Validator;
use App\Providers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesson = Lesson::all();
        
        return view('lesson.index',['lesson'=>$lesson]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $group = Group::all();
        // dd($group);
        return view('lesson.create',['group'=>$group]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Group $group)
    {
        // dd('taip');
        // dd($group);
        // $group=Group::where('group_name', '=', $request->group_name)->get();
        // if(Group::where('group_name', '=', $request->group_name)->count() == 0){
        //     return  view('lesson.create',['group'=>$group])->with('error_message','Tokia grupė neegzistuoja, pirma sukurkite grupę'); 
        // }
        $inputList = $request->all();
        // dd($group);
        // dd($inputList);
        // dd($request->group_name);
        
        
           
        
       
        // $this->validate($request,
        
        //     [
        //         'group_id' => ['required'],
        //         'lesson_name' => ['required'],
        //         // 'file' => ['required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048'],
        //     ]);  
            
        // dd($request);
            Lesson::create([
                'lesson_name' => $request->lesson_name,
                'group_id' => $request->group_id,
            ]);
        
            return redirect()->route('lesson.index');
        
        // return redirect()->route('lesson.create',['group' => $group]);
        // $errorList = [];
        // for($i=0;$i<count($inputList)-4;++$i){
        //     $name = $inputList['lesson_name'.$i];

        //     if(Lesson::where([
        //         ['lesson_name', '=', $name],
        //         ['group_id', '=', $group[0]->id]
        //         ])->count() > 0 
        //         ){
        //             $errorList[$i] = 'Pamoka '.$name. ' jau egzistuoja '.$inputList['group_name'].' grupėje';
        //             continue;
                
        //     }
        //     else if ($name==null){
        //         continue;
        //     }
        //     else{
        //         $lesson = new Lesson;
        //         $lesson->Lesson_name = $name;
        //         $lesson->group_id = $group[0]->id;
        //         $lesson->save();
        //     }
            
        // }
        // if($errorList){
        //     return  view('lesson.create',['group'=>$group,'errorList'=>$errorList]);
        // }
        
        
        // $student = new StudentController;
        // $student->store($request);
        // // dd($inputList);
        // return  redirect()->route('lesson.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('lesson.edit',['lesson'=>$lesson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->lesson_name = $request->lesson_name;
        $lesson->save();
        return redirect()->route('lesson.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lesson.index');
    }
}
