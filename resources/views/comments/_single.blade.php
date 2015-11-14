<div class="comment">
    <div class="created-info">
        <div class="media">
            <a href="{{ route('users.show', [$comment->user->id]) }}" class="pull-left">
                <img class="media-object img-rounded" src="{{ Gravatar::src($comment->user->email, 20) }}">
            </a>
            <div class="media-body">
                {!! link_to_route('users.show', $comment->user->name, $comment->user->id) !!}
                <small class="created-date">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
    <div class="comment-body">
        {{ $comment->body }}
    </div>
</div>
