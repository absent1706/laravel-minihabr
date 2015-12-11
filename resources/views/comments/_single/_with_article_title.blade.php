@extends('comments._single')

@section('comment_title_end_before')
    on {!! link_to_route('articles.show', str_limit($comment->article->title, 80), $comment->article->id) !!}
@endsection