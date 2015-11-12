<div class="article">

  @include('shared._created_info', ['entity' => $article])

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