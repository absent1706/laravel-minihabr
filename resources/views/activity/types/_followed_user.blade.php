<div class="row">
    <div class="col-md-1 icon-activity-container">
        <span class="glyphicon icon-activity glyphicon-user">
    </div>
    <div class="col-md-11 larger-line-height">
        @include('activity.types.__header')
        followed

        {{-- Subject can be already deleted --}}
        @if($event->subject)
            <a href="{{ route('users.show', $event->subject_id) }}">{{ $event->subject->name}}</a>
        @else
            user which no longer exists
        @endif
    </div>
</div>
