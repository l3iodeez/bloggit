@extends('layouts.app')

@section('content')
  @if (Auth::check())
  <a href="/posts/create">Create new post</a>
  @endif
    <h2>Posts</h2>
    @if ( !$posts->count() )
        <p>
          No posts yet!
        </p>
    @else
        <ul>
            @foreach( $posts as $post )
                <li><a href="{{ "/posts/$post->id", $post }}">{{ $post->title }}</a> <p> by {{$post->author()->get()->first()->username}}</p></li>
            @endforeach
        </ul>
    @endif
@endsection
