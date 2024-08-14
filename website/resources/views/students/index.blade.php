@extends('layouts.app')

@section('button')
<div class="text-left">
  <a href="{{route('students.create')}}" role="button" class="btn btn-success">New Student</a>
</div>
@endsection

@section('title','All Students')
@section('style')
<style type='text/css'>
  .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: #f4f4f4;
  }
</style>
@endsection

@section('content')
  <table class="table table-hover mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Registeration No.</th>
        <th scope="col">First</th>
        <th scope="col">Middle</th>
        <th scope="col">Last</th>
        <th scope="col">Age</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach ($students as $student)
        <tr onClick="window.location.href='{{route('students.show',$student->id)}}'" style="cursor:pointer">
          <th scope="row">{{$student->id}}</th>
          <td>{{$student->regNo}}</td>
          <td style="font-weight: 500">{{$student->first}}</td>
          <td style="font-weight: 500">{{$student->middle}}</td>
          <td style="font-weight: 500">{{$student->last}}</td>
          <td >{{$student->age}}</td>
          <td >{{$student->address}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
