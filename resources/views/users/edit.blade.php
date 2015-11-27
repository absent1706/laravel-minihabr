@extends('users.layout', ['page_title' => 'Profile settings · '.$user->name])

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3 class="page-header">Update profile</h3>

            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  {!! Form::label('name', 'Name', ['class'=>'control-label']) !!}
                  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}

                  @if($errors->has('name'))
                      <p class="help-block">{{ $errors->first('name')}}</p>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                  {!! Form::label('email', 'Email', ['class'=>'control-label']) !!}
                  {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}

                  @if($errors->has('email'))
                      <p class="help-block">{{ $errors->first('email')}}</p>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                  {!! Form::label('password', 'New Password', ['class'=>'control-label']) !!}
                  {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'New Password']) !!}
                  @if($errors->has('password'))
                    <p class="help-block">{{ $errors->first('password')}}</p>
                  @endif
                </div>

                <div class="form-group">
                  {!! Form::label('password_confirmation', 'Confirm New Password', ['class'=>'control-label']) !!}
                  {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm New Password']) !!}
                </div>

                @unless(Auth::user()->is_admin)
                  <div class="well">
                    <div class="form-group {{ $errors->has('old_password') ? 'has-error' : '' }}">
                      {!! Form::label('old_password', 'Current Password', ['class'=>'control-label']) !!}
                      {!! Form::password('old_password', ['class'=>'form-control', 'placeholder'=>'Type current password to update profile']) !!}
                      @if($errors->has('old_password'))
                        <p class="help-block">{{ $errors->first('old_password')}}</p>
                      @endif
                    </div>
                  </div>
                @endunless

                {!! Form::submit('Update profile', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop