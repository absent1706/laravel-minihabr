@extends('layouts._app')

@section('columns')

<!-- Main content -->
<div class="col-md-8 col-md-offset-1">
  @include('shared.flash')
  @yield('content')
</div>

<!-- Sidebar Widgets Column -->
<div class="col-md-3">
  @include('categories._widget')
</div>
@endsection