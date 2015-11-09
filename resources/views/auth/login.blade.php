@extends('layouts.1-column')

@section('content')
<div class="col-md-6 col-md-offset-3">
  <div class="well well-lg">
    @include('shared.errors_list')

    {!! Form::open(array('route' => 'login.post')) !!}

    <legend>Login</legend>

    <div class="form-group">
      {!! Form::label('email', 'Your E-mail', ['class'=>'control-label']) !!}
      {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('password', 'Your Password', ['class'=>'control-label']) !!}
      {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Login!', ['class'=>'btn btn-primary btn-lg  btn-block']) !!}
    </div>

    {!! Form::close() !!}

    <p class="text-center">
      {!! link_to_route('register', 'Create an account') !!}
    </p>

  </div>
</div>
@endsection

