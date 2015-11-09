@extends('users.layout', ['active_page' => 'articles', 'page_title' => 'Articles · '.$user->name])

@section('user_info')

@if (count($user->articles))
    @include('articles._list', ['articles' => $user->articles->sortByDesc('created_at')])
@else
    User has no articles
@endif

@stop

