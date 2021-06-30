@extends('layouts.app')

@section('content')

{{-- @if(isset($errorList))
{{dd($errorList)}}
@endif --}}
{{-- {{dd($group)}} --}}

{{session('status')}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sukurkite pamokos įrašą</div>
 
                <div class="card-body">
                    <form action="{{route('grade.store',['grades'=>$grades])}}" method = "POST">
                        @csrf
                        <div class="form-group">
                            <select name="student_id" id="">
                                <option value="">Select a student</option>
                                @foreach ($students as $student)
                                    <option value="{{$student->id}}">{{$student->student_name}}</option> 
                                @endforeach
                            </select>
                            <select name="lesson_id" id="">
                                <option value="">Select a lesson</option>
                                @foreach ($lessons as $lesson)
                                    <option value="{{$lesson->id}}">{{$lesson->lesson_name}}</option> 
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <input type="text" class="form-control" id="grade" placeholder="Enter grade" name="grade" value="">
                            
                        </div>
                        

                        
                        

                        
                        <button type="submit" class="btn btn-primary">Sukurti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
 



@endsection('content')