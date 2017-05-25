<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Post;
use App\AuthCheck;

class PostController extends Controller
{
    //

  public function index($name){
    $blog = Blog::where('name', $name)->first();
    $posts = $blog->posts()->get();
    $owner = AuthCheck::ownsBlog($blog);

    $view = view('posts.index', [
      'blog' => $blog,
      'posts' => $posts,
      'owner' => $owner,
    ]);
    
    return $view;
  }

  public function new(Blog $blog){
    if(AuthCheck::ownsBlog($blog)):
      $view = view('posts.new', [
        'blog' => $blog,
      ]);
    else:
      $view = view('errors.oops');
    endif;
    

    return $view;
  }

  public function create(Blog $blog, Request $request){
    if(AuthCheck::ownsBlog($blog)):
      $post = $blog->posts()->create($request->input());
      $view = redirect('/'.$blog->name.'/'.$post->title);
    else:
      $view = view('errors.oops');
    endif;

  return $view;
  }

  public function show($name, $title){
    $blog = Blog::where('name', $name)->first();
    $post = $blog->posts()->where('title', $title)->first();
    $owns = AuthCheck::ownsBlog($blog);
    if ($owns || ($blog->public && $post->public)):
      $view = view('posts.show', [
        'blog' => $blog,
        'post' => $post,
        'owns' => $owns,
      ]);
    else:
      $view = view('errors.oops');
    endif;

    return $view;
  }

  public function edit(){

    return $view;
  }
}
