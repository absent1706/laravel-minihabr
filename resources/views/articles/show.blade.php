@extends('layouts.default')

@section('content')

@include('articles._single', ['display_full_body' => true])

<hr>

@include('comments.create')

<hr class="border-transparent">

<div id="comments">
    @foreach ($article->comments as $comment)
        @include('comments._single')
        <hr>
    @endforeach
</div>

@stop

