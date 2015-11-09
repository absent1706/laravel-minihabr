@extends('layouts.default', ['page_title' => 'New article'])

@section('content')
    <h1>New article</h1>
{!! Form::open(['url' => 'articles']) !!}
    {!! Form::label('title','Type title') !!}
    {!! Form::text('title') !!}

    {!! Form::label('body','Type body') !!}
    {!! Form::text('body') !!}
    {!! Form::submit('add article') !!}
{!! Form::close() !!}
@stop