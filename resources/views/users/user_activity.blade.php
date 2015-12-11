@extends('users.layout', ['active_page' => 'activity', 'page_title' => 'Activity · '.$user->name])

@section('user_info')

<h4 class="page-header">{{ $user->name }} recent activity</h4>
@if (count($activity))
    @include('activity._list')
@else
    {{ $user->name }} has no activity yet
@endif

@stop