<ul class="list-unstyled list-split-hr">
    @foreach ($articles as $article)
        <li>
            @include('articles._single', ['display_full_body' => false])
        </li>
    @endforeach
</ul>

@if (auth()->check())
    @if(config('frontend.allow_ajax_crud_requests'))
        @include('articles._attach_ajax_to_star')
    @endif
@endif

{!! $articles->appends(Input::except('page'))->render() !!}
