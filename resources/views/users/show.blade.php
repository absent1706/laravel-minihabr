@extends('users.layout')

@section('user_info')

<div class="media">
    <div class="pull-left">
        <img class="media-object img-rounded" src="http://lorempixel.com/200/200/people/1/">
    </div>
    <div class="media-body">
    <h3 class="media-heading">{{ $user->name }}</h3>
        <p><span class="glyphicon glyphicon-envelope"></span>{{ $user->email }}</p>
        <p><span class="glyphicon glyphicon-user"></span>Joined {{ $user->created_at->toFormattedDateString() }}</p>
    </div>
</div>

@stop

