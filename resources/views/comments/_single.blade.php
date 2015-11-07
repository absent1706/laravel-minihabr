<div class="comment">
    @include('shared._created_info', ['entity' => $comment])
    <div class="comment-body">
        {{ $comment->body }}
    </div>
</div>
