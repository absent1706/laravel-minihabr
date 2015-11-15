@extends('users.layout', ['page_title' => 'Profile settings · '.$user->name])

@section('content')

    <div class="row">
        <div class="col-md-6">

            {{-- Update profile partial. Begin --}}
            <h3 class="page-header">Update profile</h3>

            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                  {!! Form::label('name', 'Name', ['class'=>'control-label']) !!}
                  {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}

                  @if($errors->has('name'))
                      <p class="help-block">{{ $errors->first('name')}}</p>
                  @endif
                </div>

                {!! Form::submit('Update profile', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
            {{-- Update profile partial. End --}}

            <hr class="border-transparent hidden-md hidden-lg">

        </div>
        <div class="col-md-6">

            {{-- Change password partial. Begin --}}
            <h3 class="page-header">Set new password</h3>
            {!! Form::model($user, ['route' => ['users.update_password', $user->id], 'method' => 'PUT']) !!}

               <div class="form-group {{ $errors->has('old_password') ? 'has-error' : '' }}">
                  {!! Form::label('old_password', 'Current Password', ['class'=>'control-label']) !!}
                  {!! Form::password('old_password', ['class'=>'form-control', 'placeholder'=>'Current Password']) !!}
                  @if($errors->has('old_password'))
                    <p class="help-block">{{ $errors->first('old_password')}}</p>
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

                {!! Form::submit('Update password', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
            {{-- Change password partial. End --}}

        </div>
    </div>




@stop