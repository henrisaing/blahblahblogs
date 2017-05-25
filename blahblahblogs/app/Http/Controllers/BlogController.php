<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Blog;

class BlogController extends Controller
{
  public function myBlogs(){
    $myBlogs = Auth::user()->blogs()->get();

    return $myBlogs;
  }

  public function new(){
    $view = view('blogs.new');

    return $view;
  }

  public function create(Request $request){
    // Auth::user()->blogs()->create([
    //   'public' => $request->public,
    //   'name' => $request->name,
    //   'info' => $request->info,
    //   'contact' => $request->contact,
    // ]);

    Auth::user()->blogs()->create($request->input());

    $view = redirect('/home');

    return $view;
  }

  public function edit($name){
    $blog = Blog::where('name', $name)->first();
    $view = view('blogs.edit', ['blog' => $blog]);

    return $view;
  }

  public function update(Blog $blog, Request $request){
    if (Auth::ownsBlog($blog)):
      $blog->update($request);
    endif;
    $view = redirect('/home');

    return $view;
  }
}
