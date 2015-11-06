@extends('app')

@section('content')

@include('articles._single', ['display_full_body' => true])

<hr>

@include('comments.create')

<hr class="border-transparent">

<div id="comments">
    @foreach ($article->comments as $comment)
        @include('comments.show')
        <hr>
    @endforeach
</div>

@stop

