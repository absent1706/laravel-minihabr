<div class="comment" id="comment{{ $comment->id }}">
    <div class="created-info">
        <div class="media">
            <a href="{{ route('users.show', [$comment->user->id]) }}" class="pull-left">
                <img class="media-object img-rounded" src="{{ Gravatar::src($comment->user->email, 20) }}">
            </a>
            <div class="media-body">
                {!! link_to_route('users.show', $comment->user->name, $comment->user->id) !!}
                <div class="descriptive-header">
                    {{ $comment->created_at->diffForHumans() }}
                    @yield('comment_title_end_before')
                </div>

                @if (can_manage_comment($comment))
                    <div class="pull-right">
                        <a href="{{ route('comments.destroy', [$comment->id]) }}" class="delete-comment-link" data-comment-id="{{ $comment->id }}" data-method="delete" data-confirm="Do you really want to delete your comment?"><span class="glyphicon glyphicon-trash glyphicon-link-grey"></span></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="comment-body">
        {{ $comment->body }}
    </div>
</div>
