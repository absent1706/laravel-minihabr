<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    {!! Form::label('category_id','Select category') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>"form-control"]) !!}

    @if($errors->has('category_id'))
        <p class="help-block">{{ $errors->first('category_id')}}</p>
    @endif
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('title','Type title') !!}
    {!! Form::text('title',null,['class'=>"form-control"]) !!}

    @if($errors->has('title'))
        <p class="help-block">{{ $errors->first('title')}}</p>
    @endif
</div>

<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    {!! Form::label('body','Type body') !!}
    {!! Form::textarea('body',null,['class'=>"form-control"]) !!}

    @if($errors->has('body'))
        <p class="help-block">{{ $errors->first('body')}}</p>
    @endif
</div>

{!! Form::submit($submit_title, ['class'=>'btn btn-primary']) !!}