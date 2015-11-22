@extends('layouts.default', ['page_title' => $category->name.' · Edit'])

@section('content')
    <h1>Edit category</h1>

    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
        @include('categories._form', ['submit_title' => 'Update category'])
    {!! Form::close() !!}
@stop