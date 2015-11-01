@extends('app')

@section('content')

<div>
  <h1>Articles</h1>
  {{-- Here we determine active scope --}}
  <ul class="nav nav-pills nav-justified link-list-justified">
    <li class="{{ ($scope == '') ? 'active' : '' }}"><a href="{{ action('ArticlesController@index') }}"><span class="glyphicon glyphicon-time"></span>Recent</a></li>
    <li class="{{ ($scope == 'most-viewed') ? 'active' : '' }}"><a href="{{ action('ArticlesController@index').'/most-viewed' }}"><span class="glyphicon glyphicon-eye-open"></span>Most viewed</a></li>
    <li class="{{ ($scope == 'most-commented') ? 'active' : '' }}"><a href="{{ action('ArticlesController@index').'/most-commented' }}"><span class="glyphicon glyphicon-comment"></span>Most commented</a></li>
    <li class="{{ ($scope == 'most-rated') ? 'active' : '' }}"><a href="{{ action('ArticlesController@index').'/most-rated' }}"><span class="glyphicon glyphicon-star"></span>Most rated</a></li>
  </ul>
</div>

@foreach ($articles as $article)
    @include('articles._single', ['article' => $article, 'display_full_body' => false])
    <hr>
@endforeach

<!-- Pager -->
<ul class="pager">
  <li class="previous">
    <a href="#">&larr; Older</a>
  </li>
  <li class="next">
    <a href="#">Newer &rarr;</a>
  </li>
</ul>

@stop