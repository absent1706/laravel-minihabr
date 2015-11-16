<div class="well">
    <h4>Leave a Comment:</h4>

    @include('shared.errors_list')
    {!! Form::open(array('route' => 'comments.store', 'class' => 'create-comment-form')) !!}
        {!! Form::hidden('article_id', $article->id) !!}
        <div class="form-group">
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 3]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>

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
            }
        });
    });
    </script>
@endif