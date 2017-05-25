<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Blog;

class AuthCheck extends Model
{
    //

  public static function ownsBlog(Blog $blog){
    $return = false;

    if (Auth::check()):
      if(Auth::id() == $blog->user_id):
        $return = true;
      endif;
    endif;

    return $return;
  }
}
