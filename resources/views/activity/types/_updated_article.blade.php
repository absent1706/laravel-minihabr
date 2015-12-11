<div class="row">
    <div class="col-md-1 icon-activity-container">
        <span class="glyphicon glyphicon-refresh icon-activity"></span>
    </div>
    <div class="col-md-11 larger-line-height">
        @include('activity.types.__header')
        updated article

        {{-- Subject can be already deleted --}}
        @if($event->subject)
            <a href="{{ route('articles.show', $event->subject_id) }}">{{ $event->subject->title}}</a>
        @else
            which no longer exists
        @endif
    </div>
</div>
