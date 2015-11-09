@extends('layouts.default', ['page_title' => 'New article'])

@section('content')
    <h1>New article</h1>

    {!! Form::open(['route' => 'articles.store']) !!}

    @include('shared.errors_list')

    {{-- {!! Form::hidden('category_id','1') !!} --}}

    <div class="form-group">
        {!! Form::label('category_id','Select category') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>"form-control"]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('title','Type title') !!}
        {!! Form::text('title',null,['class'=>"form-control"]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body','Type body') !!}
        {!! Form::textarea('body',null,['class'=>"form-control"]) !!}
    </div>

    {!! Form::submit('Create article', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop