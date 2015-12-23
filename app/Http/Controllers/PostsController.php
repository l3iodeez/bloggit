<?php

namespace App\Http\Controllers;


use App\Post;
use Auth;
use View;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;



class PostsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
    $posts = Post::all();

    return View::make('posts.index')->with('posts', $posts);
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
    return View::make('posts.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
      $data = Request::all();

      $user_id = Auth::user()->id;
      $post = Post::create(array(
        'title' => Request::get('title'),
        'url'=> Request::get('url'),
        'user_id'=> $user_id,
        'body'  => Request::get('body')
      ));

      if($post->save())
      {
        $comments = $post->comments()->get();
        return View::make('posts.show')->with('post', $post)->with('comments', $comments);
      }
      else {
        return Redirect::route('/posts/create');
      }

    }


    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    $post = Post::find($id);
    $comments = $post->comments()->get();
    return View::make('posts.show')->with('post', $post)->with('comments', $comments);
    }


    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
    $post = Post::find($id);

    return View::make('posts.edit')->with('post', $post);
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {

      $post = Post::find($id);

      //complete validation here
      $post->title  = Request::get('title');
      $post->author = Auth::user()->first;
      $post->body   = Request::get('body');


      if($post->save())
      {
        return Redirect::route('posts.index');
      }
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
      Post::destroy($id);
      Session::flash('message', 'You have successfull deleted a blog post');

      return Redirect::route('posts.index');
    }

}
