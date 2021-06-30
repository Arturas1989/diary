@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">lessons</div>
 
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Lesson</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($lesson as $lessonUnit)
                          <tr>
                            <td>{{$lessonUnit->lesson_name}}</td>
                            {{-- {{dd($lessonUnit)}} --}}
                            <td><a href="{{route('lesson.edit',$lessonUnit)}}">Pakoreguoti</a></td>
                            
                            <td>
                              <form action="{{route('lesson.delete',$lessonUnit)}}" method = "POST">
                                @csrf
                                <input type="submit" value="ištrinti">
                              </form>
                              
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
 </div>

 
 



@endsection('content')