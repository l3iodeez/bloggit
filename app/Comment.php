<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
    'body',
  ];


  public function commentable()
  {
      return $this->morphTo();
  }

  public function author()
  {
      return $this->belongsTo('User', 'user_id');
  }

  public function comments()
  {
      return $this->morphMany('Comment', 'commentable');
  }
}
