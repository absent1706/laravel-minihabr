@extends('layouts.default')

@section('content')

<!-- get all query params except 'page' and current sort -->
<?php $appendQuery = array_diff_key($QUERY, ['page' => 'doesnt matter', 'sort' => 'doesnt matter']); ?>

<div>
  <h1>Articles</h1>
  <?php isset($sort) ?: $sort ='' ?>
  <ul class="nav nav-pills nav-justified link-list-justified">
    <li class="{{ ($sort == '') ? 'active' : '' }}"><a href="{{ route('articles.index', $appendQuery) }}"><span class="glyphicon glyphicon-time"></span>Recent</a></li>
    {{-- <li class="{{ ($sort == 'most-viewed') ? 'active' : '' }}"><a href="{{ action('ArticlesController@index').'/most-viewed' }}"><span class="glyphicon glyphicon-eye-open"></span>Most viewed</a></li> --}}
    <li class="{{ ($sort == 'most-commented') ? 'active' : '' }}"><a href="{{ route('articles.index', array_merge($appendQuery, ['sort' => 'most-commented']))  }}"><span class="glyphicon glyphicon-comment"></span>Most commented</a></li>
    <!-- <li class="{{ ($sort == 'most-rated') ? 'active' : '' }}"><a href="{{ action('ArticlesController@index').'/most-rated' }}"><span class="glyphicon glyphicon-star"></span>Most rated</a></li> -->
  </ul>
</div>

@include('articles._list')

@stop