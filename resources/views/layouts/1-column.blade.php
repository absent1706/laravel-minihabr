@extends('layouts._app')

@section('columns')

<!-- Main content -->
<div class="col-md-12">
  @include('shared.flash')
  @yield('content')
</div>

@endsection