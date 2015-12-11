<div class="clearfix descriptive-header">
	<a href="{{ route('users.show', [$event->user->id]) }}">
        <img class="img-rounded" src="{{ Gravatar::src($event->user->email, 20) }}">
		{{ $event->user->name }}
	</a>
	<div class="pull-right">{{ $event->created_at->diffForHumans() }}</div>
</div>