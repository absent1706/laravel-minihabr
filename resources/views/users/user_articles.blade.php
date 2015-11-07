@extends('users.layout', ['active_page' => 'articles'])

@section('user_info')

@if (count($user->articles))
    @include('articles._list', ['articles' => $user->articles])
@else
    User has no articles
@endif

@stop

