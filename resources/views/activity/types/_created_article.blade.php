<div class="row">
    <div class="col-md-1 icon-activity-pen">
        <span class="glyphicon glyphicon-plus icon-activity"></span>
    </div>
    <div class="col-md-11 larger-line-height">
        @include('activity.types.__header')
        published

        {{-- Subject can be already deleted --}}
        @if($event->subject)
            <a href="{{ route('articles.show', $event->subject_id) }}">{{ $event->subject->title}}</a>
            <blockquote><small>{{ str_limit($event->subject->body, 200) }}</small></blockquote>
        @else
            article which no longer exists
        @endif
    </div>
</div>
