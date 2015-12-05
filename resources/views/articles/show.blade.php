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

<ul id="comments" class="list-unstyled list-split-hr">
    @foreach ($article->comments->sortByDesc('created_at') as $comment)
        <li>
            @include('comments._single')
        </li>
    @endforeach
</ul>

@if (Auth::check())
    @if(config('frontend.allow_ajax_crud_requests'))

        @include('articles._attach_ajax_to_star')

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

                    $('#comments').prepend('<li>' + result.html + '\n</li>\n'); // display created comment

                    var comment_counter = $('.comment-counter');
                    comment_counter.html(parseInt(comment_counter.html()) + 1); // increase comment counter

                    notify(result.flash_message, result.flash_class); // notify that comment is created
                },
                error: function(jqXHR) {app.defaultAjaxError(form, jqXHR);}
            });

            app.removeFormErrors(form);

        });

        // attach event to dynamically created elements - forms created from delete links
        $(document).on('submit', '.form-from-link.delete-comment-link', function(e) {
            e.preventDefault();
            form = this;
            $.ajax({
                type: form.method,
                url:  form.action,
                data: $(form).serialize(),
                dataType: 'json',
                success: function( result ) {
                    $(form).trigger('reset'); // reset all fields in a form
                    var commentId = $(form).data('commentId');

                    // find link with needed commentId and comment it lays in
                    $('.delete-comment-link[data-comment-id="' + commentId + '"]').closest('.comment').closest('li').slideUp('slow', function() { $(form).remove(); } );

                    var comment_counter = $('.comment-counter');
                    comment_counter.html(parseInt(comment_counter.html()) - 1); // increase comment counter

                    notify(result.flash_message, result.flash_class); // notify that comment is deleted
                },
                error: function(jqXHR) {app.defaultAjaxError(form, jqXHR);}
            });
        });
        </script>
    @endif
@endif

@stop

