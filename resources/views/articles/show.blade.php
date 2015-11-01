@extends('app')

@section('content')

@include('articles._single', ['article' => $article, 'display_full_body' => true])

@stop

