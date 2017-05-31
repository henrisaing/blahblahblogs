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

      // $post = $blog->posts()->create(clean($request->input()));

      $post = $blog->posts()->create([
        'title' => str_replace(' ', '-', clean($request->title)),
        'info' => clean($request->info),
        'public' => $request->public,
      ]);

      $view = redirect('/'.$blog->name.'/'.$post->title);
    else:
      $view = view('errors.oops');
    endif;

  return $view;
  }

  public function show($name, $title){
    $blog = Blog::where('name', $name)->first();
    $post = $blog->posts()->where('title', $title)->first();
    $comments = $post->comments()->get()->reverse();
    $owns = AuthCheck::ownsBlog($blog);

    if ($owns || ($blog->public && $post->public)):
      $view = view('posts.show', [
        'blog' => $blog,
        'post' => $post,
        'owns' => $owns,
        'comments' => $comments,
      ]);
    else:
      $view = view('errors.oops');
    endif;

    return $view;
  }

  public function edit($name, $title){
    $blog = Blog::where('name', $name)->first();
    $post = $blog->posts()->where('title', $title)->first();
    $owns = AuthCheck::ownsBlog($blog);
    if ($owns):
      $view = view('posts.edit', [
        'blog' => $blog,
        'post' => $post,
      ]);
    else:
      $view = view('errors.oops');
    endif;

    return $view;
  }

  public function update(Blog $blog, Post $post, Request $request){
    // $blog = Blog::where('name', $name)->first();
    // $post = $blog->posts()->where('title', $title)->first();
    $owns = AuthCheck::ownsBlog($blog);

    if ($owns):

      // $post->update(clean($request->input()));
      $post->update([
        'title' => str_replace(' ', '-', clean($request->title)),
        'info' => clean($request->info),
        'public' => $request->public,
      ]);

      $view = redirect('/'.$blog->name.'/'.$post->title);
    else:
      $view = view('errors.oops');
    endif;

    return $view;
  }

  public function delete(){
    //TODO
    return 1;
  }
}
