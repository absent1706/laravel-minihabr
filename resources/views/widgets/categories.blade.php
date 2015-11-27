<?php $current_category = isset($QUERY['cat']) ? $QUERY['cat'] : null; ?>
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
    @foreach ($categories as $category)
        {!! link_to_route('articles.index', $category->name, ['cat' => $category->id],
                          ['class' => 'list-group-item'.(($category->id == $current_category) ? ' active' : '')]
                         ) !!}
    @endforeach
  </div>
</div>