@extends('users.layout', ['active_page' => 'followed_users', 'page_title' => 'Follows · '.$user->name])

@section('user_info')

@if (count($followed_users))
    <h4 class="page-header">{{ $user->name }} follows {{ $followed_users->count() }} user(-s)</h4>
    @include('users._list', ['users' => $followed_users])
@else
    <h4>{{ $user->name }} doesn't follow anyone</h4>
@endif

@stop