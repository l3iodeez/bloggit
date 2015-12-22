<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class PostsController extends BaseController
{
    /**
     * Responds to requests to GET /users
     */
    public function index()
    {
        // $posts = Post::all();
        // return view('posts/index')->with('posts', $posts);
        return "feck";
    }
    public function user()
    {
        return \Auth::user()->email();
    }
    /**
     * Responds to requests to GET /users/show/1
     */
    public function show($id)
    {
      $post = Post::find($id);
      $comments = $post->comments();
      return view('posts/show')->with('post', $post)->with('comments', $comments);
    }

    /**
     * Responds to requests to GET /users/admin-profile
     */
    public function create()
    {
      return view('posts/create');
    }
    public function edit()
    {
      return view('posts/edit');
    }

    public function update()
    {
      return view('posts/create');
    }
}
