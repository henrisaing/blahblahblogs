@extends('layouts.app')
@section('content')
  <form action="/blog/{{$blog->id}}/post/create" method="post">
    {{csrf_field()}}
    
    <input type="text" name="title" placeholder="Post Title" required> <br>
    
    <textarea name="info" placeholder="Content"></textarea> <br>

    public <input type="checkbox" name="public" value="1"> <br>

    <button type="submit">Post</button>
    <a href="/{{$blog->name}}"><button type="button">Back</button></a>
  </form>
@endsection