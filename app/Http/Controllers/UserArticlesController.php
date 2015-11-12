<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Article;

class UserArticlesController extends Controller
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
        $articles = Article::filterBy(['user_id' => $user_id])->recent()->paginate(2);

        return view('users.user_articles', compact('user', 'articles'));
    }

}
