@extends('layouts.email')

@section('content')

<h1>Hey, {{ $user->name }}!</h1>
<p>You requested a password reset at <a href="{{ url('/') }}">{{ url('/') }}</a></p>
<p><a href="{{ route('password_resets.create', [$user->id, $token]) }}" class="btn">Reset password</a></p>

@endsection