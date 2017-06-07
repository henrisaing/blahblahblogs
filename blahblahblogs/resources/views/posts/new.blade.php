@extends('layouts.blog')
@section('content')
<h2>Create Post</h2>
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
  <form action="/blog/{{$blog->id}}/post/create" method="post">
    {{csrf_field()}}
    
    <input class="post-input" type="text" name="title" placeholder="Post Title" required> <br>
    
    <textarea class="post-input" name="info" placeholder="Content"></textarea> <br>

    <select name="public">
      <option value="1">public</option>
      <option value="0">private</option>
    </select>

    <button type="submit">Post</button>
    <a href="/{{$blog->name}}"><button type="button">Back</button></a>
  </form>
@endsection