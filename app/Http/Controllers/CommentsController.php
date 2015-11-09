<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Article;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (($article_id = $request->get('article_id')) && $article = Article::find($article_id))
        {
            $input = $request->all();
            $input['user_id'] = \Auth::user()->id;

            Comment::create($input);
        }

        return redirect()->back();
    }
}
