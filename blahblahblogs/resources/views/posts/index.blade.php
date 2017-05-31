@extends('layouts.app')
@section('content')
<h2>{!! str_replace('_', ' ',$blog->name) !!}</h2>
<?php if ($owner): ?>
  <a href="/blog/{{$blog->id}}/post/new">[new post]</a>
<?php endif ?>

<?php foreach ($posts as $post): ?>
  <?php if ($owner || $post->public): ?>
    <h4>
      <a href="/{{$blog->name}}/{{$post->title}}">
        {!! str_replace('_', ' ',$post->title) !!}
      </a>

      <?php if ($owner): ?>
      <a href="/{{$blog->name}}/{{$post->title}}/edit">
        [edit]
      </a> 
      <?php endif; ?>
    </h4> 
    

    <p>
      {{ mb_strimwidth($post->info, 0, 100, '...') }}
      <a href="/{{$blog->name}}/{{$post->title}}">
        full post
      </a>
    </p>

    

    <?php if ($owner): ?>
    
    <?php endif; ?>
    
    <br>
  <?php endif ?>
  
<?php endforeach ?>
@endsection