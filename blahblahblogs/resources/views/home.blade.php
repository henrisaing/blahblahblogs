@extends('layouts.app')

@section('content')
<h4>search [put in search]</h4>
<h3>Home</h3>

<h4>My Blogs <a func="/blog/new" class="lightbox-open">[+]</a></h4>

<?php foreach ($blogs as $blog): ?>
  <a func="/blog/{{$blog->name}}/edit" class="lightbox-open">{{$blog->name}}</a>
<?php endforeach ?>

<h4>Followed Blogs</h4>
@endsection
