@extends('layouts.default', ['page_title' => $article->title])

@section('content')

@include('articles._single', ['display_full_body' => true])

<hr>

@if (Auth::check())
    @include('comments._create')
@else
    <p class="text-center">
        Please,
        <a href="{{ route('register', ['return' => Request::url()]) }}">register</a>
        or
        <a href="{{ route('login', ['return' => Request::url()]) }}">login</a>
        to leave comments
    </p>
@endif

<hr class="border-transparent">

<div id="comments">
    @foreach ($article->comments as $comment)
        @include('comments._single')
        <hr>
    @endforeach
</div>

@stop

