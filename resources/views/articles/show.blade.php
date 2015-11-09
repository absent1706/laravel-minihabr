@extends('layouts.default', ['page_title' => $article->title])

@section('content')

@include('articles._single', ['display_full_body' => true])

<hr>

@include('comments._create')

<hr class="border-transparent">

<div id="comments">
    @foreach ($article->comments as $comment)
        @include('comments._single')
        <hr>
    @endforeach
</div>

@stop

