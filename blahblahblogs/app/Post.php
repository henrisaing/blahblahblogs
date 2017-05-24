<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
    'public',
    'title',
    'info',
  ];

  public function comments(){
    return $this->hasMany(Comment::class);
  }

  public function ratings(){
    return $this->hasMany(Rating::class);
  }

  public function blog(){
    return $this->belongsTo(Blog::class);
  }
}