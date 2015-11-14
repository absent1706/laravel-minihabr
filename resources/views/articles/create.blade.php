@extends('layouts.default', ['page_title' => 'New article'])

@section('content')
    <h1>New article</h1>

    {!! Form::open(['route' => 'articles.store']) !!}
        @include('articles._form', ['submit_title' => 'Create article'])
    {!! Form::close() !!}
@stop