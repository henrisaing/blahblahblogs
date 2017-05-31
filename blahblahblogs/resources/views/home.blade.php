@extends('layouts.app')

@section('content')
<h4>search [put in search]</h4>
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<h3>Home</h3>

<h4>My Blogs 
  <?php if(Auth::check()): ?>
    <a func="/blog/new" class="lightbox-open">[+]</a>
  <?php endif; ?>
</h4>

<?php foreach ($blogs as $blog): ?>
  <a href="/{!!$blog->name!!}">{!! str_replace('-', ' ',$blog->name) !!}</a> <a func="/blog/{{$blog->name}}/edit" class="lightbox-open">[edit]</a> <br>
<?php endforeach ?>

<h4>Followed Blogs</h4>

@endsection
