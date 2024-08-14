@extends('layouts.app')

@section('title','Edit')

@section('content')
<div class="m-5 d-flex justify-content-center text-center">
        @csrf
        @if ($errors->any())
        <div class="error-handling">
            @foreach ($errors->all() as $error)
                <li style="color: red">{{$error}}</li>
            @endforeach
        </div>
        @endif
        <form class="row g-3 col-8 " method="POST" action="{{route('students.update',$student['id'])}}">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Registration No.</span>
                <input type="number" placeholder="20020511000" class="form-control" name="regNo" value="{{$student['regNo']}}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Name</span>
                <input type="text" placeholder="First" class="form-control" name="first" value="{{$student['first']}}">
                <input type="text" placeholder="Middle" class="form-control" name="middle" value="{{$student['middle']}}">
                <input type="text" placeholder="Last"  class="form-control" name="last" value="{{$student['last']}}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Age</span>
                <input type="number" placeholder="20" class="form-control" name="age" value="{{$student['age']}}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
                <input type="text" placeholder="Bwaish" class="form-control" name="address" value="{{$student['address']}}">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                <select class="form-select" id="inputGroupSelect01" name="gender" value="{{$student['gender']}}">
                    <option value="m" selected>Male</option>
                    <option value="f">Female</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-info">Edit Student</button>
            </div>
        </form>
</div>
@endsection