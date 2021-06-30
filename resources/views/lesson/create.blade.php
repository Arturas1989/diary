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
                    <form action="{{route('lesson.store',['group'=>$group])}}" method = "POST">
                        @csrf
                        <div class="form-group">
                            <label for="group name">group name</label>
                            @error('group_name')
                            <span style="background-color:red">{{$message}}</span>
                                
                            @enderror
                            <select name="group_id" id="">
                                <option value="">Select group</option>
                                @foreach ($group as $name)
                                    <option value="{{$name->id}}">{{$name->group_name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            
                            <label for="lesson name">lesson name</label>
                            <input type="text" class="form-control" id="lesson name" placeholder="lesson name" name="lesson_name">
                        </div>
                        

                        
                        <button type="submit" class="btn btn-primary">Sukurti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
 



@endsection('content')