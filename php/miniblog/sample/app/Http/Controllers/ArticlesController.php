<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;


class ArticlesController extends Controller
{
    // ルートだけでなくコントローラにをミドルウェアを実行出来るらしい
    public function __construct()
    {
        /* $this->middleware('newLine')
             ->only(['update']); */

        /* $this->middleware('returnNewLine')
             ->only(['show']); */
    }

    public function index()
    {
        // simplePaginate使う時はget()いらない
        $articles = Article::orderBy('released_at', 'desc')->paginate(10);
        return view( 'articles.index', [ 'articles' => $articles ]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', [ 'article' =>  $article ]);
    }

    public function create()
    {
        return view('articles.new');
    }

    public function store(ArticlesRequest $request)
    {
        $article = new Article;
        $form = $request->all();
        unset($form['_token']);
        $article->fill($form)->save();
        return redirect('/articles');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', [ 'article' => $article ] );
    }

    public function update(ArticlesRequest $request)
    {
        $article = Article::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $article->fill($form)->save();
        return redirect('/articles');
    }

    public function destroy($id)
    {
        $article = Article::find($id)->delete();
        return redirect('/articles');
    }
}
