@extends('layouts.app')
@section('content')
    
{!! Form::open(['url' => 'posts','method'=>'post']) !!}
@csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    {!! Form::text('title', null,['class'=>'form-control','placeholder'=> 'Title']) !!}
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Content</label>
    {!! Form::textarea('content', null,['class'=>'form-control','placeholder'=> 'Content']) !!}
  </div>

  <button type="submit" class="btn btn-primary">Add</button>
{!! Form::close() !!}
@endsection