<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Auth;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;


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
    $data = Input::all();

    $blog = Post::create(array(
      'title' => Input::get('title'),
      'author'=> Auth::user()->first,
      'body'  => Input::get('body')
    ));

    if($post->save())
    {
    return Redirect::route('posts.index');
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
      $post->title  = Input::get('title');
      $post->author = Auth::user()->first;
      $post->body   = Input::get('body');


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
