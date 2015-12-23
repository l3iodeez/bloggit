@extends('layouts.app')

@section('content')
@if ($post->url)
  <h3><a href="{{$post->url}}">{{ $post->title }}</a></h3>
@else
  <h3>{{ $post->title }}</h3>
@endif
  <p class="post-body">
    {{ $post->body }}
  </p>


  {!! Form::open(array('action' => ['CommentsController@store', 'id'=>$post->id], 'class' => 'form')) !!}

  <div class="form-group">
      {!! Form::label('Add Comment') !!}
      {!! Form::textarea('body', null,
          array('required',
                'size' => '10x5',
                'class'=>'form-control new-comment',
                'placeholder'=>'Enter text...')) !!}
  </div>

  <div class="form-group">
      {!! Form::submit('Post!',
        array('class'=>'btn btn-primary')) !!}
  </div>
  {!! Form::close() !!}

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
