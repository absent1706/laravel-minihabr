<div class="article-star-container" data-article-id="{{ $article->id }}">
    @if(auth()->check())
        @if(auth()->user()->starred($article))
            <a href="{{ route('articles.stars.destroy', $article->id) }}" title='unstar' data-article-id="{{ $article->id }}" class='star-link' data-method='delete'><span class="glyphicon glyphicon-star active-star"></span></a><span>{{ $article->stars->count() }}</span>
        @else
            <a href="{{ route('articles.stars.store', $article->id) }}" title='star' data-article-id="{{ $article->id }}" class='star-link' data-method='post'><span class="glyphicon glyphicon-star"></span></a><span>{{ $article->stars->count() }}</span>
        @endif
    @else
        <span class="glyphicon glyphicon-star"></span><span>{{ $article->stars->count() }}</span>
    @endif

</div>