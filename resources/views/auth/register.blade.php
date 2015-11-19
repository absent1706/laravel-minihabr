@extends('layouts.1-column', ['page_title' => 'Register'])

@section('content')
<div class="col-md-6 col-md-offset-3">
  <div class="well well-lg">
    {!! Form::open(array('route' => 'register.post')) !!}

    <legend>Register</legend>

    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
      {!! Form::label('name', 'Your Name', ['class'=>'control-label']) !!}
      {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}

      @if($errors->has('name'))
        <p class="help-block">{{ $errors->first('name')}}</p>
      @endif
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
      {!! Form::label('email', 'Your E-mail', ['class'=>'control-label']) !!}
      {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}

      @if($errors->has('email'))
        <p class="help-block">{{ $errors->first('email')}}</p>
      @endif
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
      {!! Form::label('password', 'Your Password', ['class'=>'control-label']) !!}
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
      {!! Form::submit('Register!', ['class'=>'btn btn-primary btn-lg  btn-block']) !!}
    </div>

    {!! Form::close() !!}

    <p class="text-center">
      {!! link_to_route('login', 'Already have an account?') !!}
    </p>

  </div>
</div>
@endsection

