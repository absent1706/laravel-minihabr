<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\User;

class UserStarredArticlesController extends Controller
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
        $articles = Article::starredBy($user)->with(['user','category', 'comments', 'views', 'stars'])->paginate(config('frontend.articles_per_page'));

        return view('users.user_starred_articles', compact('user', 'articles'));
    }

}
