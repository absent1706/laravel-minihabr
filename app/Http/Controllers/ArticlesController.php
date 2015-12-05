<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\Category;
use App\View;

use Config;

use Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['user','category', 'comments', 'views']);

        $sort = Request::get('sort');
        if ($sort == 'most-commented')  $articles = $articles->mostCommented();
        elseif ($sort == 'most-viewed') $articles = $articles->mostViewed();
        // elseif ($sort == 'most-rated')     $articles = $articles->mostRated();
        else {
            $sort = '';
            $articles = $articles->recent();
        }

        if ($category_id = Request::get('cat'))
        {
            $articles->filterBy(['category_id' => $category_id]);
        }

        $articles = $articles->paginate(Config::get('frontend.articles_per_page'));

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create', ['categories' => Category::lists('name', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ArticleRequest $request)
    {
        $article = new Article($request->all());
        Auth::user()->articles()->save($article);

        return redirect(route('articles.index'))->with([
            'flash_message' => 'Article has been created successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        $view = new View(['user_id' => Auth::check() ? Auth::user()->id : null]) ;
        $article->views()->save($view);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article    = Article::findOrFail($id);
        $categories = Category::lists('name', 'id');

        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect(route('articles.index'))->with([
            'flash_message' => 'Article has been updated successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect(route('articles.index'))->with([
            'flash_message' => 'Article has been deleted successfully!',
        ]);
    }
}
