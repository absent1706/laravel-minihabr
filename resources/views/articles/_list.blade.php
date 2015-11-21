<div class="list-unstyled list-split-hr">
    @foreach ($articles as $article)
        <li>
            @include('articles._single', ['display_full_body' => false])
        </li>
    @endforeach
</div>
{!! $articles->appends(Input::except('page'))->render() !!}
