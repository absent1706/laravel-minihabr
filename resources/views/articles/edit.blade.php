@extends('layouts.default', ['page_title' => $article->title.' · Edit'])

@section('content')
    <h1>Edit article</h1>

    {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT']) !!}
        @include('articles._form', ['submit_title' => 'Update article'])
    {!! Form::close() !!}
@stop