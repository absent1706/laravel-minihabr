@if(auth()->user() && (auth()->user()->id != $user->id))
    @if(auth()->user()->does_follow($user))
        {!! link_to_route('users.followers.destroy', '- Unfollow', [$user->id, auth()->user()->id] , ['class' => 'btn btn-default follow-button', 'data-user-id' => $user->id, 'data-method' => 'delete']) !!}
    @else
        {!! link_to_route('users.followers.store',   '+ Follow',   $user->id,                        ['class' => 'btn btn-success follow-button', 'data-user-id' => $user->id, 'data-method' => 'post'])   !!}
    @endif
@endif