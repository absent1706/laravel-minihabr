@extends('layouts.default', ['page_title' => 'Manage categories'])

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <h2 class="page-header">All categories</h2>

        @if(Auth::check() && Auth::user()->is_admin)
            {!! link_to_route('categories.create', '+ Add category', null, ['class' => 'btn btn-success']) !!}
            <hr class="border-transparent">
        @endif

        <ul class="list-unstyled list-split-hr">
            @foreach($categories as $category)
                <li>
                    {!! link_to_route('articles.index', $category->name, ['cat' => $category->id]) !!}
                    <small>order: {{ $category->order }}</small>
                    @if(Auth::check() && Auth::user()->is_admin)
                        <div class="pull-right">
                            {!! link_to_route('categories.edit', 'Edit', $category->id, ['class' => 'btn btn-primary']) !!}
                            {!! link_to_route('categories.destroy', 'Delete', $category->id, ['data-method' => 'delete', 'data-confirm' => 'Do you really want to delete category and ALL CATEGORY ARTICLES ?', 'class' => 'btn btn-danger']) !!}
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
        {!! $categories->appends(Input::except('page'))->render() !!}
    </div>
@stop