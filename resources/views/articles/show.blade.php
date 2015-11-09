@extends('layouts.default', ['page_title' => $article->title])

@section('content')

@include('articles._single', ['display_full_body' => true])

<hr>

@if (Auth::check())
    @include('comments._create')
@else
    <p class="text-center">
        {!! link_to_route('register', 'Register') !!}
        or
        {!! link_to_route('login', 'log in') !!}
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

