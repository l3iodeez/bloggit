<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
    'body', 'user_id', 'commentable',
  ];


  public function commentable()
  {
      return $this->morphTo();
  }

  public function author()
  {
      return $this->belongsTo('App\User', 'user_id');
  }

  public function comments()
  {
      return $this->morphMany('App\Comment', 'commentable');
  }
}
