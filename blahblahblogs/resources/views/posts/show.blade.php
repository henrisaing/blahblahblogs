@extends('layouts.app')
@section('content')

<h2>{!!str_replace('_', ' ',$post->title)!!}</h2>

<p>{!! $post->info !!}</p>
<p>last updated: {{$post->updated_at}}</p>

<h3>Leave A Comment</h3>
<form action="/post/{{$post->id}}/comment" method="post">
  {{csrf_field()}}
  <input type="text" name="name" placeholder="Name"> <br>
  <textarea name="info" placeholder="Comment" required></textarea> <br>
  <button type="submit">Comment</button>
</form>
<?php foreach ($comments as $comment): ?>
  <h4>{{$comment->name}}</h4>
  <p>{{$comment->info}}</p>
<?php endforeach ?>

@endsection