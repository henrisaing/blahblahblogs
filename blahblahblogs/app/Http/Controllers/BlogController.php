<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Blog;
use App\AuthCheck;

class BlogController extends Controller
{
  public function myBlogs(){
    $myBlogs = Auth::user()->blogs()->get();

    return $myBlogs;
  }

  public function new(){
    if(Auth::check()):
      $view = view('blogs.new');
    else:
      $view = view('errors.nsi');
    endif;

    return $view;
  }

  public function create(Request $request){
    // Auth::user()->blogs()->create([
    //   'public' => $request->public,
    //   'name' => $request->name,
    //   'info' => $request->info,
    //   'contact' => $request->contact,
    // ]);
    

    if(Auth::check()):
      $this->validate($request,[
        'name' => 'required|unique:blogs,name'
      ]);

      $blog = Auth::user()->blogs()->create($request->input());
      $view = redirect('/'.$blog->name);
    else:
      $view = view('errors.nsi');
    endif;

    // $view = redirect('/home');
    

    return $view;
  }

  public function edit($name){
    $blog = Blog::where('name', $name)->first();
    $view = view('blogs.edit', ['blog' => $blog]);

    return $view;
  }

  public function update(Blog $blog, Request $request){
    if(AuthCheck::ownsBlog($blog)):
      $blog->update($request->input());
      $view = redirect('/home');
    else:
      $view = view('errors.oops');
    endif;

    return $view;
  }
}
