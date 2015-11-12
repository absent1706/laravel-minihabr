@extends('layouts.default')

@section('content')

<div>
  <h1>Articles</h1>
  <?php isset($sort) ?: $sort ='' ?>
  <ul class="nav nav-pills nav-justified link-list-justified">
    <li class="{{ ($sort == '') ? 'active' : '' }}"><a href="{{ route('articles.index') }}"><span class="glyphicon glyphicon-time"></span>Recent</a></li>
    {{-- <li class="{{ ($sort == 'most-viewed') ? 'active' : '' }}"><a href="{{ action('ArticlesController@index').'/most-viewed' }}"><span class="glyphicon glyphicon-eye-open"></span>Most viewed</a></li> --}}
    <li class="{{ ($sort == 'most-commented') ? 'active' : '' }}"><a href="{{ route('articles.index', ['sort' => 'most-commented'])  }}"><span class="glyphicon glyphicon-comment"></span>Most commented</a></li>
    <!-- <li class="{{ ($sort == 'most-rated') ? 'active' : '' }}"><a href="{{ action('ArticlesController@index').'/most-rated' }}"><span class="glyphicon glyphicon-star"></span>Most rated</a></li> -->
  </ul>
</div>

@include('articles._list')

{{-- <!-- Pager -->
<ul class="pager">
  <li class="previous">
    <a href="#">&larr; Older</a>
  </li>
  <li class="next">
    <a href="#">Newer &rarr;</a>
  </li>
</ul> --}}

{!! $articles->appends(Input::except('page'))->render() !!}

@stop