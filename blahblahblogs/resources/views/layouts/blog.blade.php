<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>
    <?php if(isset($blogSet)): ?>
      {{str_replace('-',' ',$blog->name)}}
    <?php else: ?>
      {{ config('app.name', 'Blah Blah Blogs') }}
    <?php endif; ?>
  </title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav id="nav-bar-top">
      <ul>
        <li>
          <a href="/{{$blog->name}}">
            {{str_replace('-',' ',$blog->name)}}
          </a>
        </li>
        <li>
          <a href="/home">
            Home
          </a>
        </li>

        @if (Auth::guest())
          <li class="float-right"><a href="{{ route('login') }}">Login</a></li>
          <li class="float-right"><a href="{{ route('register') }}">Register</a></li>
        @else
          <li class="float-right"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          <li class="float-right"><a href="/home">Welcome {{ Auth::user()->name }}!</a></li>
        @endif
      </ul>
    </nav>

    <?php if(isset($blogSet)): ?>
    <div id="side-nav">
      <ul>
      <?php foreach ($blogSet->posts()->get()->reverse() as $post): ?>
        <li>
          <a href="/{{$blogSet->name}}/{{$post->title}}">{{$post->title}}</a>
        </li>
      <?php endforeach ?>
      </ul>
    </div>
  <?php endif; ?>
      <div id="contain">
      @yield('content')
      </div>
  </div>

  <!-- lightbox popup div -->
  <div id="light" class="white_content">
    <div id="lightbox-content"></div> 
    <div class="lb-close">
      <button class="lightbox-close" type="button">close</button>
    </div>
  </div>
  <div id="fade" class="black_overlay"></div>
  <!-- lightbox popup div end -->
  
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
