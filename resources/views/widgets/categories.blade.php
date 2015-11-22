<?php isset($category_id) ?: $category_id ='' ?>
<div class="panel panel-default sidebar">
  <div class="panel-heading">
    <div class="panel-title inline-block">Categories</div>
    @if(Auth::check() && Auth::user()->is_admin)
      <div class="pull-right">
        <small>
          <span class="glyphicon glyphicon-cog"></span>
          {!! link_to_route('categories.index', 'Manage') !!}
        </small>
      </div>
    @endif
  </div>
  <div class="list-group">
    {{-- TODO: remove getting data in partial (see laravel fundamentals 25 - When You Want a View Partial to Always Receive Data.mp4) --}}
    @foreach ($categories as $category)
        {!! link_to_route('articles.index', $category->name, ['cat' => $category->id],
                          ['class' => 'list-group-item'.(($category->id == $category_id) ? ' active' : '')]
                         ) !!}
    @endforeach
  </div>
</div>