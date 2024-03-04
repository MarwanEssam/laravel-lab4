@extends('layouts.app')
@section('content')
    
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Author</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>


      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td>{{$post->content}}</td>
          <td>{{$post->user->name}}</td>
          <td>
            <a class="btn btn-primary" href="{{route('posts.edit',$post->id)}}">Update</a>
          </td>
          <td>
            <form action="{{route('posts.destroy',[$post->id])}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection