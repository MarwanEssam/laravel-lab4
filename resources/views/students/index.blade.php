@extends('layouts.app')
@section('content')
    
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">IDno</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>


      </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
          <th scope="row">{{$student->id}}</th>
          <th scope="row">{{$student->IDno}}</th>
          <td>{{$student->name}}</td>
          <td>{{$student->age}}</td>
          <td>
            <a class="btn btn-primary" href="{{route('students.edit',$student->id)}}">Update</a>
          </td>
          <td>
            {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'DELETE']) !!}
              @csrf
              <button type="submit" class="btn btn-danger">Delete</button>
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection