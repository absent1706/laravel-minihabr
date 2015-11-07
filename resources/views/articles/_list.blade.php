@foreach ($articles as $article)
    @include('articles._single', ['display_full_body' => false])
    <hr>
@endforeach
