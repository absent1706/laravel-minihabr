@extends('layouts.default', ['page_title' => 'New category'])

@section('content')
    <h1>New category</h1>

    {!! Form::model($category, ['route' => 'categories.store']) !!}
        @include('categories._form', ['submit_title' => 'Create category'])
    {!! Form::close() !!}
@stop