<?php

namespace App\Http\Controllers;

use Request;

use App\Comment;
use App\Post;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;

class CommentsController extends Controller
{

    public function store($id)
    {
      $data = Request::all();

      $user_id = Auth::user()->id;
      $post = Post::find($id);
      $comment = $post->comments()->create(array(
        'user_id'=> $user_id,
        'body'  => Request::get('body')
      ));

      if($comment->save())
      {
        $post = $comment->commentable()->first();
        return Redirect::action('PostsController@show', ['id' => $post->id]);
      }
    }

    public function update()
    {
      // return view('commentss/create');
      return "comments";
    }
}
