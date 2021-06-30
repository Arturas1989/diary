@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (isset($group)) 
                <div class="card-header">Įtraukite studentą</div>
                @else 
                <div class="card-header">Sukurkite grupės įrašą</div>
                @endif
                {{-- {{dd($group)}} --}}
 
                <div class="card-body">
                    <form action="{{route('group.store')}}" method = "POST">
                        @csrf
                        <div class="form-group">
                            <label for="group name">group name</label>
                            <input type="text" class="form-control" id="group name" placeholder="group name" name="group_name" 
                            @if (isset($group)) value="{{$group->group_name}}" @endif>
                        </div>

                        @for ($i=0;$i<10;$i++)
                        <div class="form-group">
                            <span style="float:left; width:4%; margin-top:20px">{{$i+1}}</span>
                            <div style="width:42%; float:left; margin:3%">
                                <label for="student name">student name</label>
                                <input type="text" class="form-control" id="student name" placeholder="student name" name="student_name{{$i+1}}">
                           
                            </div>
                            <div style="width:42%; float:left; margin:3%">
                                <label for="student last name">student last name</label>
                                <input type="text" class="form-control" id="student last name" placeholder="student last name" name="student_last_name{{$i+1}}">
                            </div>
                        </div>
                        
                            
                        @endfor
                        <button type="submit" class="btn btn-primary">Sukurti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
 



@endsection('content')