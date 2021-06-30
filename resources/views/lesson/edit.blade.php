@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atnaujinkite pamokos įrašą</div>
 
                <div class="card-body">
                    {{-- {{dd($lesson)}} --}}
                    <form action="{{route('lesson.update',$lesson)}}" method = "POST">
                        @csrf
                        <div class="form-group">
                            <label for="lesson name">lesson</label>
                            <input type="text" class="form-control" id="lesson name" value="{{$lesson->lesson_name}}" name="lesson_name">
                        </div>
                        <button type="submit" class="btn btn-primary">Atnaujinti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
 



@endsection('content')