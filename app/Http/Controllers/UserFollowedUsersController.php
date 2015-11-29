<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;

class UserFollowedUsersController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        $followed_users = $user->followed_users()->paginate(config('frontend.users_per_page'));
        return view('users.user_followed_users', compact('user', 'followed_users'));
    }
}
