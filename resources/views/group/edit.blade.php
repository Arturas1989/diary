@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atnaujinkite pamokos įrašą</div>
 
                <div class="card-body">
                    <form action="{{route('group.update',['group' =>$group, 'students' => $students])}}" method = "POST">
                        @csrf
                        <div class="form-group"  style="margin:4%">
                            <label for="group name">group</label>
                            <input type="text" class="form-control" id="group name" value="{{$group->group_name}}" name="group_name">
                            
                        </div>
                        <div class="form-group">
                            @for ($i=0;$i<count($students);++$i)
                            <div style="width:42%; float:left; margin:4%">
                                <label for="student name">student name</label>
                                <input type="text" class="form-control" id="student name" value="{{$students[$i]->student_name}}" name="student_name{{$i}}">
                                <input type="hidden" class="form-control" id="student id" placeholder="student id" value="{{$students[$i]->id}}" name="student_id{{$i}}">
                            </div>
                            <div style="width:42%; float:left; margin:4%">
                                <label for="student last name">student last name</label>
                                <input type="text" class="form-control" id="student last name" value="{{$students[$i]->student_last_name}}" name="student_last_name{{$i}}">
                            </div>  
                            @endfor
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin:4%">Atnaujinti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
 



@endsection('content')