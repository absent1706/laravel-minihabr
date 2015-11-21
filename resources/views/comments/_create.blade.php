<div class="well">
    <h4>Leave a Comment:</h4>

    {!! Form::open(array('route' => 'comments.store', 'class' => 'create-comment-form')) !!}
        {!! Form::hidden('article_id', $article->id) !!}
        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 3]) !!}

            @if($errors->has('body'))
                <p class="help-block">{{ $errors->first('body')}}</p>
            @endif
        </div>
        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>