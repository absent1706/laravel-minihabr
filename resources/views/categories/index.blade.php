<div class="panel panel-default sidebar">
  <div class="panel-heading">
    <h4 class="panel-title">Categories</h4>
  </div>
  <div class="list-group">
    @foreach (App\Category::all() as $category)
        {!! link_to_route('categories.show', $category->name, $category->id, ['class' => 'list-group-item']) !!}
    @endforeach
  </div>
</div>