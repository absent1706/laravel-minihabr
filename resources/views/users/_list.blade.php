<ul class="list-unstyled list-split-hr list-users">
    @foreach($users as $user)
        <li class="user">
            <div class="media">
                <div class="pull-left">
                    <a href="{{ route('users.show', [$user->id]) }}" class="pull-left">
                        <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 40) }}">
                    </a>
                </div>
                <div class="media-body">
                    <h3 class="media-heading inline-block username">
                        {!! link_to_route('users.show', $user->name, $user->id) !!}
                    </h3>
                    <div class="pull-right">
                        @include('users._follow_button')
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{!! $users->appends(Input::except('page'))->render() !!}