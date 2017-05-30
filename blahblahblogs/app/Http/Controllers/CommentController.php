<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class CommentController extends Controller
{
    //

  public function create(Post $post, Request $request){
    $blog = $post->blog()->first();
    $post->comments()->create($request->input());

    $view = redirect('/'.$blog->name.'/'.$post->title);
    
    return $view;
  }
}
