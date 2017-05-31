@extends('layouts.app')
@section('content')
<h2>Edit Post</h2>
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
  <form action="/{{$blog->id}}/{{$post->id}}/update" method="post">
    {{csrf_field()}}
    
    <input type="text" name="title" placeholder="Post Title" required value="{{str_replace('-',' ',$post->title)}}"> <br>
    
    <textarea name="info" placeholder="Content">{{$post->info}}</textarea> <br>

    <select name="public">
      <option value="1" <?php if($post->public){print('selected');} ?>>public</option>
      <option value="0" <?php if($post->public == false){print('selected');} ?>>private</option>
    </select>

    <br>

    <button type="submit">Edit</button>
    <a href="/{{$blog->name}}"><button type="button">Back</button></a>
  </form>
@endsection