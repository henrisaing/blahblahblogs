<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
  protected $fillable = [
    'public',
    'name',
    'info',
    'contact',
  ];

  public function posts(){
    return $this->hasMany(Post::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
