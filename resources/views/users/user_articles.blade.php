@extends('users.layout', ['active_page' => 'articles', 'page_title' => 'Articles · '.$user->name])

@section('user_info')

@if (count($articles))
    @include('articles._list')
@else
    User has no articles
@endif

@stop

