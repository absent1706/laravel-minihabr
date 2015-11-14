<div class="article">
  <div class="created-info">
    <div class="media">
      <a href="{{ route('users.show', [$article->user->id]) }}" class="pull-left">
        <img class="media-object img-rounded" src="{{ Gravatar::src($article->user->email, 20) }}">
      </a>
      <div class="media-body">
        {!! link_to_route('users.show', $article->user->name, $article->user->id) !!}
        <small class="created-date">{{ $article->created_at->diffForHumans() }}</small>

        @if (can_manage_article($article))
          <div class="pull-right">
            <a href="{{ route('articles.edit', [$article->id]) }}">
              <span class="glyphicon glyphicon-pencil glyphicon-link-grey"></span>
            </a>
            <a href="{{ route('articles.destroy', [$article->id]) }}" data-method="delete">
              <span class="glyphicon glyphicon-trash glyphicon-link-grey"></span>
            </a>
          </div>
        @endif

      </div>
    </div>
  </div>

  <h2 class="article-title">
    {!! link_to_route('articles.show', $article->title, $article->id) !!}
  </h2>

  <p>
    <small>
      <span class="glyphicon glyphicon-th-list"></span>
      {!! link_to_route('articles.index', $article->category->name, ['cat' => $article->category->id]) !!}
    </small>
  </p>

  @if ($display_full_body)
    <p class="article-body">{{ $article->body }}</p>
  @else
    <p class="article-body">{{ str_limit($article->body, 200) }}</p>
    <a class="btn btn-default btn-xs" href="{{ route('articles.show', [$article->id]) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
  @endif

  <ul class="list-inline list-inline-dashed article-details">
{{--     <li><small><span class="glyphicon glyphicon-eye-open"></span>8</small></li> --}}
    <li>
      <small>
        <a href="{{ route('articles.show', [$article->id]).'#comments' }}" title="View comments">
          <span class="glyphicon glyphicon-comment"></span>
          {{ $article->comments->count() }}
        </a>
      </small>
    </li>
{{--     <li><small><a href="#" title="Add to favorites"><span class="glyphicon glyphicon-star"></span></a>2</small></li> --}}
  </ul>
</div>