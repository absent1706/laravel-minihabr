@include('shared.errors_list')

<div class="form-group">
    {!! Form::label('category_id','Select category') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>"form-control"]) !!}
</div>

<div class="form-group">
    {!! Form::label('title','Type title') !!}
    {!! Form::text('title',null,['class'=>"form-control"]) !!}
</div>

<div class="form-group">
    {!! Form::label('body','Type body') !!}
    {!! Form::textarea('body',null,['class'=>"form-control"]) !!}
</div>

{!! Form::submit($submit_title, ['class'=>'btn btn-primary']) !!}