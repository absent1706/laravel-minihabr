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
    public function store(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->id == Auth::user()->id) {
            $error = "You can't follow youself!";
        }
        if (Auth::user()->does_follow($user)) {
            $error = "You've already subscribed to $user->name!";
        }
        if (isset($error)) {
            return ($request->ajax()) ? response()->json([$error], 422) : redirect()->back()->withErrors($error);
        }

        Auth::user()->follow($user);

        $flash = ['flash_message' => "You're following $user->name now"];
        return ($request->ajax())
                   ? response()->json($flash + ['html' => view('users._follow_button', compact('user'))->render()])
                   : redirect()->back()->with($flash);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $follower_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, $follower_id)
    {
        $user = User::findOrFail($id);

        // it's not permitted to unsubscribe another user
        // TODO: special function can_unsubsrcribe_user() can be created and checked within middleware
        if ($follower_id != Auth::user()->id) {
            return ($request->ajax()) ? response()->json(['Wrong request'], 400) : redirect('/');
        }

        if (!Auth::user()->does_follow($user)) {
            $error = "You aren't subscribed to $user->name. Please, refresh page";
            return ($request->ajax()) ? response()->json([$error], 422) : redirect()->back()->withErrors($error);
        }

        Auth::user()->unfollow($user);

        $flash = ['flash_message' => "You've stopped following $user->name"];
        return ($request->ajax())
                   ? response()->json($flash + ['html' => view('users._follow_button', compact('user'))->render()])
                   : redirect()->back()->with($flash);
    }
}
