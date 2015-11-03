<div class="article">
  <div class="author-info">
    <div class="media">
      {{-- Hardcode --}}<a href="user-1.html" class="pull-left">
        <img class="media-object img-rounded" src="http://lorempixel.com/20/20/people/1/">
      </a>
      <div class="media-body">
        {{-- Hardcode --}}<a href="user-1.html">Alex</a>
        <small class="created-date">{{ $article->created_at->diffForHumans() }}</small>
      </div>
    </div>
  </div>
  <h2 class="article-title">
    {!! link_to_route('articles.show', $article->title, $article->id) !!}
  </h2>


  {{-- Hardcode --}}
  <p><small><span class="glyphicon glyphicon-th-list"></span><a href="section-1.html">Section 1</a></small></p>

  @if ($display_full_body)
    <p class="article-body">{{ $article->body }}</p>
  @else
    <p class="article-body">{{ str_limit($article->body, 200) }}</p>
    <a class="btn btn-default btn-xs" href="{{ route('articles.show', [$article->id]) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
  @endif

  {{-- Hardcode --}}
  <ul class="list-inline list-inline-dashed article-details">
    <li><small><span class="glyphicon glyphicon-eye-open"></span>8</small></li>
    <li><small><a href="article-1.html#comments" title="View comments"><span class="glyphicon glyphicon-comment"></span>4</a></small></li>
    <li><small><a href="#" title="Add to favorites"><span class="glyphicon glyphicon-star"></span></a>2</small></li>
  </ul>
</div>

{{-- temp --}}
<ul>
@foreach ($article->comments as $comment)
  <li>{{ $comment->body }}</li>
@endforeach
</ul>