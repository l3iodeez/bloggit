@extends('layouts.app')

@section('content')
  <a href="/posts/create">Create new post</a>
    <h2>Posts</h2>
    @if ( !$posts->count() )
        <p>
          No posts yet!
        </p>
    @else
        <ul>
            @foreach( $posts as $post )
                <li><a href="{{ "/posts/$post->id", $post }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    @endif
@endsection
