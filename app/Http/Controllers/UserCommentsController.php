<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Comment;
use Config;

class UserCommentsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);

        $comments = Comment::filterBy(['user_id' => $user_id])->recent()->paginate(Config::get('frontend.comments_per_page'));
        return view('users.user_comments', compact('user', 'comments'));
    }

}