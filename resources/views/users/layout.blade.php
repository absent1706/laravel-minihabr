@extends('layouts.default')

@section('content')

<div class="media">
    <div class="pull-left">
        <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 40) }}">
    </div>
    <div class="media-body">
        <h1 class="media-heading inline-block">{{ $user->name }}</h1>
        <div class="pull-right">
            @if(auth()->user() && (auth()->user()->id != $user->id))
                @if(auth()->user()->does_follow($user))
                    {!! link_to_route('users.followers.destroy', '- Unfollow', [$user->id, auth()->user()->id] , ['class' => 'btn btn-default', 'data-method' => 'delete']) !!}
                @else
                    {!! link_to_route('users.followers.store',   '+ Follow',   $user->id,                        ['class' => 'btn btn-success', 'data-method' => 'post'])   !!}
                @endif
            @endif
        </div>
    </div>
</div>

<?php isset($active_page) ?: $active_page = 'profile' ?>
<ul class="nav nav-pills nav-justified link-list-justified">
    <li class="{{ ($active_page == 'profile')  ? 'active' : '' }}"><a href="{{ route('users.show', $user->id) }}"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
    <li class="{{ ($active_page == 'articles') ? 'active' : '' }}"><a href="{{ route('users.articles.index', $user->id) }}"><span class="glyphicon glyphicon-pencil"></span>Articles</a></li>
    <li class="{{ ($active_page == 'comments') ? 'active' : '' }}"><a href="{{ route('users.comments.index', $user->id) }}"><span class="glyphicon glyphicon-comment"></span>Comments</a></li>
    {{-- <li><a href="user-1-favorites.html"><span class="glyphicon glyphicon-star"></span>Favorites</a></li> --}}
</ul>

@yield('user_info')

@stop

