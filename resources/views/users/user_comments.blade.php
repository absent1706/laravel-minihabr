@extends('users.layout', ['active_page' => 'comments', 'page_title' => 'Comments · '.$user->name])

@section('user_info')

@if (count($comments))
    @foreach ($comments as $comment)
      <div class="row">
        <div class="col-md-2">
            <h5 class='no-margin-top'>{!! link_to_route('articles.show', $comment->article->title, $comment->article->id) !!}</h5>
        </div>
        <div class="col-md-10">
            @include('comments._single')
        </div>
      </div>
      <hr>
    @endforeach
    {!! $comments->appends(Input::except('page'))->render() !!}
@else
    User has no comments
@endif

@stop

