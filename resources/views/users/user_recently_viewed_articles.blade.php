@extends('users.layout', ['active_page' => 'recently_viewed_articles', 'page_title' => 'Views · '.$user->name])

@section('user_info')

<h4 class="page-header">{{ $user->name }} recently viewed articles</h4>
@if (count($articles))
    @include('articles._list')
@else
    {{ $user->name }} haven't read any article yet
@endif

@stop