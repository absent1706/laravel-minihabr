@extends('users.layout', ['active_page' => 'starred_articles', 'page_title' => 'Starred articles · '.$user->name])

@section('user_info')

<h4 class="page-header">{{ $user->name }} starred articles</h4>
@if (count($articles))
    @include('articles._list')
@else
    {{ $user->name }} hasn't starred any article
@endif

@stop

