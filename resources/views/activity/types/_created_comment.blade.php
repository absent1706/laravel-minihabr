<div class="row">
    <div class="col-md-1 icon-activity-container">
        <span class="glyphicon glyphicon-comment icon-activity"></span>
    </div>
    <div class="col-md-11 larger-line-height">
        @include('activity.types.__header')
        <div>
            {{-- Subject can be already deleted --}}
            @if($event->subject)
                commented
                {!! link_to_route('articles.show', $event->subject->article->title, $event->subject->article->id) !!}
                <div>
                    <blockquote><small>{{ $event->subject->body }}</small></blockquote>
                </div>
            @else
                left a comment which no longer exists
            @endif
        </div>
    </div>
</div>

