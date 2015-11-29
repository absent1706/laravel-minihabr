<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;

class UserFollowersController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        $followers = $user->followers()->paginate(config('frontend.users_per_page'));
        return view('users.user_followers', compact('user', 'followers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $user = User::findOrFail($id);

        if ($user->id == Auth::user()->id) {
            return redirect()->back()->withErrors("You can't follow youself!");
        }
        if (Auth::user()->does_follow($user)) {
            return redirect()->back()->withErrors("You've already subscribed to $user->name!");
        }

        Auth::user()->follow($user);
        return redirect()->back()->with(['flash_message' => "You're following $user->name now"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $follower_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $follower_id)
    {
        $user = User::findOrFail($id);

        // it's not permitted to unsubscribe another user
        // TODO: special function can_unsubsrcribe_user() can be created and checked within middleware
        if ($follower_id != Auth::user()->id) {
            return redirect('/');
        }

        if (!Auth::user()->does_follow($user)) {
            return redirect()->back()->withErrors("You aren't subscribed to $user->name!");
        }

        Auth::user()->unfollow($user);
        return redirect()->back()->with(['flash_message' => "You've stopped following $user->name"]);
    }
}
