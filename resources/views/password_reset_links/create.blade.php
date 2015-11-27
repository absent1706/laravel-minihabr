@extends('layouts.1-column', ['page_title' => 'Reset password'])

@section('content')
<div class="col-md-6 col-md-offset-3">
    <h2 class="page-header">Reset password</h2>
    {!! Form::open(array('route' => 'password_reset_links.store')) !!}

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          {!! Form::label('email', 'Your E-mail', ['class'=>'control-label']) !!}
          {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}

          @if($errors->has('email'))
            <p class="help-block">{{ $errors->first('email')}}</p>
          @endif
        </div>

        <div class="form-group">
          {!! Form::submit('Email reset link', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection