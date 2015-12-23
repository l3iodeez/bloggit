@extends('layouts.app')

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>
      {{ $post->body }}
    </p>


    @if ( !$post->comments->count() )
        <p>
          No comments yet!
        </p>
    @else
        <ul>
            @foreach( $comments as $comment )
                <li>{{ $comment->body }}</a></li>
            @endforeach
        </ul>
    @endif
@endsection
