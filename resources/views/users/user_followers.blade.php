@extends('users.layout', ['active_page' => 'followers', 'page_title' => 'Followers · '.$user->name])

@section('user_info')

@if (count($followers))
    <h4 class="page-header">{{ $user->name }} has {{ $followers->count() }} follower(-s)</h4>
    @include('users._list', ['users' => $followers])
@else
    <h4>{{ $user->name }} has no followers</h4>
@endif

@stop