<div class="created-info">
  <div class="media">
    <a href="{{ route('users.show', [$entity->user->id]) }}" class="pull-left">
      <img class="media-object img-rounded" src="{{ Gravatar::src($entity->user->email, 20) }}">
    </a>
    <div class="media-body">
      {!! link_to_route('users.show', $entity->user->name, $entity->user->id) !!}
      <small class="created-date">{{ $entity->created_at->diffForHumans() }}</small>
    </div>
  </div>
</div>