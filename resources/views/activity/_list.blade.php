<ul class="list-unstyled list-split-hr">
    @foreach ($activity as $event)
        <li>
            @include ("activity.types._{$event->name}")
        </li>
    @endforeach
</ul>
{!! $activity->appends(Input::except('page'))->render() !!}