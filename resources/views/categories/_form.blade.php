<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Category name') !!}
    {!! Form::text('name',null,['class'=>"form-control"]) !!}

    @if($errors->has('name'))
        <p class="help-block">{{ $errors->first('name')}}</p>
    @endif
</div>

<div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
    {!! Form::label('order','Category order') !!}
    {!! Form::text('order',null,['class'=>"form-control"]) !!}

    @if($errors->has('order'))
        <p class="help-block">{{ $errors->first('order')}}</p>
    @endif
</div>
{!! Form::submit($submit_title, ['class'=>'btn btn-primary']) !!}