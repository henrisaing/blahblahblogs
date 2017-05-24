<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
    'approved',
    'name',
    'info',
  ];

  public function post(){
    return $this->belongsTo(Post::class);
  }
}
