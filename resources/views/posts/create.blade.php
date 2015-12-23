@extends('layouts.app')

@section('content')
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(array('action' => 'PostsController@store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Post title') !!}
    {!! Form::text('title', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'title')) !!}
</div>

<div class="form-group">
    {!! Form::label('URL (optional)') !!}
    {!! Form::text('url', null,
        array('class'=>'form-control',
              'placeholder'=>'URL')) !!}
</div>

<div class="form-group">
    {!! Form::label('Post Body') !!}
    {!! Form::textarea('body', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Enter text...')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Post!',
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
@stop
