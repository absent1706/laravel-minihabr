@extends('layouts.1-column', ['page_title' => 'Reset password'])

@section('content')

<div class="col-md-6 col-md-offset-3">
    <h2 class="page-header">Set new password</h2>
    {!! Form::open(array('route' => 'password_resets.store')) !!}

        {!! Form::hidden('email', $email) !!}
        {!! Form::hidden('token', $token) !!}

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
          {!! Form::label('password', 'New Password', ['class'=>'control-label']) !!}
          {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}

          @if($errors->has('password'))
            <p class="help-block">{{ $errors->first('password')}}</p>
          @endif
        </div>

        <div class="form-group">
          {!! Form::label('password_confirmation', 'Confirm Password', ['class'=>'control-label']) !!}
          {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm Password']) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Reset password', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection