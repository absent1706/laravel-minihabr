<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Star;
use App\Article;

class ArticleStarsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $article_id)
    {
        $article = Article::findOrFail($article_id);
        $star    = new Star(['user_id' => auth()->user()->id]);
        $article->stars()->save($star);

        $flash = ['flash_message' => 'You starred an article'];
        if ($request->ajax()) {
            return response()->json($flash + [ 'html' => view('articles._star', compact('article'))->render() ]);
        } else {
            return redirect()->back()->with($flash);
        }
    }

    public function destroy(Request $request, $article_id)
    {
        $article = Article::findOrFail($article_id);
        $star = Star::filterBy(['article_id' => $article_id, 'user_id' => auth()->user()->id]);
        $star->delete();

        $flash = ['flash_message' => 'You unstarred an article'];
        if ($request->ajax()) {
            return response()->json($flash + [ 'html' => view('articles._star', compact('article'))->render() ]);
        } else {
            return redirect()->back()->with($flash);
        }
    }
}
