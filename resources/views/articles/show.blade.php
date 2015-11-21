@extends('layouts.default', ['page_title' => $article->title])

@section('content')

@include('articles._single', ['display_full_body' => true])

<hr>

@if (Auth::check())
    @include('comments._create')
@else
    <p class="text-center">
        Please,
        <a href="{{ route('register', ['return' => Request::url()]) }}">register</a>
        or
        <a href="{{ route('login', ['return' => Request::url()]) }}">login</a>
        to leave comments
    </p>
@endif

<hr class="border-transparent">

<div id="comments">
    @foreach ($article->comments as $comment)
        @include('comments._single')
        <hr>
    @endforeach
</div>

@if (Auth::check())
    @if(config('frontend.allow_ajax_crud_requests'))
        <script>
        $( '.create-comment-form' ).on( 'submit', function(e) {
            e.preventDefault();
            form = this;
            $.ajax({
                type: form.method,
                url:  form.action,
                data: $(form).serialize(),
                dataType: 'json',
                success: function( result ) {
                    $(form).trigger('reset'); // reset all fields in a form

                    $('#comments').append(result.html + '\n<hr>\n'); // display created comment

                    var comment_counter = $('.comment-counter').first();
                    comment_counter.html(parseInt(comment_counter.html()) + 1); // increase comment counter

                    notify(result.flash_message, result.flash_class); // notify that comment is created
                },
                error: function(jqXHR) {app.defaultAjaxError(form, jqXHR);}
            });

            app.removeFormErrors(form);

        });
        </script>
    @endif
@endif

@stop

