<div class="created-info">
  <div class="media">
    <a href="{{ route('users.show', [$entity->user->id]) }}" class="pull-left">
      <img class="media-object img-rounded" src="http://lorempixel.com/20/20/people/1/">
    </a>
    <div class="media-body">
      {!! link_to_route('users.show', $entity->user->name, $entity->user->id) !!}
      <small class="created-date">{{ $entity->created_at->diffForHumans() }}</small>
    </div>
  </div>
</div>