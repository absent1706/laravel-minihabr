<?php isset($category_id) ?: $category_id ='' ?>
<div class="panel panel-default sidebar">
  <div class="panel-heading">
    <h4 class="panel-title">Categories</h4>
  </div>
  <div class="list-group">
    {{-- TODO: remove getting data in partial (see laravel fundamentals 25 - When You Want a View Partial to Always Receive Data.mp4) --}}
    @foreach (App\Category::all() as $category)
        {!! link_to_route('articles.index', $category->name, ['cat' => $category->id],
                          ['class' => 'list-group-item'.(($category->id == $category_id) ? ' active' : '')]
                         ) !!}
    @endforeach
  </div>
</div>