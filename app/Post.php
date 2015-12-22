<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $fillable = [
      'title', 'body',
  ];
  public function author()
  {
    return $this->belongsTo('App\User', 'user_id');
  }
  public function comments()
  {
    return $this->morphMany('App\Comment', 'commentable');
  }
}
