@extends('layouts.app')

@section('content')



@foreach ($group_details as $group)
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
              <div class="card-header bg-info ">
                <table class="table">
                  <tr>
                    <td style="width:15%">group {{$group->group_name}}</td>
                    <td style="width:26%"><a class="btn btn-success" href="{{route('group.create',['group_id' => $group->id])}}">Įtraukti studentą</a></td>
                    <td style="width:26%"><a class="btn btn-success" href="{{route('lesson.create',['group' => $group])}}">Sukurti pamoką</a></td>
                    <td style="width:20%"><a class="btn btn-success" href="{{route('group.edit',$group->id)}}">Atnaujinti</a></td>
                    <td ><a class="btn btn-danger" onclick="return confirm('Ar tikrai norite ištrinti?')" href="{{route('group.delete',$group->id)}}">Trinti</a></td>
                    

                  </tr>
                </table> 
              </div>

              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">students</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Student name</th>
                      <th>Student last name</th>
                      <th>Trinti</th>
                    </tr>
                    
                    @for ($i=0;$i<count($group->students);++$i)
                    <tr>
                      
                      <td>{{$group->students[$i]->student_name}}</td>
                      <td>{{$group->students[$i]->student_last_name}}</td>
                      <td><a class="btn btn-danger" href="{{route('student.delete',$group->students[$i]->id)}}">X</a></td>
                      
                     
                    </tr>
                    @endfor
                   

                        </tbody>
                      </table>
                    </div>
              </div>
          </div>
        </div>
      </div>
      @endforeach
 



@endsection('content')