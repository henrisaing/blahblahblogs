@extends('layouts.app')
@section('content')
<?php if ($owner): ?>
  <a href="/blog/{{$blog->id}}/post/new">[new post]</a>
<?php endif ?>
<h2>{{$blog->name}}</h2>

<?php foreach ($posts as $post): ?>
  <?php if ($owner || $post->public): ?>
    <a href="/{{$blog->name}}/{{$post->title}}">
      {{$post->title}}
    </a>

    <?php if ($owner): ?>
    <a href="/{{$blog->name}}/{{$post->title}}/edit">
      [edit]
    </a> 
    <?php endif; ?>
    
    <br>
  <?php endif ?>
  
<?php endforeach ?>
@endsection