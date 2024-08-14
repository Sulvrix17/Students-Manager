@extends('layouts.app')

@section('title')
{{$student->regNo}}
@endsection

@section('content')
<div class="mt-5 d-flex justify-content-center">
        <div class="card col-8">
            <div class="card-header">
              {{$student->regNo}}
            </div>
            <div class="card-body">
              <h5 class="card-title">
                {{$student->first}}
                {{$student->middle}}
                {{$student->last}}
            </h5>
              <p class="card-text">Hadhramaut - {{$student->address}}</p>
              <div class="btn-toolbar gap-3" role="group">
                <a href="{{route('students.edit',$student->id)}}" class="btn btn-info" role="button">Edit</a>
                  <form action="{{route('students.destroy',$student->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete Student?')">Delete</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
@endsection