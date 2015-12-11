@extends('users.layout', ['active_page' => 'comments', 'page_title' => 'Comments · '.$user->name])

@section('user_info')

@if (count($comments))
  <ul class="list-unstyled list-split-hr">
    @foreach ($comments as $comment)
      <li>
        @include('comments._single._with_article_title')
      </li>
    @endforeach
  </ul>
  {!! $comments->appends(Input::except('page'))->render() !!}
@else
    User has no comments
@endif

@stop

