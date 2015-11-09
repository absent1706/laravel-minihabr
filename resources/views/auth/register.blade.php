@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
  <div class="well well-lg">
    @include('shared.errors_list')

    {!! Form::open(array('route' => 'register.post')) !!}

    <legend>Register</legend>

    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
      {!! Form::label('name', 'Your Name', ['class'=>'control-label']) !!}
      {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
      {!! Form::label('email', 'Your E-mail', ['class'=>'control-label']) !!}
      {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
      {!! Form::label('password', 'Your Password', ['class'=>'control-label']) !!}
      {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
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

